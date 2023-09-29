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
            <div class="col-md-12">
                <?php
                $tab = array("StarWars" => array("Realisateur" => "Lucas", "Année" => 1977, "Pays" => "USA"),
                    "Predator" => array("Realisateur" => "McTiernan", "Année" => 1987, "Pays" => "USA"),
                   "Blade Runner" => array("Realisateur" => "Scott", "Année" => 1982, "Pays" => "USA"));

                echo "<pre>";
                print_r($tab);
                echo "</pre>";
                ?>
            </div>
        </div>

        <?php include("./include/footer.php"); ?>
    </body>
</html>
