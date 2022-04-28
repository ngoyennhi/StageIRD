<?php 
// Delete all XMl files in folder data/results/file before import 
array_map('unlink', glob('../data/*.xml'));
array_map('unlink', glob('../results/*.xml'));
array_map('unlink', glob('../file/*.xml'));