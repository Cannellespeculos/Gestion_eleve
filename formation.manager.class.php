<?php 
    class Formation_manager {
        private $pdo;

        function __construct($pdo) {
            $this->pdo = $pdo;
        }

        function getAllFormation() {
            $sql = 'SELECT ID_TYPE, NOM_TYPE FROM type_formation';
            $prepare = $this->pdo->prepare($sql);
            $prepare->execute();

            while ($row = $prepare->fetch()) {
                echo '<option value='.$row['ID_TYPE'].'>'.$row['NOM_TYPE'].'</option>';
            }
        }
    }
?>