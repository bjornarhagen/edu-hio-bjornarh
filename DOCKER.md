# Local Docker previews

Two separate containers preserve the existing application source and URLs:

| Edition | Local URL | Runtime |
| --- | --- | --- |
| v1: older PHP coursework | http://localhost:8181/phpsite/ | PHP 8.2 / Apache |
| v2: newer static website | http://localhost:8182/staticsite/ | Node 24 build / Nginx |

Run from this repository:

```sh
docker compose -f compose.preview.yaml up -d --build
```

Both ports bind only to `127.0.0.1`. Visiting either server's `/` redirects to
its original site path. No production DNS, Vercel or cluster configuration is
involved. Images copy the current local source, including uncommitted edits;
they do not bind-mount or modify it. Rebuild to pick up source changes.

Useful v1 pages:

- Enigma: http://localhost:8181/phpsite/prosjekter/infprog/2016-1/oblig-5/oppgave-1-2-3.php
- Weather: http://localhost:8181/phpsite/prosjekter/infprog/2016-1/oblig-5/oppgave-4.php
- SWIM: http://localhost:8181/phpsite/prosjekter/infprog/2016-1/oblig-4/swim/

The weather API is deprecated and intentionally remains unchanged. This setup
is for previewing the existing application, not a production deployment.
External fonts, embedded media and old external links retain their dependencies.

PHP registration records, game scores and weather caches are writable inside
the container. They survive stop/start, but are **discarded when the container
is recreated or removed**. Use synthetic preview data. Existing source data
is not modified; local weather caches and SWIM scores are excluded from builds.

```sh
# Inspect containers and logs
docker compose -f compose.preview.yaml ps
docker compose -f compose.preview.yaml logs --tail=50

# Pause while retaining the preview container data
docker compose -f compose.preview.yaml stop
# Resume those same containers
docker compose -f compose.preview.yaml start

# Remove preview containers (also discards their runtime data)
docker compose -f compose.preview.yaml down
```

The pre-existing `docker-compose.local.yml` and `dev/` setup remain available.
The v2 container uses a Node compatibility option for Gulp's older module
loader, without changing the source imports or dependency lockfile.

The container copies original static assets after Gulp runs, avoiding binary
re-encoding and the legacy JS output-path issue. PHP diagnostics go to container
logs instead of appearing in the original page layout; deprecation warnings
remain available there. No application source is patched by these builds.

## Verification — 2026-09-09

Both images built and started locally. The check below passed 164 page/asset
requests, including original binary comparisons for sampled images/icons.
It is read-only and does not query the deprecated forecast service.

```sh
python3 docker/preview/check.py
```

Browser verification covered both homepages, the static HTML assignment,
Enigma's registration form and a successful synthetic local registration,
and the unchanged weather interface. The preview contains that one test
registration (`Docker Preview Test`, `preview@example.invalid`); the source
registration file is unchanged. At this initial verification, old externally hosted navigation links and
PHP deprecation warnings remained as follow-up work. Navigation was subsequently
repaired as recorded below. This is not an assertion
that every historical exercise or external integration works.

## Navigation repairs — 2026-09-09

Seven v2 coursework pages now link Home/logo to `/staticsite/`, About to
`/staticsite/om.html` and Assignments to the local Oblig 1 index. Lab goes
through `/v1/lab/` to the older edition. Set `V1_ORIGIN` when starting Compose
to change its destination (default `http://localhost:8181`; no trailing slash).
For example, deployment can use `https://edu-hio-bjornarh-v1.bjornar.dev`.
These repairs change navigation targets, not page styling.

The v1 Lab page now handles the absent `lab/js` directory with an explicit
empty state and completes rendering. It lists available non-hidden files if
that directory is restored, escaping file labels and URLs. The old folder link
was removed because no directory index exists. The source archive contains no
lab exercises to restore.

```sh
python3 docker/preview/check-navigation.py
```

The local read-only crawl passes 51 URLs from v1 and 66 from v2, including
cross-version navigation, with no old student-host self-links or HTTP failures.
It excludes forms, query-string requests, external links and backend actions;
it does not validate every exercise's behavior. The 164 page/asset checks also
pass. Browser checks verified About and Lab destinations. Refresh already-open
coursework pages to replace cached navigation. Existing preview registrations
were preserved during the v1 rebuild. The weather integration remains unchanged.

## Enigma background video — 2026-09-09

The MP4 loaded successfully but remained paused at time zero while unmuted.
Added `muted` and `playsinline` to its autoplay element. The existing scroll
handler now reads `window.scrollY` and handles a rejected `play()` promise.
Video file, poster, styling and responsive visibility are unchanged.

Rebuilt v1 while preserving preview registrations and any scores. Browser
verification confirmed muted autoplay, advancing playback time, pause below
the header and resume on returning to the top. Smaller layouts retain the
original static-image fallback. PHP syntax and diff checks passed.

Video threshold refinement: playback now pauses only when the bottom of
“Kommende bedriftspresentasjoner” passes the viewport top, using the heading's
actual bounding rectangle. Verified playing with the heading visible, paused
after it left the viewport, and resumed on scrolling back. Local v1 rebuilt;
preview registrations/scores preserved.

## Production images

`Dockerfile.cluster` has targets `v1` and `v2`. Both run as uid/gid 1000 on
port 8080 with a read-only root filesystem and a writable `/tmp`. The v2
image also serves the edition chooser when Host is
`edu-hio-bjornarh.bjornar.dev`; v2's host retains `/staticsite/` and the v1
Lab link uses the agreed production hostname.

The v1 workload is an archival demo. Registrations, scores, sessions and
weather catalogue/cache writes live under `/tmp` and disappear on pod
replacement. Seed registration records come from the source archive, not the
local preview container. No PVC, database or application credentials are used.
The PHP workload must have deny-all outbound NetworkPolicy: the old forecast
proxy and obsolete external anti-cheat integration are not restored. Browser
requests for external fonts/media remain unchanged.

Build both production targets for linux/amd64, then run their checks:

```sh
docker build --platform linux/amd64 -f Dockerfile.cluster --target v1 -t edu-v1:production .
docker build --platform linux/amd64 -f Dockerfile.cluster --target v2 -t edu-v2:production .
```

The PHP production configuration uses its public HTTPS hostname for redirects;
use the preview images above for local browsing. Run the production checks with:

```sh
python3 docker/production/check.py edu-v1:production edu-v2:production
```

Tests use temporary containers and synthetic submissions. They verify non-root,
read-only operation, demo writes, video byte ranges, local place search, routes
and the edition chooser. Source publication does not deploy: private
infrastructure CI publishes pinned source commits to private GHCR packages;
Flux deploys only explicitly reviewed image digests.
