<?php

require "db.php";

$id = $_POST["id"];

$query = "SELECT foto FROM monsters WHERE id = $id";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$foto = $row["foto"];

$query = "DELETE FROM monsters WHERE id = $id";
$conn->query($query);

unlink("./monsters/$foto");