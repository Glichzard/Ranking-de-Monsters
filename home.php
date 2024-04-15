<?php

require "./db.php";

$query = "SELECT * FROM monsters ORDER BY id DESC";
$result = $conn->query($query);

?>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Ranking de Monsters</h1>
            <p class="lead text-muted">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam, facere!</p>
            <p>
                <a href="#" class="btn btn-primary my-2" onclick="goRanking()">Ir a los rankings</a>
            </p>
        </div>
    </div>
</section>
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php

            while ($row = $result->fetch_assoc()) { ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="./monsters/<?= $row["foto"]?>" alt="" class="rounded">

                        <div class="card-body">
                            <p class="card-text"><?= $row["description"]?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="card-text"><?= $row["nombre"]?></span>
                                <small class="text-muted">NoR: <?= $row["ranking"] + 1?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }

            ?>
        </div>
    </div>
</div>