<?php

require(__DIR__ . "/load/bootstrap.php");

$error = "Please provide arguments: module (system, settings, game, etc.),  action, subject and optional arguments";
if (isset($argv[1]) && $argv[1]=='system'){
    require (__DIR__."/load/system.php");
    echo "System";
}

if (isset($argv[1]) && isset($argv[2])){
    require (__DIR__ . "/load/client.php");
    $opt = array_slice($argv, 4);
    $out = call($argv[1], $argv[2], $argv[3], $opt);
    if (!empty($out)) {
        print_r($out);
    } else {
        die("Sorry, there is nothing useful in response");
    }
} else {
    die( $error);
}
exit();