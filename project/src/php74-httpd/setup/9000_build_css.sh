#!/usr/bin/env bash

set -ex

# pushd example-app
#   find **/{sass,scss} |entr -c -s "npm run build"

pushd example-app
  npm run build
