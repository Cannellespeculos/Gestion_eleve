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

        $manager = new Manager($base);
        $formateur = new FormManager($base);
    ?>

    <header>
        <h1>Ajouter un stagiaire en formation</h1>
    </header>

    <main>
        <form action="ajouter.php">
            <label for="name">Nom : <input type="text" name="name"></label>
            <label for="firstname">Prenom : <input type="text" name="firstname"></label>
            <label for="nationalite">Nationalité : <select name="nationalite">
                <option value="france">France</option>
                <option value="allemagne">Allemagne</option>
                <option value="espagne">Espagne</option>
                <option value="russie">Russie</option>
            </select></label>
            <label for="formation">Type de formation : <select id='changeFormation'>
                <option value="Web designer" name="formation">Web designer</option>
                <option value="Full stack developper" name="formation">Fullstack developpeur</option>
                <option value="UI designer" name="formation">UI designer</option>
            </select></label>
            <label for="formateur">Formateurs par date : </label>
            <?php 
                $formateur->getAllForm()
            ?>

        </form>
</main>

    <script>   
        const changeFormation = document.getElementById('changeFormation');
        changeFormation.addEventListener("change", (ev) => {
            // <?php 
            //     if (isset($_POST['formation'])) {
            //           if ($_POST['formation'] === $_POST['yes']) {
            // ?>

        })
    </script>
</body>
</html>