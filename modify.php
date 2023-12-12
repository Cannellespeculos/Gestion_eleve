<?php 
     $base = new PDO('mysql:host=127.0.0.1;dbname=gestion', 'root', '');
     $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

     include('Manager.class.php');
     include('FormManager.class.php');
     include('formation.manager.class.php');
     include('Date.manager.class.php');
 
     $formateur = new FormManager($base);
     $formation = new Formation_manager($base);

     $manager = new Manager($base);
     $date_manage = new Date_manager($base);

     $rows = $manager->getA();
    
      
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
    <main>
        <form action="modify.php">
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Nationalité</th>
                        <th>Type de formation</th>
                        <th>Formateur - Salle - Date début - Date fin</th>
                        <th>Modification</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        for ($i=0; $i < count($rows); $i++) { 
                            $element = $rows[$i];
                            echo '<tr>';
                            foreach ($element as $key => $value) {
                                if ($key !== "ID_STAGIAIRE") {
                                    echo '<td><input type="text" placeholder="'.$value.'"></td>';
                                }
                            }


                            $tablForm = $formateur->getAllForm();
                            echo '<td>';
                            for ($i=0; $i < count($tablForm); $i++) { 
                                $el = $tablForm[$i];
                
                                echo '<label><input type="checkbox" data-formateur='.$el['ID_FORMATEUR'].' name="formateur[' . $el["ID_FORMATEUR"].']" id='.$el['ID_FORMATEUR'].'></input> '.$el['PRENOM_FORMATEUR'].' '.$el['NOM_FORMATEUR'].' dans la salle '.$el['LIBELLE'].', début : <input type="date" name="debut['. $el["ID_FORMATEUR"].']"> , fin : <input type="date" name="fin['. $el["ID_FORMATEUR"] .']"></label><br />';
                                echo '<input type="hidden" value='.$el['NOM_TYPE'].' name="yes" id="test">';
                            }
                            echo '</td>';
                              echo '<td><input type="checkbox" name="supprimer[]" value='.$element['ID_STAGIAIRE'].'></td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </form>
    </main>
</body>
</html>