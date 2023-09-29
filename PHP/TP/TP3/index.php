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
            <?php
                if (isset($_POST['submit'])){
                    $identifiant = htmlentities($_POST['identifiant']);
                    $motdepasse = htmlentities($_POST['motdepasse']);
                    if ($identifiant == "Joe" && $motdepasse == "Bidden"){
                        echo "<h1>Bienvenue $identifiant</h1>";
                    }else{
                        header("Location: identification.php?erreur=1");
                        exit();
                    }
                } else {
                    header("Location: identification.php");
                    exit();
                }
            ?>
        </div>
    </div>

	<?php include("./include/footer.php"); ?>
</body>
</html>
