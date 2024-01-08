<div id="sidebar" class="sidebar-offcanvas">
    <div style="padding-top: 30px;" class="col-md-12">
        <ul class="nav nav-pills flex-column">
            
		<?php


			$page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_BASENAME);
			$dir    = ".";
			$files1 = scandir($dir);
			
			$files = array_slice($files1, 2);

            $hidden = array("identification.php", "initTableaux.php", "traitConnexion.php", "index.php", "Deconnexion.php", "traitDeconnexion.php","cookieDelete.php", "tratCookieDelete.php", "connect.inc.php");

            $print = true;

            if ($page== "identification.php"){
                $print = false;
            }
        if ($print){
            echo '<li class="nav-item">';
            if ($page == 'index.php') {
                echo '<a class="nav-link active" href="index.php">Accueil</a>';
            } else {
                echo '<a class="nav-link" href="index.php">Accueil</a>';
            }
            echo '</li>';

            foreach ($files as $key => $file) {
                if ($file != "traitConnexion.php" && !in_array($file, $hidden)) {
                    if (str_ends_with($file, '.php')) {
                        $str = str_replace(".php", "", $file);
                        echo '<li class="nav-item">';
                        if ($page == $file) {
                            echo "<a class='nav-link active' href='$file'>$str</a>";
                        } else {
                            echo "<a class='nav-link' href='$file'>$str</a>";
                        }
                        echo '</li>';
                    }
                }
            }

            if (isset($_COOKIE['CEmilienFIEU'])) {
                echo '<li class="nav-item">';
                if ($page == 'identification.php') {
                    echo '<a class="nav-link active" href="cookieDelete.php">Supprimer le cookie</a>';
                } else {
                    echo '<a class="nav-link" href="cookieDelete.php">Supprimer le cookie</a>';
                }
                echo '</li>';
            }

            echo '<li class="nav-item">';
            if ($page == 'Deconnexion.php') {
                echo '<a class="nav-link active" href="Deconnexion.php">Déconnexion</a>';
            } else {
                echo '<a class="nav-link" href="Deconnexion.php">Déconnexion</a>';
            }
        }
		?>
        </ul>
    </div>
</div>

