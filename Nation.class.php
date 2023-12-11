<?
    class Nation extends Stagiaire {

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