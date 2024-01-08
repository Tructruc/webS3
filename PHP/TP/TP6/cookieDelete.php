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
        session_name("SEmilienFIEU");
        session_start();
        if ((isset($_SESSION['conn']) and htmlentities($_SESSION['conn']) == 'connected')){

            if (!isset($_SESSION['conn'])){
                $_SESSION['conn'] = "connected";
            }


            echo "<h1>Êtes-vous sûr de vouloir supprimer le cookie de connexion ?</h1>";
            echo "<form name='deconnexion' method='post' action='tratCookieDelete.php'>";
            echo "<input type='submit' name='submit' value='Suppresion du cookie'>";
            echo "</form>";

        } else {
            echo $_SESSION['conn'];
            header("Location: identification.php?erreur=0");
            exit();
        }
        ?>
    </div>
</div>

<?php include("./include/footer.php"); ?>
</body>
</html>
