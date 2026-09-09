#!/bin/sh
set -eu
mkdir -p /tmp/student/weather
for name in registrations.dat norge.json; do
    if [ ! -f "/tmp/student/$name" ]; then
        cp "/opt/student-seed/$name" "/tmp/student/$name"
    fi
done
if [ ! -f /tmp/student/scores.json ]; then
    printf '[]\n' > /tmp/student/scores.json
fi
exec apache2-foreground
