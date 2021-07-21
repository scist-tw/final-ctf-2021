#!/bin/bash
export HOST=${HOST:-chall.ctf.scist.org}
for d in ./*/test.sh
do
  cd "$(dirname $d)"
  ./test.sh
  cd ..
done
