<?php 

    // Les requêtes sql en lien avec la table formation
    class Formation_manager {
        private $pdo;

        function __construct($pdo) {
            $this->pdo = $pdo;
        }

        function getAllFormation() {
            $sql = 'SELECT ID_TYPE, NOM_TYPE FROM type_formation';
            $prepare = $this->pdo->prepare($sql);
            $prepare->execute();
            $rows = $prepare->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }
    }
?>