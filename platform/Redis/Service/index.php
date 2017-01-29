<?php

set_time_limit(60*60);
ini_set('memory_limit', '4096M');
ini_set('max_execution_time',60*60);

$file = 'data/redisbackup-0001.json';




$rowData = file_get_contents($file);
$data = json_decode($rowData);

$keys = array_keys($data);

var_dump(array_count_values($keys));