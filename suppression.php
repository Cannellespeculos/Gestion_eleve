<?php
$base = new PDO('mysql:host=127.0.0.1;dbname=gestion', 'root', '');
$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

include('class_Stagiaire/Manager.class.php');
include('class_Date/Date.manager.class.php');
include('class_Formateur/FormManager.class.php');

$manager = new Manager($base);
$formateur = new FormManager($base);
$date_manage = new Date_manager($base);

$tablForm = $formateur->getAllForm();
$date = $date_manage->getAllDate();

// supprime les stagiaires sélectionnés
if (isset($_POST['supprimer'])) {
    $f = $_POST['supprimer'];
    if (isset($_POST["submit"])) {
        for ($i = 0; $i < count($f); $i++) {
            $suppr = $f[$i];
            $manager->deleteStagiaire($suppr);
            header('Location:suppression.php');
        }

    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="suppression.php" method='POST'>
        <?php

        ?>
        <table>
            <?php

            // affiche les th
            $rows = $manager->getA();
            echo '<thead>';
            echo '<tr>';
            $f = $rows[0];
            foreach ($f as $key => $value) {
                if ($key != "ID_STAGIAIRE") {
                    echo '<th>' . $key . '</th>';
                }


            }
            echo '<th>Formateur - Salle - Date début - Date fin</th>';
            echo '<th>SUPPRIMER</th>';
            echo '</tr>';
            echo '</thead>';

            echo '<tbody>';

            // affiche les td
            for ($i = 0; $i < count($rows); $i++) {
                $element = $rows[$i];
                echo '<tr>';
                foreach ($element as $key => $value) {
                    if ($key != "ID_STAGIAIRE") {
                        echo '<td>' . $value . '</td>';
                    }
                }


                echo '<td>';

                // affiche les formateurs
                for ($j = 0; $j < count($tablForm); $j++) {
                    $el = $tablForm[$j];
                    $d = $date[$j];
                    if ($d['ID_FORMATEUR'] === $el['ID_FORMATEUR']) {
                        echo '<label> ' . $el['PRENOM_FORMATEUR'] . ' ' . $el['NOM_FORMATEUR'] . ' dans la salle ' . $el['LIBELLE'] . ', début : <input type="date" name="debut[' . $el["ID_FORMATEUR"] . ']"  placeholder="' . $d['DATE_DEBUT'] . '" onfocus="(this. type=\'date\')"> , fin : <input type="date" name="fin[' . $el["ID_FORMATEUR"] . ']"  placeholder="' . $d['DATE_FIN'] . '" onfocus="(this. type=\'date\')" ></label><br />';
                    }
                }
                echo '</td>';
                echo '<td><input type="checkbox" name="supprimer[]" value=' . $element['ID_STAGIAIRE'] . '></td>';
                echo '</tr>';
            }
            echo '</tbody>';


            ?>
        </table>

        <input type="submit" value="Envoyer" name="submit">
        <a href="modify.php">modifier les stagiaires</a>
        <a href="ajouter.php">ajouter des stagiaires</a>

    </form>



  
</body>

</html>