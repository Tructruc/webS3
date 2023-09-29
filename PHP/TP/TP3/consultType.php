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
        <form name="consultType" method="post" action="consultType.php">
            <table>
                <?php
                include ("initTableaux.php");
                // liste déroulante
                echo "<select name='type'>";

                foreach ($tabType as $typenum => $type){
                    echo "<option value='$typenum'";
                    if (isset($_POST["type"]) && $_POST["type"] == $typenum) echo "selected";
                    echo">$type</option>";
                }
                ?>
                <tr>
                    <td colspan="2" align="center"><input type="submit"  name="submit" value="Connexion"></td>
                </tr>
            </table>
        </form>
        <?php

        if (isset($_POST["submit"])){
            include ("initTableaux.php");
            $type = htmlentities($_POST["type"]);
            $tab = [];

            foreach ($tabEmplacement as $emplacement){
                if ($emplacement["type"] == $type){
                    $tab[] = $emplacement;
                }
            }
            if (count($tab) == 0){
                echo "<h3 style='color: red'>Aucun emplacement de type $type</h3>";
            }else{
                echo "<table class='table table-bordered'>";
                echo "<tr><th>Identifiant</th><th>Type</th><th>Adresse</th><th>Année de construction</th></tr>";
                foreach ($tab as $emplacement){
                    echo "<tr>";
                    echo "<td>".$emplacement["idEmploi"]."</td>";
                    echo "<td>".$tabType[$emplacement["type"]]."</td>";
                    echo "<td>".$emplacement["adresse"]."</td>";
                    echo "<td>".$emplacement["annee"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
        ?>

    </div>
</div>

<?php include("./include/footer.php"); ?>
</body>
</html>
