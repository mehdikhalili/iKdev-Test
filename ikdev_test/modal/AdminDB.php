<?php

require_once 'Objet.php';

class AdminDB {

  // La connexion avec la base de données
  private static function Connection() {
    try{
      $conn = new PDO('mysql:host=localhost;dbname=ikdev_test;charset=utf8','root','');
      return $conn;
    }catch(PDOException $e){
      die("Connection error: ".$e->getMessage());
    }
  }

  // Importer tous les objets (ou par catégorie) à une liste
  public static function getAllObjets($categorie) {
    $conn = AdminDB::Connection();
    $req;
    $list = array();
    $i = 0;
    if ($categorie == null) {
      $req = $conn->query('SELECT * FROM objets ORDER BY nom;');
    }
    else {
      $req = $conn->prepare('SELECT * FROM objets WHERE categorie=? ORDER BY nom;');
      $req->execute(array($categorie));
    }
    while($data = $req->fetch()){
      $objet = new Objet();
      $objet->setId($data['id']);
      $objet->setNom($data['nom']);
      $objet->setVolume_m3($data['volume_m3']);
      $objet->setCategorie($data['categorie']);
      $objet->setImg($data['img']);
      $list[$i] = $objet;
      $i++;
    }
    return $list;
  }


  // Importer tous les catégories à une liste
  public static function getAllCategories() {
    $conn = AdminDB::Connection();
    $list = array();
    $i = 0;
    $req = $conn->query('SELECT DISTINCT categorie FROM objets ORDER BY categorie;');
    while($data = $req->fetch()){
      $list[$i] = $data['categorie'];
      $i++;
    }
    return $list;
  }


  // Ajouter un volume
  public static function addVolume($volume) {
    $conn = AdminDB::Connection();
    $req = $conn->prepare('INSERT INTO volumes (volume_m3) VALUES (?);');
    $req->execute(array($volume));
    return true;
  }
}