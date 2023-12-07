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

        $manager = new Manager($base)
    ?>

    <header>
        <h1>Ajouter un stagiaire en formation</h1>
    </header>

    <body>
        <form action="ajouter.php">
            <label for="name">Nom : <input type="text" name="name"></label>
            <label for="firstname">Prenom : <input type="text" name="firstname"></label>
            <label for="nationalite">Nationalité : <select name="nationalite">
                <option value="france">France</option>
                <option value="allemagne">Allemagne</option>
                <option value="espagne">Espagne</option>
                <option value="russie">Russie</option>
            </select></label>
            <label for="formation">Type de formation : <select name="formation">
                <option value="web designer">Web designer</option>
                <option value="full stack developper">Fullstack developpeur</option>
                <option value="UI designer">UI designer</option>
            </select></label>
            <label for="formateur">Formateurs par date : </label>

        </form>
    </body>
</body>
</html>