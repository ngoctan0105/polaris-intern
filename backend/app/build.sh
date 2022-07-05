#!/usr/bin/env bash

docker build . -f prod.dockerfile -t kapien/kap_s

docker push kapien/kap_s