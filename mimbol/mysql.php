<?php
    function con() {
     $dsn = sprintf('mysql:dbname=%s;host=%s;charset=utf8;', $GLOBALS['db']['dbname'], $GLOBALS['db']['ip']);
     $user = $GLOBALS['db']['user'];
     $password = $GLOBALS['db']['password'];
     try {
       $connection = new PDO($dsn, $user, $password);
     } catch (PDOException $exception) {
       die('Unable to connect: ' . $exception->getMessage());
     }
     return $connection;
    }
    function startsWith ($string, $startString){
     $len = strlen($startString);
     return (substr($string, 0, $len) === $startString);
    }
    function query(string $sql, array $parameters){
     $statement = con()->prepare($sql);
     $newParameters = [];
     foreach ($parameters as $key => $value) {
        if (! startsWith($key, ':')) {
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
    function table($table,$or=0,$do=99999){
     $con = mysqli_connect($GLOBALS['db']['ip'],$GLOBALS['db']['user'],$GLOBALS['db']['password'],$GLOBALS['db']['dbname']);
     $result = mysqli_query($con,"SELECT * FROM `$table` LIMIT $or,$do")  or die(mysqli_error($con));
     mysqli_close($con);
     return $result;
    }