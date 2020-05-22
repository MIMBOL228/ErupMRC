<?php
function getnew($id){
    $q = query("SELECT * FROM `news` WHERE `id` = :id ",['id' => $id]);
    $inm_url = "https://executeworld.ru/news/".$id."/".$q['img'].'.png';
    return [
        'name' => $q['name'],
        'subtitle' => $q['subtitle'],
        'text' => $q['text'],
        'img' => $q['img'],
        'img_url' => $inm_url
     ];
  }
  function table($table,$or=0,$do=99999){
    $con = mysqli_connect($GLOBALS['db']['ip'],$GLOBALS['db']['user'],$GLOBALS['db']['password'],$GLOBALS['db']['dbname']);
    $result = mysqli_query($con,"SELECT * FROM `$table` LIMIT $or,$do")  or die(mysqli_error($con));
    mysqli_close($con);
    return $result;
  }

  function transptoj($text){
    $tex = json_encode($text);
    return "JSON.parse('".$tex."')";
  }