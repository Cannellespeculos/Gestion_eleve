<?php 
    class Date_manager {
        private $pdo;

        function __construct($pdo) {
            $this->pdo = $pdo;
        }

        function setAllDate($date) {
            $sql = 'INSERT INTO temps_formation(ID_STAGIAIRE, ID_FORMATEUR, DATE_DEBUT, DATE_FIN) VALUES (:id_stagiaire, :id_formateur, :date_debut, :date_fin)';
            $j = $this->pdo->prepare($sql);
            $j->execute(array("id_stagiaire" => $date->getIdStagiaire(), "id_formateur" => $date->getIdFormateur(), 'date_debut' => $date->getDateDebut(), 'date_fin' => $date->getDateFin()));
        }

       
    }
?>