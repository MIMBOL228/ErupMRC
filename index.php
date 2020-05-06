<?php
include 'libs.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $project['name'];?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.css">  
  <link rel="stylesheet" type="text/css" href="style.css?t=<?php echo time();?>">
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.js" ></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 
  <link rel="shortcut icon" href="/img/<?php echo $project['img'];?>">
</head>
<body>
  <header>
    <div class="header-background"></div>
    <nav class="menu">
      <a href="">ГЛАВНАЯ</a>
      <a href="">ТОПЛИСТ</a>
      <a href="">БАНЛИСТ</a>
      <a href="" data-toggle="modal" data-target="#yalta">ДОНАТ</a>
    </nav>
    <nav class="authorization">
      <a href="#" data-toggle="modal" data-target="#exampleModal">ВХОД</a>
      <a href="">РЕГИСТРАЦИЯ</a>
    </nav>
  </header>
  <section class="first-screen">
    <div class="first-screen__background"></div>
    <section class="slogan">
      <h1 style="
    margin-top: 60px;
">МЫ - НЕ ВСЕ !</h1>
      <h3>МЫ - КОММАНДА !</h3>
      <a href="">НАЧАТЬ</a>
    </section>
  </section>
  <section class="second-screen">
    <section class="left-side">
      <img src="./img/oven.png" class="oven-img">

      <div class="minceraft-characters">
        <img src="./img/minecraft-characters.png">
      </div>

      <img src="./img/workbench.png" class="workbench-img">
    </section>
    <section class="right-side text-block">
      <h2 class="head-text">НАША КОММАНДА</h2>
      <p class="description">
        СТРЕМИТЬСЯ ПОКОРИТЬ ВАШИ СЕРДЦА,
        СОЗДАВАЯ РАЗЛИЧНЫЕ ИВЕНТЫ,
        СБОРКИ, РЕЖИМЫ И МИНИ-ИГРЫ.        
      </p>
    </section>
  </section>
  <section class="third-screen">
    <section class="left-side text-block">
      <h2 class="head-text">НАШИ СЕРВЕРА</h2>
      <p class="description">
        НЕ СТОЯТ БЕЗ ПРОСТОЯ, КАЖДЫЙ
        ДЕНЬ НА НИХ ИГРАЮТ ДЕСЯТКИ ИГРОКОВ,
        ПРИСОЕДИНЯЙСЯ К НИМ!
      </p>
    </section>
    <section class="right-side">
      <section class="stats">
        <h3>МОНИТОРИНГ</h3>
        <div>
          <h5 id='fbr_HiTech'>HI-TECH(15 ИЗ 100)</h5>
          <div class="progressbar">
            <div class="progress hi-tech" id="puska_HiTech"></div>
          </div>
        </div>
        <div>
          <h5 id='fbr_Minigames'>MINIGAMES(35 ИЗ 100)</h5>
          <div class="progressbar">
            <div class="progress minigames" id="puska_Minigames"></div>
          </div>
        </div>
        <div>
          <h5 id='fbr_Vanila'>VANILA(55 ИЗ 100)</h5>
          <div class="progressbar">
            <div class="progress vanila" id="puska_Vanila"></div>
          </div>
        </div>
      </section>
    </section>
  </section>
  <footer>
    <section class="copyright">© <?php echo $project['name'];?>, все права защищены</section>
    <section>
      <section class="contacts">
        <p><?php echo $project['tel'];?></p>
        <p><?php echo $project['email'];?></p>
      </section>
      <section class="links">
          <a href="<?php echo $urls['yt'];?>">
            <img src="./img/yt.png">
          </a>
          <a href="<?php echo $urls['ok'];?>">
            <img src="./img/ok.png">
          </a>
          <a href="<?php echo $urls['vk'];?>">
            <img src="./img/vk.png">
          </a>
        </section>
      </section>
  </footer>
  <script type="text/javascript" src="https://vk.com/js/api/openapi.js?167"></script>


  <?php include 'modals.php'; ?>
<!-- VK Widget -->
<script type="text/javascript" src="https://vk.com/js/api/openapi.js?168"></script>

<!-- VK Widget -->
<div id="vk_community_messages"></div>
<script type="text/javascript">
VK.Widgets.CommunityMessages("vk_community_messages", <?php echo $vk['id'];?>, {expandTimeout: "<?php echo $vk['sec'];?>000",widgetPosition: "left",tooltipButtonText: "Есть вопрос?"});
</script>
  <script>
    function detproc(one,two){
     var three = one / 100;
     var c = two / three;
     return Math.round(c);
    }
   var server = <?php echo transptoj($servers); ?>;
    function scan(ip,id,id_procces,server){
      $.ajax({
    	url: 'https://api.mcsrvstat.us/2/' + ip,         /* Куда пойдет запрос */
    	method: 'get',             /* Метод передачи (post или get) */
    	dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
    	data: {ip: ""},     /* Параметры передаваемые в запросе. */
    	success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
        var datay = JSON.parse(data);
    		console.log(datay['online']);            /* В переменной data содержится ответ от index.php. */
        if(datay['online'] == false){
         $(id).width("100%")
         $(id_procces).text(server[0] + " (ОФЛАЙН)");
         $(id).css("background-color", "red" )
        }else{
          var dss = detproc(datay.players.max,datay.players.online);
          console.log(Number(dss))
         if(Number(dss) > 100){
           console.log(Number(dss))
          dss = '100';
         }
         $(id).width(dss + "%")
         $(id_procces).text(server[0] + "(" + datay.players.online + " из " + datay.players.max +")");
        }
      }
     });
    } 
    let timerId = setInterval(perebor, 1000,server)
    function perebor(servers){
     var index = 0;
     for (index = 0; index < servers.length; ++index) {
      console.log(servers[index]);
      scan (servers[index][1] + ":" + servers[index][2],"#puska" + "_" + servers[index][0] ,"#fbr" + "_" + servers[index][0],servers[index]);
     }
    }
  </script>
</body>
</html>