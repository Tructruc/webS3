<div id="sidebar" class="sidebar-offcanvas">
    <div style="padding-top: 30px;" class="col-md-12">
        <ul class="nav nav-pills flex-column">
            
			<?php
				// on récupère le nom du script executé sans son chemin
				$page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_BASENAME);
				// echo $page;
				echo '<li class="nav-item">';
				if ($page == 'traitConnexion.php') {
					echo '<a class="nav-link active" href="traitConnexion.php">Accueil</a>';
				}
				else {
					echo '<a class="nav-link" href="traitConnexion.php">Accueil</a>';
				}
				echo '</li>';
				
				
				echo '<li class="nav-item">';
				if ($page == 'page2.php') {
					echo '<a class="nav-link active" href="page2.php">Page 2</a>';
				}
				else {
					echo '<a class="nav-link" href="page2.php">Page 2</a>';
				}
				echo '</li>';
				
				
				echo '<li class="nav-item">';
				if ($page == 'page3.php') {
					echo '<a class="nav-link active" href="page3.php">Page 3</a>';
				}
				else {
					echo '<a class="nav-link" href="page3.php">Page 3</a>';
				}
				echo '</li>';
				
				
				echo '<li class="nav-item">';
				if ($page == 'page4.php') {
					echo '<a class="nav-link active" href="page4.php">Page 4</a>';
				}
				else {
					echo '<a class="nav-link" href="page4.php">Page 4</a>';
				}
				echo '</li>';	
			?>
        </ul>
    </div>
</div>

