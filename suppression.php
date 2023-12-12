<?php 
     $base = new PDO('mysql:host=127.0.0.1;dbname=gestion', 'root', '');
     $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

     include('Manager.class.php');
     include('Date.manager.class.php');

     $manager = new Manager($base);
     $date_manage = new Date_manager($base);
if (isset($_POST['supprimer'])) {
    $f = $_POST['supprimer'];
    if (isset($_POST["submit"])) {
        for ($i=0; $i < count($f); $i++) { 
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
            $rows = $manager->getA();
            $formrows = $date_manage->getFormation();
        echo '<thead>';
        echo '<tr>';
          $f = $rows[0];
          foreach ($f as $key => $value) {
            if ($key !== "ID_STAGIAIRE") {
                echo '<th>'.$key.'</th>';
            }
               
            
          }
          echo '<th>SUPPRIMER</th>';
        echo '</tr>';
        echo '</thead>';

        echo '<tbody>';
        for ($i=0; $i < count($rows); $i++) { 
            $element = $rows[$i];
            echo '<tr>';
            foreach ($element as $key => $value) {
                if ($key !== "ID_STAGIAIRE") {
                    echo '<td>'.$value.'</td>';
                }
            }
           
              echo '<td><input type="checkbox" name="supprimer[]" value='.$element['ID_STAGIAIRE'].'></td>';
            echo '</tr>';
        }
        echo '</tbody>';


        ?>
    </table>

    <input type="submit" value="Envoyer" name="submit">
    <a href="modify.php">modifier les stagiaires</a>

    </form>

    

    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

form {
    display: flex;
    flex-direction: column;
    
}

option {
    width: 30px;
}

td , th{
    border: 1px solid black;
}
    </style>
</body>
</html>