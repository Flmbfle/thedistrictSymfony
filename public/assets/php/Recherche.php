<?php

$pdo = new PDO('mysql:host=localhost;dbname=theDistrict', 'admin', 'Afpa1234');

$query = $_POST['query'];


$stmt = $pdo->prepare("SELECT * FROM plat WHERE libelle LIKE :query");
$stmt->execute(['query' => "%$query%"]);
$plat = $stmt->fetchAll();

foreach ($plat as $plat) {
    echo 
    '
    <div class="card m-1 p-1 col-10 rounded-5 shadow bg-gris border-0">
        <div class="row g-0 bg-beige border border-black rounded-5">
            <div class="col-2 d-flex align-items-center justify-content-center">
                <img src="/assets/img/plats/' . $plat['image'] . '" class="card-img img-fluid rounded-start-5" alt="Image de la carte">
            </div>
            <div class="col-10 h-100 text-center px-3">
            <p class="card-text">
                <h6 class="card-title fs-3">' . $plat['libelle'] . '</h6>' . $plat['description'] . '
            </p>
                <div class="d-flex justify-content-center align-content-end flex-wrap">
                    <p class="card-text mb-0 mx-3"><small class="text-black fs-6">Prix : ' . $plat['prix'] . ' €</small></p>
                    <a href="/commande.php?id=' . $plat['id'] . '" class="btn btn-outline-dark fs-6">Commander</a>
                </div>
            </div>
            

        </div>
    </div>
    ';
    }