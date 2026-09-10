#!/usr/bin/env python3
"""Exercise the exact images as non-root on a read-only filesystem."""
import json
import subprocess
import sys
import time
from urllib.error import HTTPError
from urllib.parse import urlencode
from urllib.request import Request, build_opener, HTTPRedirectHandler, urlopen

class NoRedirect(HTTPRedirectHandler):
    def redirect_request(self, *args, **kwargs):
        return None

def request(base, path, status=200, contains=None, headers=None, data=None):
    req = Request(base + path, headers=headers or {}, data=data)
    try:
        response = build_opener(NoRedirect).open(req, timeout=10)
    except HTTPError as error:
        response = error
    with response:
        body = response.read()
        assert response.code == status, (path, response.code, status)
        if contains is not None:
            assert contains.encode() in body, path
        assert b'<b>Fatal error</b>' not in body, path
        return body, response.headers

def check(image, edition):
    container = subprocess.check_output([
        'docker', 'run', '-d', '--platform', 'linux/amd64', '--read-only',
        '--user', '1000:1000', '--cap-drop', 'ALL',
        '--security-opt', 'no-new-privileges', '--memory', '256m' if edition == 'v1' else '32m',
        '--tmpfs', '/tmp:rw,nosuid,size=32m,mode=1777',
        '-p', '127.0.0.1::8080', image], text=True).strip()
    try:
        meta = json.loads(subprocess.check_output(['docker', 'inspect', container]))[0]
        port = meta['NetworkSettings']['Ports']['8080/tcp'][0]['HostPort']
        base = 'http://127.0.0.1:' + port
        for _ in range(60):
            try:
                request(base, '/', 302)
                break
            except Exception:
                time.sleep(.5)
        else:
            raise AssertionError('Container did not become ready')
        prefix = '/phpsite/prosjekter/infprog/2016-1/oblig-5/'
        if edition == 'v1':
            # Check Location as well as status: Apache otherwise exposes port 8080.
            for path, status in [('/', 302), ('/phpsite', 301), ('/phpsite/lab', 301)]:
                _, headers = request(base, path, status, headers={'Host': 'edu-hio-bjornarh-v1.bjornar.dev', 'X-Forwarded-Proto': 'https'})
                destination = '/phpsite/' if path == '/' else path + '/'
                assert headers['Location'] == 'https://edu-hio-bjornarh-v1.bjornar.dev' + destination
            request(base, '/phpsite/', contains='Bjørnar')
            request(base, '/phpsite/lab/', contains='Ingen laboppgaver')
            body, _ = request(base, prefix + 'oppgave-1-2-3.php', contains='Enigma')
            assert b'autoplay muted playsinline loop' in body
            assert b'heading.getBoundingClientRect().bottom <= 0' in body
            video, headers = request(base, prefix + 'oppgave-1-2-3-materiale/video.mp4', 206,
                                     headers={'Range': 'bytes=0-1023'})
            assert len(video) == 1024 and headers.get('Content-Type') == 'video/mp4'
            request(base, prefix + 'oppgave-4.php', contains='Værdata')
            # Local catalogue only; never invoke the deprecated forecast URL.
            body, _ = request(base, prefix + 'proxy.php?s=Halden')
            assert len(json.loads(body)) > 0
            query = urlencode({'kode': '20161', 'navn': 'Container Test', 'epost': 'test@example.invalid'})
            request(base, prefix + 'register.php?' + query, contains='Takk for din påmelding')
            request(base, prefix + 'register.php?' + query, contains='allerede påmeldt')
            request(base, prefix + 'oppgave-1-2-3-materiale/paameldinger.dat', 403)
            request(base, prefix + 'oppgave-4/.cache/private.xml', 403)
            request(base, '/phpsite/prosjekter/infprog/2016-1/oblig-4/swim/send-result.php',
                    contains='Container Test', data=urlencode({'name': 'Container Test', 'score': '10'}).encode())
        else:
            request(base, '/staticsite/', contains='studiewebsted')
            request(base, '/staticsite/om.html', contains='Om nettstedet')
            request(base, '/staticsite/js/mobile-menu.js')
            for page in ['index', 'artikkel', 'innhold-vs-design', 'webserver', 'semantikk', 'stilark', 'box-modellen']:
                body, _ = request(base, '/staticsite/webutvikling/2018/oblig-1/' + page + '.html')
                assert b'itstud.hiof.no/phpsite' not in body
            request(base, '/staticsite/missing.js', 404)
            request(base, '/staticsite/templates/master.html', 404)
            _, headers = request(base, '/v1/lab/', 302)
            assert headers['Location'] == 'https://edu-hio-bjornarh-v1.bjornar.dev/phpsite/lab/'
            request(base, '/', headers={'Host': 'edu-hio-bjornarh.bjornar.dev'}, contains='2016 · Første utgave')
        logs = subprocess.check_output(['docker', 'logs', container], stderr=subprocess.STDOUT)
        assert b'Fatal error' not in logs and b'Permission denied' not in logs, 'Runtime errors'
        print(edition + ': restricted runtime, routes and functional checks passed')
    finally:
        subprocess.run(['docker', 'rm', '-f', container], check=True, stdout=subprocess.DEVNULL)

if __name__ == '__main__':
    if len(sys.argv) != 3:
        raise SystemExit('Usage: python3 docker/production/check.py V1_IMAGE V2_IMAGE')
    check(sys.argv[1], 'v1')
    check(sys.argv[2], 'v2')
