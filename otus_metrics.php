#!/usr/bin/php
<?php
/*
 *  Metrics generator
 */

//remove script name
array_shift($argv);
$cmd    = trim(array_shift($argv));
$param1 = trim(array_shift($argv));

//number of metrics
$n   = 3;
//metrics key for discovery
$mk  = '{#METRICNAME}';
$mp  = 'metric';
$out = '';

switch ($cmd) {
    //Get value for any metric
    case 'value':
        $out  = rand(0, 100);
        break;
    //Get list of metrics
    case 'discovery':
    default:
        $data = array();
        for ($i = 0; $i < $n;) {
            $m        = new stdClass();
            $m->{$mk} = $mp . ++$i;
            $data[]   = $m;
        }
        $out = json_encode($data);
}
echo $out;
