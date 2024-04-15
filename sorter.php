<?php

require "./db.php";

$query = "SELECT * FROM monsters ORDER BY ranking ASC";
$result = $conn->query($query);

?>

<ul id="sortable">
    <?php

    while ($row = $result->fetch_assoc()) { ?>
        <li prodId="<?= $row["id"] ?>">
            <div class="card">
                <div class="card-body">
                    <div class="left">
                        <i class="fa-solid fa-grip-vertical"></i>
                        <img src="monsters/<?= $row["foto"] ?>" alt="" class="rounded">
                        <?= $row["nombre"] ?>
                    </div>
                    <button type="button" class="btn btn-danger" onclick="deleteMonster(<?= $row['id']?>)">Eliminar</button>
                </div>
            </div>
        </li>
    <?php }

    ?>
</ul>