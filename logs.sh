#!/bin/sh
read_log() {
  docker-compose logs -f | while read log
  do
    echo $1: $log
  done
}
for i in ./*/*/docker-compose.yml; do
  d=$(dirname "$i")
  cd "$d"
  read_log "$d" &
  cd ../..
done
wait
