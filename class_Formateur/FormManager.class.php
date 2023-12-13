<?php 
// Les requêtes sql en lien avec la table formateur
    class FormManager {
        private $pdo;

        function __construct($pdo) {
            $this->pdo = $pdo;
        }

        function getAllForm() {
            $sql = "SELECT f.ID_FORMATEUR, s.LIBELLE, s.ID_SALLE, f.NOM_FORMATEUR, f.PRENOM_FORMATEUR, formation.NOM_TYPE FROM formateur f JOIN salle s ON f.ID_SALLE = s.ID_SALLE JOIN type_formateur formateur ON f.ID_FORMATEUR = formateur.ID_FORMATEUR JOIN type_formation formation ON formateur.ID_TYPE = formation.ID_TYPE";
            $j = $this->pdo->prepare($sql);
            $j->execute();

            $rows = $j->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }


        function getAForm() {
            $sql = 'SELECT f.ID_FORMATEUR, formation.ID_TYPE FROM formateur f JOIN salle s ON f.ID_SALLE = s.ID_SALLE JOIN type_formateur formateur ON f.ID_FORMATEUR = formateur.ID_FORMATEUR JOIN type_formation formation ON formateur.ID_TYPE = formation.ID_TYPE';
            $j = $this->pdo->prepare($sql);
            $j->execute();

            $rows = $j->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }


    }
?>