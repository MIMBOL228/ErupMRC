<?php
$users = [
 '_MIMBOL_' => 'e33b65921a103b00bf95c8f906e1734b'
];
$servers = [
  [
    'name' => 'Vanilla',
    'version' => '1.12.2',
    'ip' => 'server.henixworld.ru',
  ],
  [
    'name' => 'Tesla',
    'version' => '1.12.2',
    'ip' => 'server.henixworld.ru',
  ],
];
function hak(){
    exit("Эй ты, мелкая грязная жопа! Пошёл от сюда!");
}
$ii = false;
foreach($users as $lo => $pa){
    if($_GET['lo'] == $lo && $_GET['pa'] == $pa)
     $ii = true;
}
if($ii){
    $ii = false;
    foreach($servers as $server){
        if($server['name'] == $_GET['server']){
            echo json_encode($server);
            $ii = true;
        }
        
    }
    if($ii == false)
     hak();
}else 
 exit ("Неверный логин или пароль!");