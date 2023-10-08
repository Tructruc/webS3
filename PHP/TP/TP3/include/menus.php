<div id="sidebar" class="sidebar-offcanvas">
    <div style="padding-top: 30px;" class="col-md-12">
        <ul class="nav nav-pills flex-column">
            
		<?php
			$page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_BASENAME);
			$dir    = ".";
			$files1 = scandir($dir);
			
			$files = array_slice($files1, 2);

            $hidden = array("identification.php", "initTableaux.php");
			
			echo '<li class="nav-item">';
			if ($page == 'traitConnexion.php') {
				echo '<a class="nav-link active" href="traitConnexion.php">Accueil</a>';
			}
			else {
				echo '<a class="nav-link" href="traitConnexion.php">Accueil</a>';
			}
			echo '</li>';
			
			foreach ($files as $key => $file){
				if ($file != "traitConnexion.php" && !in_array($file, $hidden)){
					if (str_ends_with($file, '.php')){
						$str = str_replace(".php", "", $file);
						echo '<li class="nav-item">';
						if ($page == $file) {
							echo "<a class='nav-link active' href='$file'>$str</a>";
						}
						else {
							echo "<a class='nav-link' href='$file'>$str</a>";
						}
						echo '</li>';
					}
				}
			}
		?>
        </ul>
    </div>
</div>

