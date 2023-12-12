<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un stagiaire</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $base = new PDO('mysql:host=127.0.0.1;dbname=gestion', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    include('Manager.class.php');
    include('FormManager.class.php');
    include('formation.manager.class.php');

    $manager = new Manager($base);
    $formateur = new FormManager($base);
    $formation = new Formation_manager($base);
    ?>

    <header>
        <h1>Ajouter un stagiaire en formation</h1>
    </header>

    <main>
        <form action="add.php" method="POST">
            <label for="name">Nom : <input type="text" name="name"></label>
            <label for="firstname">Prenom : <input type="text" name="firstname"></label>
            <label for="nationalite">Nationalité : <select name="nationalite">
                    <?php
                    $tablNation = $manager->getAllNationalite();
                    for ($i=0; $i < count($tablNation); $i++) { 
                        $f = $tablNation[$i];
                        echo '<option value='.$f['ID_NATION'].'>'.$f['NATIONALITE'].'</option>';
                    }
                    ?>
                </select></label>
            <label for="formation">Type de formation : </label>
            <select id='changeFormation' name='formation'>
                <?php
                $tablTypes = $formation->getAllFormation();
                for ($i=0; $i < count($tablTypes); $i++) { 
                    $k = $tablTypes[$i];
                    echo '<option value='.$k['ID_TYPE'].'>'.$k['NOM_TYPE'].'</option>';
                }
                
                ?>
            </select>
            <label for="formateur">Formateurs par date : </label>
            <?php
            $tablForm = $formateur->getAllForm();
            for ($i=0; $i < count($tablForm); $i++) { 
                $element = $tablForm[$i];

                echo '<label><input type="checkbox" data-formateur='.$element['ID_FORMATEUR'].' name="formateur[' . $element["ID_FORMATEUR"].']" id='.$element['ID_FORMATEUR'].'></input> '.$element['PRENOM_FORMATEUR'].' '.$element['NOM_FORMATEUR'].' dans la salle '.$element['LIBELLE'].', début : <input type="date" name="debut['. $element["ID_FORMATEUR"].']"> , fin : <input type="date" name="fin['. $element["ID_FORMATEUR"] .']"></label>';
                echo '<input type="hidden" value='.$element['NOM_TYPE'].' name="yes" id="test">';
            }
            ?>
            <input type="submit" placeholder="envoyer">
        </form>

        <a href="suppression.php">supprimer stagiaire</a>
    </main>

    <script>
        const changeFormation = document.getElementById('changeFormation');
        const form = <?= json_encode($formateur->getAForm())?>;
        console.log(form)
        let formation = changeFormation.value;

        console.log(formation);
        changeFormation.addEventListener("change", (ev) => {
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
    </script>
</body>

</html>