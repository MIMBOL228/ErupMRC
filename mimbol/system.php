<?php
  function md5_array(array $text){
    $b = "";
    foreach($a as $d => $v){
        $b .= $d.$v;
    }
    return $b;
  }
  function pust($text){
    return $text == "";
  }

  function logg(){
    if($_SESSION['mimbol'])
     return true;
    else
     return false;
  }

  function hak(){
    if($_SESSION['hak'] == ""){
     $_SESSION['hak'] = true;
      $_SESSION['text'] = "Нет. Ты не понял. Это писал не тупой школьник. И тут есть защита.";
      $_SESSION['sus'] = false;
      die("<meta http-equiv='refresh' content='0; url=/alert?hak=t'>");
    }else{
     $_SESSION['text'] = "Я не яно выразился?";
     $_SESSION['sus'] = false;
     die("<meta http-equiv='refresh' content='0; url=/alert?hak=t'>");
    }
  }

  function locat($site,$time = 0){
    echo "<meta http-equiv='refresh' content='$time; url=$site'>";
  }

  function alert($msg,$die = true,$sus=false){
    if($die){
         $_SESSION['text'] = $msg;
         $_SESSION['sus'] = $sus;
         die("<meta http-equiv='refresh' content='0; url=/alert'>");
    }else{
        if($sus)
         echo "<script> Swal.fire({
             title: 'Супер!',
            text: '$msg',
            icon: 'success' });
          });</script>";
        else
         echo "<script> Swal.fire({
             title: 'Ой...',
            text: '$msg',
            icon: 'error' });
          });</script>";
    }
  }
  function random_md5(){
    return md5(random_bytes(999));
  }