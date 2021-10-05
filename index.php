<?php
    $errors =[]; // les messages d'erreurs correspondant au traitement du formulaire 
    $formOk = false; // les données recupérées sont elle valide
    if (filter_has_var(INPUT_GET, "name") && filter_has_var(INPUT_GET, "firstname")){
        // traitement du formulaire
        $name = trim($_GET["name"]);
        $firstname = trim($_GET["firstname"]);
        if($name === ""){
            $errors[] = "Merci de choisir un nom non vide";
        }

        if($firstname === ""){
            $errors[] = "Merci de choisir un prénom non vide";
        }

        $formOk = empty($errors);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if ($formOk){
        echo "<p>" . htmlentities($firstname) . " " . htmlentities($name) . " connait son nom et son prénom </p>" . PHP_EOL ;
    } else {
        if (!empty($errors)){
            echo "<ul>" . PHP_EOL;
            foreach($errors as $error){
                echo "<li>$error</li>" . PHP_EOL;
            }
            echo "</ul>" . PHP_EOL;
        }
    ?>
    <form>
        <label for="name">Votre nom </label>
        <input type="text" name="name" id="name">

        <label for="firstname">Votre prénom </label>
        <input type="text" name="firstname" id="firstname">

        <input type="submit" value="valider">
    </form>  
    <?php
    }
    ?>
</body>
</html>