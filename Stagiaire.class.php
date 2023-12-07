<?php
    class Stagiaire {
        private $id;
        private $nom;
        private $prenom;
        private $nation;
        private $formation;

        function getId() {
            return $this->id;
        }

        function getName() {
            return $this->nom;
        }

        function setName($nom) {
            $this->nom = $nom;
        }

        function getFirstname() {
            return $this->prenom;
        }

        function setFirstname($prenom) {
            $this->prenom = $prenom;
        }


        function getNation() {
            return $this->nation;
        }

        function setNation($nation) {
            $this->nation = $nation;
        }

        function getFormation() {
            return $this->formation;
        }

        function setFormation($formation) {
            $this->formation = $formation;
        }
    }
?>