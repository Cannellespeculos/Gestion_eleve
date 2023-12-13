<?php 

// Les requêtes sql en lien avec la table temps_formation
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

       function getAllDate() {
        $sql = 'SELECT ID_STAGIAIRE, ID_FORMATEUR, DATE_DEBUT, DATE_FIN FROM temps_formation';
        $j = $this->pdo->prepare($sql);
        $j->execute();

        $rows = $j->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
       }
    }
?>