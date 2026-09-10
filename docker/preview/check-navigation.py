"""Read-only crawl of local page navigation; never submit forms or fetch APIs."""
from collections import deque
from html.parser import HTMLParser
from urllib.error import HTTPError
from urllib.parse import urldefrag, urljoin, urlsplit
from urllib.request import urlopen
import sys

ORIGINS = {'127.0.0.1:8181', 'localhost:8181', '127.0.0.1:8182', 'localhost:8182'}
OLD_HOSTS = {'itstud.hiof.no', 'it-stud.hiof.no', 'www.it-stud.hiof.no'}

class Links(HTMLParser):
    def __init__(self):
        super().__init__()
        self.links = []

    def handle_starttag(self, tag, attributes):
        attrs = dict(attributes)
        if tag == 'a' and attrs.get('href'):
            self.links.append(attrs['href'])

failures = []
for port, path in [(8181, '/phpsite/'), (8182, '/staticsite/')]:
    queue = deque([(f'http://127.0.0.1:{port}{path}', 'entrypoint')])
    visited = set()
    while queue:
        url, source = queue.popleft()
        url, _ = urldefrag(url)
        if url in visited:
            continue
        visited.add(url)
        if len(visited) > 250:
            failures.append('Crawl exceeded 250 URLs')
            break
        try:
            with urlopen(url, timeout=10) as response:
                final_url = response.geturl()
                if urlsplit(final_url).netloc not in ORIGINS:
                    raise ValueError(f'Unexpected external redirect: {final_url}')
                if 'text/html' not in response.headers.get('Content-Type', ''):
                    continue
                parser = Links()
                parser.feed(response.read().decode('utf-8', errors='replace'))
            for href in parser.links:
                target = urljoin(final_url, href)
                parts = urlsplit(target)
                if parts.hostname in OLD_HOSTS and parts.path.startswith('/phpsite'):
                    failures.append(f'Old self-link: {target} from {url}')
                if parts.netloc not in ORIGINS or parts.query:
                    continue
                leaf = parts.path.rsplit('/', 1)[-1]
                if leaf in {'register.php', 'proxy.php', 'send-result.php'}:
                    continue
                if '.' not in leaf or leaf.endswith(('.php', '.html')):
                    queue.append((target, url))
        except Exception as error:
            failures.append(f'{url} from {source}: {error}')
    print(f'Port {port}: checked {len(visited)} navigation URLs')
for failure in failures:
    print(failure)
print(f'Failures: {len(failures)}')
sys.exit(bool(failures))
