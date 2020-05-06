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