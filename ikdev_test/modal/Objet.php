<?php

class Objet {

  // Les varriables
  private $id;
  private $nom;
  private $volume_m3;
  private $categorie;
  private $img;

  // Get and Set functions
  function getId(){
    return $this->id;
  }
  function setId($id){
    $this->id = $id;
  }

  function getNom(){
    return $this->nom;
  }
  function setNom($nom){
    $this->nom = $nom;
  }

  function getVolume_m3(){
    return $this->volume_m3;
  }
  function setVolume_m3($volume_m3){
    $this->volume_m3 = $volume_m3;
  }

  function getCategorie(){
    return $this->categorie;
  }
  function setCategorie($categorie){
    $this->categorie = $categorie;
  }

  function getImg(){
    return $this->img;
  }
  function setImg($img){
    $this->img = $img;
  }
  
}