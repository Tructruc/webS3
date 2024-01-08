<?php
$page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_BASENAME);
if ($page != "identification.php"){
    session_name("SEmilienFIEU");
    session_start();
    if ((isset($_SESSION['conn']) and htmlentities($_SESSION['conn']) == 'connected')){


    } else {
        header("Location: identification.php?erreur=0");
        exit();
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="include/bootstrap.min.css">
    <link rel="stylesheet" href="include/styles.css">
    <?php
    $page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_BASENAME);
    $page = explode(".", $page);
    $page = $page[0];
    if ($page == "index"){$page = "Acceuil";}
    echo "<title>$page</title>";
    ?>
</head>
<body>
<?php include("./include/header.php"); ?>

<?php include("./include/menus.php"); ?>
<div style="padding-top: 30px" id="main">
    <div style="text-align: center" class="col-md-12">
        <h2>Consultation des emplacements par type</h2>
        <form name="ajoutType" method="post" action="ajoutType.php">
            Veuillez entrer les informations du nouveau type d'emplacement :
            <br> <br> <br>

            Id du type :<input type="text" name="id" placeholder="id">
            <br> <br>
            Nom du type :<input type="text" name="nom" placeholder="nom">
            <br> <br>
            <input type="submit" name="submit" value="Ajouter">

        </form>
        <?php
        include ("connect.inc.php");
        
        if (isset($_POST['submit'])){
            $idType = htmlentities($_POST['id']);
            $nomType = htmlentities($_POST['nom']);

            if (empty($idType) or empty($nomType)){
                echo "Les champs ne peuvent pas être vides";
                exit();
            }

            if (preg_match("/^[4-9][0]{2}$/", $idType)){
                if (preg_match("/^[a-zA-Z ]{3,25}$/", $nomType)) {

                    $id = htmlentities($_POST['id']);
                    $nom = htmlentities($_POST['nom']);
                    $sql = "INSERT INTO Type VALUES ('$id', '$nom')";
                    try {
                        // Prepare the SQL query
                        $stmt = $pdo->prepare($sql);

                        // Execute the statement
                        $stmt->execute();

                        header("Location: consultType.php");

                    } catch (PDOException $e) {
                        // Handle any errors
                        die("Error: " . $e->getMessage());
                    }
                } else {
                    echo "Le nom du type doit contenir seulement 3 à 25 lettres ou espace (indifférent à la casse)";
                }
            } else {
                echo "L'id du type doit contenir seulement 3 chiffres, le 1er étant compris entre 4 et 9 et les 2 derniers doivent être des zéros";
            }

        }



        ?>

    </div>
</div>

<?php include("./include/footer.php"); ?>
</body>
</html>
