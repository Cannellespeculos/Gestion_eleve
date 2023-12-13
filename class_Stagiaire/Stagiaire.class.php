<?php
// Les informations de la table stagiaire pour récuperer ou integrer des infos dedans

    class Stagiaire {
        private $id;
        private $nom;
        private $prenom;
        private $Idnation;
        private $Idformation;

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
            return $this->Idnation;
        }

        function setNation($nationid) {
            $this->Idnation = $nationid;
        }

        function getFormation() {
            return $this->Idformation;
        }

        function setFormation($formation) {
            $this->Idformation = $formation;
        }
    }
?>