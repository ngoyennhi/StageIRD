<?php 
// Delete all XMl files in folder data/results/file before import 
array_map('unlink', glob('StageIRD/data/*.xml'));
array_map('unlink', glob('StageIRD/results/*.xml'));
array_map('unlink', glob('StageIRD/file/*.xml'));