from urllib.request import urlopen
from urllib.parse import urljoin, urlsplit
from html.parser import HTMLParser
from pathlib import Path
import sys
class Links(HTMLParser):
 def __init__(self): super().__init__();self.assets=[]
 def handle_starttag(self,tag,attrs):
  a=dict(attrs)
  if tag in ('img','script') and a.get('src'): self.assets.append(a['src'])
  if tag=='link' and a.get('href') and a.get('rel') in ('stylesheet','icon','apple-touch-icon','mask-icon'): self.assets.append(a['href'])
paths={8181:['/phpsite/','/phpsite/prosjekter/infprog/2016-1/oblig-5/oppgave-1-2-3.php','/phpsite/prosjekter/infprog/2016-1/oblig-5/oppgave-4.php','/phpsite/prosjekter/infprog/2016-1/oblig-4/swim/'],8182:['/staticsite/','/staticsite/om.html','/staticsite/artikler/git-github.html','/staticsite/artikler/css-media-typer.html','/staticsite/artikler/css-layouts.html','/staticsite/artikler/oblig2-wireframes.html','/staticsite/webutvikling/2018/oblig-1/index.html']}
errors=[];count=0
for port,urls in paths.items():
 for path in urls:
  base=f'http://127.0.0.1:{port}';url=base+path
  try:
   with urlopen(url,timeout=10) as r: body=r.read()
   count+=1;p=Links();p.feed(body.decode())
   for asset in set(p.assets):
    u=urljoin(url,asset)
    if urlsplit(u).netloc!=urlsplit(base).netloc: continue
    with urlopen(u,timeout=10) as r: data=r.read()
    count+=1
    if port==8182:
     name=urlsplit(u).path.removeprefix('/staticsite/')
     src=Path(__file__).resolve().parents[2] / 'src/staticsite'
     candidates=[src/'extra'/name,src/'html'/name,src/name]
     for f in candidates:
      if f.is_file() and f.suffix in ('.png','.jpg','.ico'):
       if data!=f.read_bytes(): errors.append('binary mismatch '+name)
       break
  except Exception as e: errors.append(f'{path}: {e}')
print('Successful page/asset requests:',count)
print('Issues:',errors)

sys.exit(bool(errors))
