#!/usr/bin/env bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
tail -q -f $DIR/../var/log/*.log| cut -c 63-1000000