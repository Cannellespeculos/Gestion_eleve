<?php 

// Les informations de la table temps_formation pour récuperer ou integrer des infos dedans
    class Date {

        private $id_stagiaire;
        private $id_formateur;
        private $date_debut;
        private $date_fin;

        function getIdStagiaire() {
            return $this->id_stagiaire;
        }

        function setIdStagiaire($id_stagiaire) {
            $this->id_stagiaire = $id_stagiaire;
        }

        function getIdFormateur() {
            return $this->id_formateur;
        }

        function setIdFormateur($id_formateur) {
            $this->id_formateur = $id_formateur;
        }

        function getDateDebut() {
            return $this->date_debut;
        }

        function setDateDebut($date_debut) {
            $this->date_debut = $date_debut;
        }

        function getDateFin() {
            return $this->date_debut;
        }

        function setDateFin($date_fin) {
            $this->date_fin = $date_fin;
        }
    }
?>