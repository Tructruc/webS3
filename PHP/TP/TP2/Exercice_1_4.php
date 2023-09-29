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

                $tab = array("StarWars" => array("Lucas", 1977, "USA"),
                    "Preadtor" => array("McTiernan", 1987, "USA"),
                    "Blade Runner" => array("Scott", 1982, "USA"));

                
                echo "<h1> Avant tri </h1>";
                foreach ($tab as $key => $value) {
                    echo "<h2>Elements de $key</h2>";
                    foreach ($value as $key2 => $value2) {
                        echo "<p>$key2 : $value2</p>";
                    }
                }
                
                echo "<br><br> ";
                
                echo "<h1> Apres tri </h1>";
                
                ksort($tab);
                foreach ($tab as $key => $value) {
                    echo "<h2>Elements de $key</h2>";
                    foreach ($value as $key2 => $value2) {
                        echo "<p>$key2 : $value2</p>";
                    }
                }
                
                
                echo "<br><br> ";
                
                $tab = array("StarWars" => array("Realisateur" => "Lucas", "Année" => 1977, "Pays" => "USA"),
                    "Predator" => array("Realisateur" => "McTiernan", "Année" => 1987, "Pays" => "USA"),
                    "Blade Runner" => array("Realisateur" => "Scott", "Année" => 1982, "Pays" => "USA"));


                echo "<h1> Film choisi au hasard </h1>";
                $rand_keys = array_rand($tab, 1);
                echo "<h2>Elements de $rand_keys</h2>";
                foreach ($tab[$rand_keys] as $key => $value) {
                    echo "<p>$key : $value</p>";
                }
                
                
                echo "<br><br> ";
                
                $continents = array("Europe", "Asie", "Afrique", "Amerique", "Oceanie");
                
                echo "<h1> Avant mélange </h1>";
                
                foreach ($continents as $key => $value) {
                    echo "<p>$value</p>";
                }
                
                echo "<br><br> ";
                
                echo "<h1> Apres mélange </h1>";
                
                shuffle($continents);
                
                foreach ($continents as $key => $value) {
                    echo "<p>$value</p>";
                }
                
                echo "<br><br> ";
                
                echo "<h1> Apres un autre mélange </h1>";
                
                shuffle($continents);
                
                foreach ($continents as $key => $value) {
                    echo "<p>$value</p>";
                }
                
                ?>
            </div>
        </div>

        <?php include("./include/footer.php"); ?>
    </body>
</html>
