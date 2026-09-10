# Bjørnar Hagen’s student websites

An archive of coursework from Høgskolen i Østfold, preserving two editions of
my student website and their original designs.

## Live sites

| Edition | Content | Website |
| --- | --- | --- |
| Edition chooser | Links to both archives | [edu-hio-bjornarh.bjornar.dev](https://edu-hio-bjornarh.bjornar.dev) |
| v1 · 2016 | PHP programming coursework, Enigma company presentations, weather exercise and SWIM game | [edu-hio-bjornarh-v1.bjornar.dev](https://edu-hio-bjornarh-v1.bjornar.dev) |
| v2 · 2018 | Static web-development articles and assignments | [edu-hio-bjornarh-v2.bjornar.dev](https://edu-hio-bjornarh-v2.bjornar.dev) |

Both editions moved to container hosting in September 2026. The site roots
redirect to the retained `/phpsite/` and `/staticsite/` paths, so there is no
need to append these manually. The former Vercel deployment hosted only the
static edition.

## Run locally

Install Docker with Docker Compose, then run from the repository root:

```sh
docker compose -f compose.preview.yaml up -d --build
```

- PHP edition: [localhost:8181](http://localhost:8181)
- Static edition: [localhost:8182](http://localhost:8182)

The previews bind to localhost only. Rebuild after changing the source.

```sh
# Stop the previews without removing their data
docker compose -f compose.preview.yaml stop

# Remove the containers and their disposable runtime data
docker compose -f compose.preview.yaml down
```

See [DOCKER.md](DOCKER.md) for runtime details, verification commands, useful
coursework links and production image targets. Docker includes the compatibility
settings required by the older static build; a host Node.js installation is
not needed for these previews.

## Repository layout

- `src/phpsite/`: older PHP website and programming exercises.
- `src/staticsite/`: newer Gulp/Nunjucks/Sass website and static coursework.
- `Dockerfile.v1`, `Dockerfile.v2`, `compose.preview.yaml`: local previews.
- `Dockerfile.cluster`, `docker/production/`: production container packaging.
- `docker/preview/`: local web-server configuration and verification scripts.

## Archive limitations

The weather exercise’s upstream API is deprecated and has not been restored.
Some historical external links, embedded media and services may no longer work.
The missing Lab exercise directory is represented by an empty state.

Enigma registrations and SWIM scores are disposable demo data. Use made-up
names and addresses when trying the forms. Production data resets when its pod
is replaced; local preview data resets when its container is recreated or
removed. The old external SWIM anti-cheat service is no longer used.

This is historical coursework, not a general-purpose application template.
Production PHP runs with restricted filesystem access and denied outbound
network access; running the image alone does not provide that network policy.
The deprecated weather proxy has not been redesigned.

## Deployment

Public source and Docker packaging live here. Production image publication,
credentials, DNS and cluster declarations are managed separately in private
infrastructure. Publishing or merging source changes here does not redeploy
the cluster: releases use explicitly selected source commits and image digests.
