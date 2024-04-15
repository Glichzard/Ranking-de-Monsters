<?php

require "db.php";

$sort = json_decode($_POST["sort"]);

foreach($sort as $id) {
    $pos = array_search($id, $sort);
    $query = "UPDATE monsters SET ranking = $pos WHERE id = $id";
    $conn->query($query);
}