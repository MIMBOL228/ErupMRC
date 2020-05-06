<?php
include 'config.php';
include 'mimbol/index.php';
function transptoj($text){
    $tex = json_encode($text);
    return "JSON.parse('".$tex."')";
}