
<?php
include("./conectar.php");
$sql = "SELECT * FROM taricbot";
$do = mysqli_query($link, $sql);
?><?php 
if(isset($_POST["frase"])){
$mensaje = $_POST["frase"];
$telegram = 614087009;
$frases = ["Por la montraña", "Por el brillo de sus ojos","Soy... El aspecto del protector. Soy TARIC!"];
$path = "https://api.telegram.org/bot1304228002:AAECazvL_R-qOpffA6cJbOgv1RMyxEZnbYI";
    file_get_contents($path."/sendmessage?chat_id=".$telegram."&text=$mensaje");

}
if(isset($_POST["frasecilla"])){
    $frase = $_POST["frasecilla"];
    $audio = $_POST["audio"];
    $sql = "INSERT INTO taricbot (id, texto, audio) VALUES (null, '$frase', '$audio')";
    if($do = mysqli_query($link, $sql))
    {
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else
    {
        echo mysqli_error($do);
        exit;
    }
}
?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Taric - CPBots</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white text-right shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button></div>
                </nav>
                <div class="container-fluid">
                    <div class="text-center mt-5">
                        <form method="POST">
                            <div class="form-group"><label for="address"><strong>Frase</strong></label>
                            <input type="text" class="form-control" require="" placeholder="La muerte es como el viento..." name="frasecilla" id=""><br>
                            <div class="form-group"><label for="address"><strong>URL Audio (en mp3)</strong></label>
                            <input type="text" class="form-control" require="" placeholder="Pega el url del audio en mp3" name="audio"> <br>
                            <button type="submit" style="margin-bottom: 20px;" class="btn btn-primary btn-block text-white btn-user">Enviar</button>
                        </form>
                        <img src="https://pm1.narvii.com/6241/a0c8e9e087cc4897372231dc0911871e695dc63c_00.jpg" alt="">
                    </div>
                </div><?php
                while($row = mysqli_fetch_assoc($do))
                {
                    echo'<audio 
                    controls
                    src="'.$row["audio"].'">
                </audio>
                    <form method="POST" class="text-center" style="margin: 10px">
                        <button class="btn btn-primary" name="frase" value="'.$row["texto"].'">'.$row["texto"].'</button>
                        
                    </form>'; 
                }
                ?>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © CPBots 2020</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
