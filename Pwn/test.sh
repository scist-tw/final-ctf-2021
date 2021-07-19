#!/bin/bash
for i in */exploit*
do
  cd "$(dirname $i)"
  ./$(basename $i) NOCHECKSEC
  cd ..
done
