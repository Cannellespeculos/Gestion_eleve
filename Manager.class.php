<?php 
    class Manager {
        private $pdo;

        function __construct($pdo) {
            $this->pdo = $pdo;
        }

        function setAll($stagiaire) {
            $sql = 'INSERT INTO stagiaire(ID_NATION, ID_TYPE, NOM_STAGIAIRE, PRENOM_STAGIAIRE) VALUES (:id_nation, :id_type, :nom, :prenom)';
            $l = $this->pdo->prepare();
            $l->execute(array("id_nation" => $stagiaire->getNation(), "id_type" => $stagiaire->getFormation(),"nom" => $stagiaire->getName(),"prenom" => $stagiaire->getFirstname()));
        }

        function getAllNationalite() {
            $sql = 'SELECT ID_NATION, NATIONALITE FROM nationalite';
            $j = $this->pdo->prepare($sql);
            $j->execute();

            while ($row = $j->fetch()) {
                echo '<option value='.$row['ID_NATION'].'>'.$row['NATIONALITE'].'</option>';
            }
        }
    }
?>