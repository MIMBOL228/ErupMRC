<script>
function detproc(one,two){
    var three = one / 100;
    var c = two / three;
    return Math.round(c);
   }
  var server = <?php echo transptoj($confi->servers); ?>;
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