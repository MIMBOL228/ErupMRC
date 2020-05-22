<?php
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