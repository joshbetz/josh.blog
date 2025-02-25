#!/bin/bash

$DIR=$(dirname "$0" && cd .. && pwd)

# This script generates critical CSS for a given URL using the critical tool.
curl https://josh.blog | npx critical -c $DIR/style.css --width 1300 --height 900 > $DIR/critical.css.php
