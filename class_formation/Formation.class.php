<?php 
// Les informations de la table Formation pour récuperer ou integrer des infos dedans

    class Formation {
        private $id;
        private $nom_type;

        function getId() {
            return $this->id;
        }

        function getNomType() {
            return $this->nom_type;
        }

        function setNomType($nom_type) {
            $this->nom_type = $nom_type;
        }
    }
?>