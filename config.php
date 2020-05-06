<?php
$db = array(
    'tex' => false,//Включение\выключение тех. работ.   true - да               false - нет.
    'ip' => 'localhost',//Адрес базы данных
    'user' => '',//Имя пользователя
    'password' => '',//Пароль от базы данных
    'dbname' => '',//Имя базы данных
  );
  $urls = [
      'ok' => 'https://ok.ru/',
      'vk' => 'https://vk.com/',
      'yt' => 'https://www.youtube.com/',
  ];
  $tmc = [
   'id' => '1', //
   'key' => '',
  ];
  /*$da = [
    'id'=> '',
  ];*/
  $project = [
      'name' => 'TestdCraft', //Имя проекта
      'email' => 'testmail@mail.com', //Почта проекта
      'tel' => '+79123456789', //Телефон проекта (или вторая почта)
      'img' => 'computer_25734.png', //Иконка сайта в папке img
  ];
  $emaill = [
    'login' => 'administrarion1@executeworld.ru', // Имя пользователя почтового сервера
    'password' => 'movtavnewdzqenvw', // Пароль от пользователя почтового сервера
    'host' => 'smtp.yandex.ru', // SMTP адрес почтового сервера
    'title' => 'Execute World',
    'charset' => 'UTF-8',
    ];
$recap = [
    'public' => '6LfAEuMUAAAAAMKI56U7j9_5dEHS9c-WSe8yQ9Ee', // Публичный ключ рекапчи
    'secret' => '6LfAEuMUAAAAAJueflQISetQInRnmKH6br5Vd8nP' // Секретный ключ рекапчи (его никому не говорите)
    ];
$vk = [ 
    'id' => '169440684', // ID группы вашей вконтакте
    'sec' => '15', //Открывать сообщения через сколько-то сек (во дефулту через 15 сек)
    ];
$servers =[
        [
          "Vanila",
          "mc.hypixel.net",
          "25565"
        ],
        [
          "HiTech",
          "46.174.48.33",
          "25668"
        ],
        [
          "Minigames",
          "94.23.204.159",
          "2561"
        ]
      ];