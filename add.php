<?php 
     $base = new PDO('mysql:host=127.0.0.1;dbname=gestion', 'root', '');
     $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

     include('Manager.class.php');
     include('Stagiaire.class.php');

     $manager = new Manager($base);
     $stagiaire = new Stagiaire();
     $nom = htmlspecialchars($_POST['name']);
     $prenom = htmlspecialchars($_POST['firstname']);
     $stagiaire->setName($nom);
     $stagiaire->setFirstname($prenom);
     $stagiaire->setNation($_POST('nationalite'));
     $stagiaire->setFormation($_POST('formation'));

     $manager->setAll($stagiaire)
?>