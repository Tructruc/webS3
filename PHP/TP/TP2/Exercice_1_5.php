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
                    $dnt = array("11/02/1955","24/04/1953", "15/10/2004", "30/04/1978", "13/07/2000");

                echo "<h2>Tableau des date de naissances</h2>";

                echo "<pre>";
                print_r($dnt);
                echo "</pre>";


                echo "<h2>Tableau des années de naissances</h2>";

                $annee = array();

                foreach ($dnt as $value) {
                    $annee[] = substr($value, 6, 4);
                }

                echo "<pre>";
                print_r($annee);
                echo "</pre>";

                ?>
            </div>
        </div>

        <?php include("./include/footer.php"); ?>
    </body>
</html>
