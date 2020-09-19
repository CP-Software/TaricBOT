<?php
include("conectar.php");
if(isset($_POST["frasecilla"])){
    $frase = $_POST["frasecilla"];
    $sql = "INSERT INTO taricbot (id, texto) VALUES (null, '$frase')";
    if($do = mysqli_query($link, $sql))
    {
        $id = $link->insert_id;
    }else
    {
        echo mysqli_error($do);
        exit;
    }
}
$target_dir = "audios/taric/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["file"]["tmp_name"]);
  if($check == false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
      // Check if file already exists
  } else {
    echo "El Archivo es una imagen  ".$_FILES["file"]["type"]."<br> Subalo en formato PDF por favor";
    $uploadOk = 0;
  }
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 1;
}
if ($uploadOk == 0) {
  echo 'Conviertalo a archivo de imagen y vuelva a intentarlo.';
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
    rename($target_file,"audios/taric/".$id.".mp3");
    header("Location: ".$_SERVER['HTTP_REFERER']);
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>