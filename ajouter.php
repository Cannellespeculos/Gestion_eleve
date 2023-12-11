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
        $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        include('Manager.class.php');
        include('FormManager.class.php');
        include('formation.manager.class.php');

        $manager = new Manager($base);
        $formateur = new FormManager($base);
        $formation = new Formation_manager($base)
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
                $manager->getAllNationalite();
            ?>
            </select></label>
            <label for="formation">Type de formation : </label>
            <select id='changeFormation' name='formation'>
            <?php 
                $formation->getAllFormation();
            ?>
            </select>
            <label for="formateur">Formateurs par date : </label>
            <?php 
                $formateur->getAllForm();
            ?>
            <input type="submit" placeholder="envoyer">
        </form>
</main>

    <script>
        const changeFormation = document.getElementById('changeFormation');
        <?php echo 'const formation ='.$_POST['formation']; ?>
        changeFormation.addEventListener("change", (ev) => {
            if (formation) {
                console.log(formation)
            }
        })
    </script>
</body>
</html>