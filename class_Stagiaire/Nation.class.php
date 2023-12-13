<?
// Les informations de la table nationalite pour récuperer ou integrer des infos dedans

    class Nation {

        private $Idnation;
        private $nationalite;

        function getIdnation() {
            return $this->Idnation;
        }
        

        function getNationalite() {
            return $this->nationalite;
        }

        function setNationalite($nation) {
            $this->nationalite = $nation;
        }
    }
?>