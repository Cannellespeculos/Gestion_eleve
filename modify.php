<?php 
     $base = new PDO('mysql:host=127.0.0.1;dbname=gestion', 'root', '');
     $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

     include('class_Stagiaire/Manager.class.php');
     include('class_Formateur/FormManager.class.php');
     include('class_formation/formation.manager.class.php');
     include('class_Date/Date.manager.class.php');
 
     $formateur = new FormManager($base);
     $formation = new Formation_manager($base);

     $manager = new Manager($base);
     $date_manage = new Date_manager($base);

     $rows = $manager->getA();
     $tablForm = $formateur->getAllForm();
     $date = $date_manage->getAllDate();
    
      
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
                    // Ici je vais créer les tableaux dynamiquement
                    // la boucle pour mettre les lignes du tableau selon le nombre d'informations
                        for ($i=0; $i < count($rows); $i++) { 
                            $element = $rows[$i];
                            echo '<tr>';

                            // Créer les td selon leurs catégories et les remplis avec des select ou des input type text 
                            foreach ($element as $key => $value) {
                                if ($key === 'NATIONALITE') {
                                    $tablNation = $manager->getAllNationalite();
                                    echo '<td>';
                                    echo '<select name="nationalite">';
                                    for ($k=0; $k < count($tablNation); $k++) { 
                                        $f = $tablNation[$k];
                                        if ($f['NATIONALITE'] === $value) {
                                            echo '<option value='.$f['ID_NATION'].' selected>'.$f['NATIONALITE'].'</option>';
                                        }else {
                                            echo '<option value='.$f['ID_NATION'].'>'.$f['NATIONALITE'].'</option>';
                                        }
                                        
                                    }
                                    echo '</select>';
                                    echo '</td>';
                                    
                                }else if ($key === 'NOM_TYPE') {
                                    $tablTypes = $formation->getAllFormation();
                                    echo '<td>';
                                    echo '<select class="changeFormation" name="formation">';
                                    for ($l=0; $l < count($tablTypes); $l++) { 
                                        $k = $tablTypes[$l];
                                        if ($k['NOM_TYPE'] === $value) {
                                            
                                            echo '<option value='.$k['ID_TYPE'].' selected>'.$k['NOM_TYPE'].'</option>';
                                        }else {
                                            echo '<option value='.$k['ID_TYPE'].'>'.$k['NOM_TYPE'].'</option>';
                                        }
                                        
                                    }
                                    echo '</select>';
                                    echo '</td>';
                                }
                                else if ($key !== "ID_STAGIAIRE") {
                                    echo '<td><input type="text" placeholder="'.$value.'"></td>';
                                }
                            }


                            // affiche les formateur
                            echo '<td>';
                            for ($j=0; $j < count($tablForm); $j++) { 
                                $el = $tablForm[$j];
                                $d= $date[$j];
                                if ($d['ID_FORMATEUR'] === $el['ID_FORMATEUR']) {
                                echo '<input type="checkbox" data-formateur='.$el['ID_FORMATEUR'].' name="formateur[' . $el["ID_FORMATEUR"].']" id='.$el['ID_FORMATEUR'].'></input><label> '.$el['PRENOM_FORMATEUR'].' '.$el['NOM_FORMATEUR'].' dans la salle '.$el['LIBELLE'].', début : <input type="date" name="debut['. $el["ID_FORMATEUR"].']"  placeholder="'.$d['DATE_DEBUT'].'" onfocus="(this. type=\'date\')"> , fin : <input type="date" name="fin['. $el["ID_FORMATEUR"] .']"  placeholder="'.$d['DATE_FIN'].'" onfocus="(this. type=\'date\')" ></label><br />';
                                }else {
                                echo '<input type="checkbox" data-formateur='.$el['ID_FORMATEUR'].' name="formateur[' . $el["ID_FORMATEUR"].']" id='.$el['ID_FORMATEUR'].'></input><label> '.$el['PRENOM_FORMATEUR'].' '.$el['NOM_FORMATEUR'].' dans la salle '.$el['LIBELLE'].', début : <input type="date" name="debut['. $el["ID_FORMATEUR"].']"> , fin : <input type="date" name="fin['. $el["ID_FORMATEUR"] .']"></label><br />';
                                }
                            }
                            echo '</td>';
                              echo '<td><input type="checkbox" name="supprimer[]" value='.$element['ID_STAGIAIRE'].'></td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
            <a href="ajouter.php">ajouter des stagiaires</a>
            <a href="suppression.php">supprimer les stagiaires</a>
        </form>
    </main>

   

<script>
    // Pour verifier quelle formation a un formateur pour le desactiver selon la formation choisi par l'utilisateur
        const changeFormation = document.getElementsByClassName('changeFormation');
        const form = <?= json_encode($formateur->getAForm())?>;
        console.log(form)
        let formation = changeFormation.value;

        

        
        for (let j = 0; j < changeFormation.length; j++) {
            const el = changeFormation[j];

            for (let i = 0; i < form.length; i++) {
                const element = form[i];
                if (formation !== element.ID_TYPE) {
                    document.getElementById(element.ID_FORMATEUR).disabled = true
                }else {
                    document.getElementById(element.ID_FORMATEUR).disabled = false
                }
            }


            console.log(formation);
            el.addEventListener("change", (ev) => {
            console.log(ev.currentTarget.value);
            formation = ev.currentTarget.value

            for (let i = 0; i < form.length; i++) {
                const element = form[i];
                if (formation !== element.ID_TYPE) {
                    document.getElementById(element.ID_FORMATEUR).disabled = true
                }else {
                    document.getElementById(element.ID_FORMATEUR).disabled = false
                }
            }
        })
        }

        
    </script>
</body>
</html>