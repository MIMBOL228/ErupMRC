<?php
  session_start();
  $confi = new config();
  require_once 'mysql.php';
  require_once 'mail/index.php';
  require_once 'GoogleAuthenticator.php';
  require_once 'mat/mat.php';
  require_once 'lists.php';
  require_once 'auth.php';
  require_once 'system.php';
  require_once 'user.php';
  $user = new user();