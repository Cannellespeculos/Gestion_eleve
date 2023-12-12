<?php 
    class Manager {
        private $pdo;

        function __construct($pdo) {
            $this->pdo = $pdo;
        }

        function setAll($stagiaire) {
            $sql = 'INSERT INTO stagiaire(ID_NATION, ID_TYPE, NOM_STAGIAIRE, PRENOM_STAGIAIRE) VALUES (:id_nation, :id_type, :nom, :prenom)';
            $l = $this->pdo->prepare($sql);
            $l->execute(array("id_nation" => $stagiaire->getNation(), "id_type" => $stagiaire->getFormation(),"nom" => $stagiaire->getName(),"prenom" => $stagiaire->getFirstname()));

            return $this->pdo->lastInsertId();
        }
        

        function getAllNationalite() {
            $sql = 'SELECT ID_NATION, NATIONALITE FROM nationalite';
            $j = $this->pdo->prepare($sql);
            $j->execute();

            $rows = $j->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }

        function getA() {
            $sql = 'SELECT ID_STAGIAIRE,NOM_STAGIAIRE, PRENOM_STAGIAIRE, NATIONALITE, NOM_TYPE FROM stagiaire s JOIN nationalite n ON s.ID_NATION = n.ID_NATION JOIN type_formation formation ON s.ID_TYPE = formation.ID_TYPE';
            $j = $this->pdo->prepare($sql);
            $j->execute();

            $rows = $j->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }

        function deleteStagiaire($idstagiaire) {
            $sql = "DELETE FROM stagiaire WHERE ID_STAGIAIRE = :id";
            $k = $this->pdo->prepare($sql);
            $k->execute(array("id" => $idstagiaire));
        }

    }
?>