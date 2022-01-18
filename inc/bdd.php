<?php

// Connexion à la base de donnée
function bdd_connect(){
    $bdd = new PDO('mysql:host=localhost;dbname=facture_tiw', 'root', '');
    return $bdd;
}

// ----------------------------- Gestion client -----------------------------

// Ajout d'un client
function create_client(string $name){
    $bdd = bdd_connect();
    $request = $bdd->prepare('INSERT INTO clients (name) VALUES (:name)');
    $request->execute([
        ':name' => $name,
    ]);
}

// Edition d'un client
function edit_client(string $name, int $id){
    $bdd = bdd_connect();
    $request = $bdd->prepare('UPDATE clients SET name = :name WHERE id = :id');
    $request->execute([
        ':name' => $name,
        ':id' => $id,
    ]);
}

// Suppression d'un client
function delete_client(int $id){
    $bdd = bdd_connect();
    $request = $bdd->prepare('DELETE FROM clients WHERE id = :id');
    $request->execute([
        ':id' => $id,
    ]);
}

// Récupère tout les clients
function get_all_clients(){
    // récupérer tout les clients
    $bdd = bdd_connect();
    $request = $bdd->prepare('SELECT * FROM clients');
    $request->execute();
    $result = $request->fetchAll();
    return $result;
}

// Récupère un clients
function get_client(int $id){
    // récupérer tout les clients
    $bdd = bdd_connect();
    $request = $bdd->prepare('SELECT * FROM clients WHERE id = :id');
    $request->execute([
        ':id' => $id,
    ]);
    $result = $request->fetch();
    return $result;
}


// ----------------------------- Gestion produit -----------------------------

// Ajout d'un produit
function create_produit(string $name, string $description, float $price, float $tva, string $unite){

    $allowed_tva = ['5.5', '20'];

    if(!in_array($tva, $allowed_tva)){
        $tva = '20';
    }

    $allowed_unite = ['unite', 'h', 'm²'];

    if(!in_array($unite, $allowed_unite)){
        $unite = 'unite';
    }

    $bdd = bdd_connect();
    $request = $bdd->prepare('INSERT INTO produits (name, description, price, tva, unite) VALUES (:name, :description, :price, :tva, :unite)');
    $request->execute([
        ':name' => $name,
        ':description' => $description,
        ':price' => $price,
        ':tva' => $tva,
        ':unite' => $unite,
    ]);
}

// Edition d'un produit
function edit_produit(string $name, string $description, float $price, float $tva, string $unite, int $id){

    $allowed_tva = ['5.5', '20'];

    if(!in_array($tva, $allowed_tva)){
        $tva = '20';
    }

    $allowed_unite = ['unite', 'h', 'm²'];

    if(!in_array($unite, $allowed_unite)){
        $unite = 'unite';
    }

    $bdd = bdd_connect();
    $request = $bdd->prepare('UPDATE produits SET name = :name, description = :description, price = :price, tva = :tva, unite = :unite WHERE id = :id');
    $request->execute([
        ':name' => $name,
        ':description' => $description,
        ':price' => $price,
        ':tva' => $tva,
        ':unite' => $unite,
        ':id' => $id,
    ]);
}

// Suppression d'un produit
function delete_produit(int $id){
    $bdd = bdd_connect();
    $request = $bdd->prepare('DELETE FROM produits WHERE id = :id');
    $request->execute([
        ':id' => $id,
    ]);
}

// Récupère tout les produits
function get_all_produits(){
    // récupérer tout les produits
    $bdd = bdd_connect();
    $request = $bdd->prepare('SELECT * FROM produits');
    $request->execute();
    $result = $request->fetchAll();
    return $result;
}

// Récupère un clients
function get_produit(int $id){
    // récupérer tout les clients
    $bdd = bdd_connect();
    $request = $bdd->prepare('SELECT * FROM produits WHERE id = :id');
    $request->execute([
        ':id' => $id,
    ]);
    $result = $request->fetch();
    return $result;
}


// ----------------------------- Gestion facture client -----------------------------

// Ajout d'une facture
function create_facture(string $name, int $client_id){
    $bdd = bdd_connect();
    $request = $bdd->prepare('INSERT INTO factures (name, client_id) VALUES (:name, :client_id)');
    $request->execute([
        ':name' => $name,
        ':client_id' => $client_id,
    ]);
}

// Edition d'une facture
function edit_facture(string $name, int $client_id, int $id){

    $bdd = bdd_connect();
    $request = $bdd->prepare('UPDATE factures SET name = :name, client_id = :client_id WHERE id = :id');
    $request->execute([
        ':name' => $name,
        ':client_id' => $client_id,
        ':id' => $id,
    ]);
}

// Suppression d'une facture
function delete_facture(int $id){
    $bdd = bdd_connect();
    $request = $bdd->prepare('DELETE FROM factures WHERE id = :id');
    $request->execute([
        ':id' => $id,
    ]);
}

// Récupère tout les factures
function get_all_factures(){
    // récupérer tout les factures
    $bdd = bdd_connect();
    $request = $bdd->prepare('SELECT * FROM factures');
    $request->execute();
    $result = $request->fetchAll();
    return $result;
}

// Récupère une facture
function get_facture(int $id){
    // récupérer une facture
    $bdd = bdd_connect();
    $request = $bdd->prepare('SELECT * FROM factures WHERE id = :id');
    $request->execute([
        ':id' => $id,
    ]);
    $result = $request->fetch();
    return $result;
}


// Récupère tout les factures d'un client
function get_facture_client(int $client_id){
    // récupérer les factures d'un client
    $bdd = bdd_connect();
    $request = $bdd->prepare('SELECT * FROM factures WHERE client_id = :client_id');
    $request->execute([
        ':client_id' => $client_id,
    ]);
    $result = $request->fetchAll();
    return $result;
}

// Ajout d'un produit à une facture
function addProduct_facture(int $facture, int $produit, float $qty){
    $bdd = bdd_connect();
    $request = $bdd->prepare('INSERT INTO facture_produit (id_facture, id_produit, nombre) VALUES (:id_facture, :id_produit, :nombre)');
    $request->execute([
        ':id_facture' => $facture,
        ':id_produit' => $produit,
        ':nombre' => $qty,
    ]);
}

// Suppresion d'un produit d'une facture
function deleteProduct_facture(int $id, int $fid){
    $bdd = bdd_connect();
    $request = $bdd->prepare('DELETE FROM facture_produit WHERE id = :id AND id_facture = :fid');
    $request->execute([
        ':id' => $id,
        ':fid' => $fid,
    ]);
}


// ----------------------------- Appel Facture -----------------------------

function call_facture_info(int $id){
    $bdd = bdd_connect();
    $request = $bdd->prepare('SELECT 
    produits.id AS productID,
    produits.name AS productName, 
    produits.price AS productPrice,
    produits.unite AS productUnite,
    produits.tva AS productTVA,
    facture_produit.id AS facture_productID,
    facture_produit.id_produit AS productID,
    facture_produit.id_facture AS factureID,
    facture_produit.nombre AS productNumber,
    facture_produit.nombre * (produits.price + (produits.price * produits.tva) / 100) AS productTTC
    FROM factures, produits, facture_produit 
    WHERE factures.id = :id AND facture_produit.id_facture = :id AND produits.id = facture_produit.id_produit');

    $request->execute([
        ':id' => $id,
    ]);
    $result = $request->fetchAll();
    return $result;
}