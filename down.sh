#!/bin/bash
for i in ./*/down.sh; do
  cd "$(dirname "$i")"
  ./down.sh &
  cd ..
done
wait
