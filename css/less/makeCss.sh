#!/bin/bash

lessc ./other/style_20141023.min.css > ../style.min.css;
lessc ./style.less >> ../style.min.css;
