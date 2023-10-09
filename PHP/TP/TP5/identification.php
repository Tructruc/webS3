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
    if ($page == "index") {
        $page = "Acceuil";
    }
    echo "<title>$page</title>";
    ?>
</head>
<body>
<?php include("./include/header.php"); ?>

<?php include("./include/menus.php"); ?>
<div style="padding-top: 30px" id="main">
    <div style="text-align: center" class="col-md-12">
        <h1>Identification</h1>
        <?php
        if (isset($_GET['erreur'])) {
            switch (htmlentities($_GET['erreur'])){
            case 0:
                echo "<h3 style='color: red' '>Vous devez vous connecter pour accéder à cette page</h3>";
                break;
            case 1:
                echo "<h3 style='color: red' '>L’identifiant ou le mot de passe est invalide</h3>";
                break;
            }
        }
        ?>

        <form name="identification" method="post" action="traitConnexion.php">
            <table>
                <tr>
                    <td>Identifiant</td>
                    <td><input type="text" name="identifiant" size="20" value="<?php if (isset($_COOKIE["CEmilienFIEU"])) {echo $_COOKIE["CEmilienFIEU"];}?>"></td>
                </tr>
                <tr>
                    <td>Mot de passe</td>
                    <td><input type="password" name="motdepasse" size="20"></td>
                </tr>

                <tr>
                    <td>Se souvenir de moi</td>
                    <td><input type="checkbox" name="souvenir" value="oui"></td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit" value="Connexion"></td>
                </tr>


            </table>
        </form>
    </div>
</div>

<?php include("./include/footer.php"); ?>
</body>
</html>
