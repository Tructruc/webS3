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
        <h2>Consultation des emplacements par date de construction</h2>
        <form name="consultDate" method="post" action="consultDate.php">
            <table>
                <tr>
                    <td>

                        <input type="radio" name="annee" value="-2000" <?php if (isset($_POST["annee"]) && $_POST["annee"] == "-2000") echo "checked"; ?>>
                    </td>
                    <td>Date de construction/rénovation antérieure à 2000</td>

                </tr>
                <tr>
                    <td>
                        <input type="radio" name="annee" value="2000-2009" <?php if (isset($_POST["annee"]) && $_POST["annee"] == "2000-2009") echo "checked"; ?>>
                    </td>
                    <td>Date de construction/rénovation comprise entre 2000 et 209</td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" name="annee" value="2010-" <?php if (isset($_POST["annee"]) && $_POST["annee"] == "2010-") echo "checked"; ?>>
                    </td>
                    <td>Date de construction/rénovation postérieure ou égale à 2010</td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit"  name="submit" value="Connexion"></td>
                </tr>
            </table>
        </form>
        <?php
        if (isset($_POST["submit"])){
            include 'connect.inc.php';
            $annee = htmlentities($_POST["annee"]);
            $tab = [];

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



            if ($annee == "-2000"){
                $sql = "SELECT * FROM `Emplacement` WHERE `anneeConstruction` < 2000";
            }elseif ($annee == "2000-2009"){
                $sql = "SELECT * FROM `Emplacement` WHERE `anneeConstruction` >= 2000 AND `anneeConstruction` < 2010";
            }elseif ($annee == "2010-"){
                $sql = "SELECT * FROM `Emplacement` WHERE `anneeConstruction` >= 2010";
            }

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
        ?>
    </div>
</div>

<?php include("./include/footer.php"); ?>
</body>
</html>
