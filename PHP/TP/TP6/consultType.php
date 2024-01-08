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
        <form name="consultType" method="post" action="consultType.php">
            <table>
                <?php
                include ("connect.inc.php");
                $tabType = [];

                $sql = "SELECT * FROM `Type`";


                try {
                    // Prepare the SQL query
                    $stmt = $pdo->prepare($sql);

                    // Execute the statement
                    $stmt->execute();

                    $temptab = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Get the result set
                    foreach ($temptab as $type){
                        $tabType[$type["idType"]] = $type["nomType"];
                    }

                } catch (PDOException $e) {
                    // Handle any errors
                    die("Error: " . $e->getMessage());
                }

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

            $type = htmlentities($_POST["type"]);
            $tab = [];



            $sql = "SELECT * FROM Emplacement WHERE idType = '$_POST[type]'";
            


            try {
                // Prepare the SQL query
                $stmt = $pdo->prepare($sql);

                // Execute the statement
                $stmt->execute();

                // Get the result set
                $tab = $stmt->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                // Handle any errors
                die("Error: " . $e->getMessage());
            }


            if (count($tab) == 0){
                echo "<h3 style='color: red'>Aucun emplacement de type $tabType[$type]</h3>";
            }else{
                echo "<table class='table table-bordered table-striped'>";
                echo "<thead class='thead-dark'>";
                echo "<tr><th>Identifiant</th><th>Type</th><th>Adresse</th><th>Année de construction</th></tr>";
                echo "</thead>";
                foreach ($tab as $emplacement){
                    echo "<tr>";
                    echo "<td>".$emplacement["idEmpl"]."</td>";
                    echo "<td>".$tabType[$emplacement["idType"]]."</td>";
                    echo "<td>".$emplacement["adresseEmpl"]."</td>";
                    echo "<td>".$emplacement["anneeConstruction"]."</td>";
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
