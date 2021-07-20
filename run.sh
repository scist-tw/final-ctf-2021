#!/bin/sh
for i in ./*/*/docker-compose.yml; do
  cd "$(dirname "$i")"
  docker-compose $@ &
  cd ../..
done
wait
