<?php
include 'index.php';
query("INSERT INTO `prov_mail` (`username`, `email`, `hash`) VALUES (:name , :email , :hash );", [
     'name'    =>  $username,
     'email'   =>  $mail,
     'hash'    =>  $hash1,
     ]);