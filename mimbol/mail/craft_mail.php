<?php
function craftt($text, $name){
   return "
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<link href='http://allfont.ru/allfont.css?fonts=troika' rel='stylesheet' type='text/css'/>
</head>
<body>
	<h1>
		<a>
			<span sss='color: #01f7af;'>EXECUTE</span> <span sss='color: #ff00bd;'>WORLD</span>
		</a>
	</h1>
	<h2  >Привет,$name</h2>
	<p sss='font-size: 25px; 	text-align: center;'>
		$text
	</p>
	<h2 sss='text-align: center;'>С УВАЖЕНИЕМ:</h2>
	<h1 sss='margin: 0; text-align: center; font-size: 90px; font-size: 70px;'>
		<a sss='text-decoration: none;' href='https://executeworld.ru' target='_blank'>
			<span sss='color: #01f7af;'>EXECUTE</span> <span sss='color: #ff00bd;'>WORLD</span>
		</a>
	</h1>
</body>
</html>";
}    
function textemail($hash , $name,$mode=1){
 if($mode){
    $text = " Произведина попытка востановления пароля от вашего
    аккаунта, поэтому это письмо у вас.
    Для востановления пароля перейдите по следуйщему адресу:
    <a  href='https://executeworld.ru/passw?hash=$hash'>Восстановить</a>
    Если вы не запрашивали пароль просто проигнорируйте
    это сообщение. Ответ не будет рассмотрен.";
    return craftt($text, $name);
 }else{
    $text = " Произведён запрос подтверждение
    почты.Для аккаунта
    Для подтверждения почты перейдите по следуйщему адресу:
    <a href='https://executeworld.ru/pocht?hash=$hash'>Подтверждение</a>
    Если вы не запрашивали подтверждение просто 
    проигнорируйте это сообщение. Ответ не будет рассмотрен.";
    return craftt($text, $name);
 }
}