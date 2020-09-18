<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  








<?php 

$telegram = 614087009;
$frases = ["Por la montraña", "Por el brillo de sus ojos","Soy... El aspecto del protector. Soy TARIC!"];
$mensaje = $frases[random_int(0, count($frases)-1)];
$path = "https://api.telegram.org/bot1304228002:AAECazvL_R-qOpffA6cJbOgv1RMyxEZnbYI";
    file_get_contents($path."/sendmessage?chat_id=".$telegram."&text=$mensaje");

?>









</body>
</html>