#!/bin/sh
for i in ./*/setup.sh; do
  cd "$(dirname "$i")"
  ./setup.sh &
  cd ..
done
wait
