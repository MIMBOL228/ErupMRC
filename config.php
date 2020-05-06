<?php
  $db = [ //База данных
    'tex' => false,//Включение\выключение тех. работ.   true - да               false - нет.
    'ip' => 'localhost',//Адрес базы данных
    'user' => '',//Имя пользователя
    'password' => '',//Пароль от базы данных
    'dbname' => '',//Имя базы данных
    ];
  $urls = [ //Ссылки
      'ok' => 'https://ok.ru/', //Одноклассники (На всякий случай) 
      'vk' => 'https://vk.com/', //Вконтакте
      'yt' => 'https://www.youtube.com/', //Ютюб
    ];
  $tmc = [ // TradeMC
   'id' => '1', //ID магазина
   'key' => '', //Секретный ключ магазина
   ];
  /*$da = [ //DonationAlerts
    'id'=> '', //ID пользователя
    ];*/
  $project = [ // Проект
      'name' => 'TestdCraft', //Имя проекта
      'email' => 'testmail@mail.com', //Почта проекта
      'tel' => '+79123456789', //Телефон проекта (или вторая почта)
      'img' => 'computer_25734.png', //Иконка сайта в папке img
    ];
  $emaill = [  // SMTP сервер
    'login' => 'administrarion1@executeworld.ru', // Имя пользователя почтового сервера
    'password' => '', // Пароль от пользователя почтового сервера
    'host' => 'smtp.yandex.ru', // SMTP адрес почтового сервера
    'title' => 'Execute World', // Имя отправившего
    'charset' => 'UTF-8', // Кодировка письма
    ];
  $recap = [ //reCAPTCHA
    'public' => '6LfAEuMUAAAAAMKI56U7j9_5dEHS9c-WSe8yQ9Ee', // Публичный ключ рекапчи
    'secret' => '6LfAEuMUAAAAAJueflQISetQInRnmKH6br5Vd8nP' // Секретный ключ рекапчи (его никому не говорите)
    ];
  $vk = [  // Группа ВК
    'id' => '169440684', // ID группы вашей вконтакте
    'sec' => '15', //Открывать сообщения через сколько-то сек (во дефулту через 15 сек)
    ];
  $servers =[ // Сервера проекта
        [
          "Vanila", // Имя
          "mc.hypixel.net", // IP
          "25565" //Порт
        ],
        [
          "HiTech", // Имя
          "46.174.48.33", // IP
          "25668"
        ],
        [
          "Minigames", // Имя
          "94.23.204.159", // IP
          "2561" //Порт
        ],
      ];