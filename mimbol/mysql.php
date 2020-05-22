<?php
  $conf = $confi->bd;
  $bd = new mysqlo();
  $dsn = sprintf('mysql:dbname=%s;host=%s;charset=utf8;', $conf['dbname'], $conf['ip']);
  try {
    $connect = new PDO($dsn, $conf['user'], $conf['password']);
  } catch (PDOException $exception) {
    die('Unable to connect: ' . $exception->getMessage());
  }
  unset($conf);
  class mysqlo{
    function startsWith ($string, $startString){
     $len = strlen($startString);
     return (substr($string, 0, $len) === $startString);
    }
    function query(string $sql, array $parameters){
     global $connect;
     $statement = $connect->prepare($sql);
     $newParameters = [];
     foreach ($parameters as $key => $value) {
        if (! $this->startsWith($key, ':')) {
            $newParameters[':' . $key] = $value;
        } else {
              $newParameters[$key] = $value;
          }
     }
     $statement->execute($newParameters);
     if (false !== stripos($sql, 'SELECT')) 
        return $statement->fetch(PDO::FETCH_ASSOC);
     return [];
    }
  }