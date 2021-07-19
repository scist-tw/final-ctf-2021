#!/bin/bash
export HOST=${HOST:-34.81.183.1}
for d in ./*/test.sh
do
  cd "$(dirname $d)"
  ./test.sh
  cd ..
done
