<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="suppression" method='POST'>
    <?php 
        $base = new PDO('mysql:host=127.0.0.1;dbname=gestion', 'root', '');
        $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        include('Manager.class.php');

        $manager = new Manager($base);
    ?>
    <table>
        <?php
            $rows = $manager->getA();
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

    <input type="submit" value="Envoyer">
    </form>

    <?php 
    if (isset($_POST['supprimer'])) {
        var_dump($_POST['supprimer']);
    }
      
    ?>

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