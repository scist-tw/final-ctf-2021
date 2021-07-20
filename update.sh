#!/bin/bash
git pull
LIP=`hostname -i` ./run.sh up --build -d
