<?php 
    class Formateur {
        private $id_formateur;
        private $nom;
        private $salle;

        function getFormid() {
            return $this->id_formateur;
        }

        function getSalle() {
            return $this->salle;
        }

        function getFormname() {
            return $this->nom;
        }

        function setFormname($nom) {
            $this->nom = $nom;
        }
    }
?>