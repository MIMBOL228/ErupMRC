<?php
session_start();
/*function is_session_started()
{
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}

// Example
if ( is_session_started() === FALSE ) session_start();
*/
  include 'mysql.php';
  include 'test.php';
  include 'GoogleAuthenticator.php';
  include 'cloks.php';//Эта строчка добавляет этот файл
  require_once 'PhpBadWords.php';
  require 'class.phpmailer.php';
  require_once 'ObsceneCensorRus.php';
  require_once 'mat_array.php';
  use \Expalmer\PhpBadWords\PhpBadWords as BadWords;
  $badwords = new BadWords;
  $ObsceneCensorRus = new Wkhooy\ObsceneCensorRus;
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
  function locat($site,$time = 0){
    echo "<meta http-equiv='refresh' content='$time; url=$site'>";
  }
  function transptoj($text){
    $tex = json_encode($text);
    return "JSON.parse('".$tex."')";
}
  function Send_Mail($to,$subject,$body){
   $emaill = $GLOBALS['emaill'];
   $from       = $emaill['login'];
   $mail       = new PHPMailer();
   $mail->IsSMTP(true);            // используем протокол SMTP
   $mail->IsHTML(true);
   $mail->SMTPAuth   = true;                  // разрешить SMTP аутентификацию 
   $mail->Host       = "ssl://".$emaill['host']; // SMTP хост
   $mail->Port       =  465;                    // устанавливаем SMTP порт
   $mail->Username   = $emaill['login'];  //имя пользователя SMTP  
   $mail->Password   = $emaill['password'];  // SMTP пароль
   $mail->SetFrom($from, $emaill['title']);
   $mail->AddReplyTo($from,$emaill['title']);
   $mail->CharSet = $emaill['charset'];
   $mail->Subject    = $subject;
   $mail->MsgHTML($body);
   $address = $to;
   $mail->AddAddress($address, $to);
   $mail->Send(); 
  }
   function mat($text){
    $text1=$text;
    $yt = false;
    if (preg_match("/>/", $text)){
         $yt = true;
        }
        if (preg_match("/</", $text)){
         $yt = true;
        }
    $badwords = $GLOBALS['badwords'];
    $class = $GLOBALS['ObsceneCensorRus'];
    $badwords->setDictionaryFromArray($GLOBALS['myDictionary']);
    $badwords->setText($text);
    $class::filterText($text); 
    if($badwords->check() || $text != $text1 || $yt)
     return true; 
    else 
     return false;
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
    function ban($username,$reason,$time='permanent'){
        query('INSERT INTO banlist (`name`, `email`, `block`, unblock , admin, ) VALUES',[]);
    }
    function loginset($ses){
            $_SESSION['mimbol'] = $ses;
		    locat('/index.php');
    }
   function getinfo($player){
    $info = query("SELECT * FROM users WHERE username = :player", ['player' => $player]);
    $group_id1 = $info['user_group'];
    $group = query("SELECT * FROM `user_group` WHERE `id` = :group_id1", ['group_id1' => $group_id1]);
    $ban = query("SELECT * FROM `banlist` WHERE `name` = :info", ['info' => $info['username']]);
    switch($group['name']){
      case "Admin":
       $rusgroup = "Админ";
       break;
     case "Moder":
       $rusgroup = "Модер";
       break;
     case "Youtube":
       $rusgroup = "Ютюбер";
       break;
     case "User":
       $rusgroup = "Игрок";
       break;
    }
    if($ban != false) $ban = true;
    return array(
      'money' => $info['money'],
      'id' => $info['id'],
      'vk' => $info['vk'],
      'fb' => $info['fb'],
      'tw' => $info['tw'],
      'group' => $group['name'],
      'mc' => $info['mc'],
      'dt' => $info['dt'],
      'secret' => $info['secret'],
      'ds1' => $info['ds1'],
      'ds2' => $info['ds2'],
      'act' => $info['active'],
      'ds'=> $info['ds1'].'#'.$info['ds2'],
      'yt' => $info['yt'],
      'groupid' => $group_id1,
      'rusgroup' => $rusgroup,
      'ban' => $ban,
    );
   }
   function getonoff($ses){
    $lastvisit = query("SELECT `lastvisit` FROM `users` WHERE `username` = :ses",['ses' => $ses])['lastvisit'];
    $time = time();
    $vis =  $time - $lastvisit;
    if($vis >= 300)
      return '0';
    else
      return '1';
   }
   function veremail($email){
    $result1=query("SELECT * FROM usertbl WHERE email = :email",['email' => $email]);
    if($result1['user_group'] == 1)
      alert("Администраторы не могут восстановить свой пароль, обратитесь к тех. администрации!");
    if($result1['username'] == false)
      return '0';
    else
     return '1';
   }
   
   function pust($text){
       return $text == "";
   }
   function email($email){
    $qur = query("SELECT * FROM `usertbl` WHERE `email` = :email ORDER BY `usertbl`.`id`",['email' => $email]);
    $name = $qur['username'];
    $name2 = $qur['full_name'];
    $qur2 = query("SELECT `time1` FROM `get_pass` WHERE `email` = :email ORDER BY `id` DESC LIMIT 1",['email' => $email]);
    $time = $qur2['time1'];
    $time1 = time();
    $vis =  $time1 - $time;
    if($vis < 120)
     alert('Давайте не так часто!');
    $hash = md5(uniqid(rand(),true));
    $hash1 = md5($hash);
    query('INSERT INTO `get_pass` (`username`, `email`, `hash1`, `time1`) VALUES (:name , :email , :hash , :time);', [
      'name'    =>  $name,
      'email'   =>  $email,
      'hash'    =>  $hash1,
      'time'    =>  $time1
    ]);
    Send_Mail($email, "Восстановление пароля", textemail($hash, $name2));
    alert("Ссылка была отправлена вам на почту!",1,1);
   }
   function findhash($hash,$pass){
    $hash1 = md5($hash);
    $name = query("SELECT * FROM get_pass WHERE `hash1` = :hash and `active` = 1 ",['hash' => $hash1])['username'];
    if(!$name)
     alert("Неверный hash или эта ссылка уже использована!");
    $pass1 = MD5($pass);
    $name = query("SELECT password FROM usertbl WHERE username = :name",['name' => $name]);
    if($name['password'] == $pass1)
     alert("Вы пытаетесь изменить пароль на существующий!");
    query("UPDATE `get_pass` SET `active` = 0 WHERE `hash1` = :hash and `active` = 1",['hash' => $hash1]);
    query("UPDATE `usertbl` SET `password` = :pass1 WHERE `username` = :name",['name' => $name, 'pass1' => $pass1]);
    alert("Ваш парль успешно восстановлен!");
   }
   //Подтверждение почты
   function addprovmail($username,$email){
    $hash = md5(uniqid(rand(),true));
    $hash1 = md5($hash);
    Send_Mail($email, "Подтверждение почты", textemail($hash, $username,0));
    tec($username,$email,$hash1);
    alert("Проверьте свою почту.Была выслана ссылка на подтверждение почты.",1,1);
   }
   function tec($username,$email,$hash1){
        query('INSERT INTO `prov_mail` (`username`, `email`, `hash`) VALUES (:name , :email , :hash );', [
         'name'    =>  $username,
         'email'   =>  $email,
         'hash'    =>  $hash1
        ]);
   }
   function provmail($hash){
    $hash1 = md5($hash);
    $money = '0';
    $name = query("SELECT * FROM prov_mail WHERE `hash` = :hash and `active` = 1",['hash' => $hash1])['username'];
    if(!$name)
     return "Неверный hash или эта ссылка уже использована!";
    $qqq = query("SELECT * FROM usertbl WHERE username = :ses",['ses' => $name]);
    if(!pust($qqq['user_ref'])){
     $mon = query("SELECT * FROM usertbl WHERE username = :ses",['ses' => $qqq['user_ref']])['money'];
     $mon = $mon + 3;
     $money = $money + 3;
     query("UPDATE `usertbl` SET `money` = :mon WHERE `username` = :hash",['hash' => $qqq['user_ref'],'mon' => $mon]);
    }
    query("UPDATE `usertbl` SET `active` = 1 WHERE `username` = :hash and `active` = 0 LIMIT 1",['hash' => $name]);
    query("UPDATE `prov_mail` SET `active` = 0 WHERE `username` = :name and `active` = 0 LIMIT 1",['name' => $name]);
    query("UPDATE `usertbl` SET `money` = :money WHERE `username` = :name LIMIT 1",['name' => $name,'money' => $money]);
    return true;
   }
   function login($login,$password){
     
   }