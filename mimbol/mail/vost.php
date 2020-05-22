<?php
  function veremail($email){
    $result1=query("SELECT * FROM usertbl WHERE email = :email",['email' => $email]);
    if($result1['user_group'] == 1)
      alert("Администраторы не могут восстановить свой пароль, обратитесь к тех. администрации!");
    if($result1['username'] == false)
      return '0';
    else
     return '1';
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
