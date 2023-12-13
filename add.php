<?php
var_dump($_POST);

     // Intègre les réponses du formulaire dans les objets pour ensuite les integrer dans la base de donnée 
     $base = new PDO('mysql:host=127.0.0.1;dbname=gestion', 'root', '');
     $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

     include('class_Stagiaire/Manager.class.php');
     include('class_Stagiaire/Stagiaire.class.php');
     include('class_Formateur/Formateur.class.php');
     include('class_formation/Date.class.php');
     include('class_Date/Date.manager.class.php');

     $manager = new Manager($base);
     $stagiaire = new Stagiaire();
     $date = new Date();
     $formateur = new Formateur();
     $date_manage = new Date_manager($base);
     $nom = htmlspecialchars($_POST['name']);
     $prenom = htmlspecialchars($_POST['firstname']);
     $stagiaire->setName($nom);
     $stagiaire->setFirstname($prenom);
     $stagiaire->setNation($_POST['nationalite']);
     $stagiaire->setFormation($_POST['formation']);
    
     $stagiaireId = $manager->setAll($stagiaire);

     $date->setIdStagiaire($stagiaireId);
     foreach ($_POST["formateur"] as $idFormateur => $value) {
          if(isset($_POST["debut"][$idFormateur]) && isset($_POST["fin"][$idFormateur])) {
               $date->setIdFormateur($idFormateur);
               $date->setDateDebut($_POST['debut'][$idFormateur]);
               $date->setDateFin($_POST['fin'][$idFormateur]);
               $date_manage->setAllDate($date);
          }

     }

     
var_dump($_POST['formation']);
     header('Location:ajouter.php');
?>