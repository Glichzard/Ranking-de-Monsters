<?php

require "db.php";

$target_dir = "./monsters/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (empty($_FILES["photo"])) {
    $uploadOk = 0;
}

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    $uploadOk = 0;
}

if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Error al subir la foto, prueba cambiando el nombre o subiendo un archivo y asegurate que sea una imagen xd";
} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        $nombre = $_POST["name"];
        $description = $_POST["desc"];
        $foto = htmlspecialchars(basename($_FILES["photo"]["name"]));

        $query = "INSERT INTO monsters (nombre, description, foto) VALUES ('$nombre', '$description', '$foto')";
        $conn->query($query);

        echo "1";
    } else {
        echo "Error al subir la foto, prueba cambiando el nombre o subiendo un archivo y asegurate que sea una imagen xd";
    }
}