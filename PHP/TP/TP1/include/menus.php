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
				if ($page == 'AffecterCategories.php') {
					echo '<a class="nav-link active" href="AffecterCategories.php">AffecterCategories</a>';
				}
				else {
					echo '<a class="nav-link" href="AffecterCategories.php">AffecterCategories</a>';
				}
				echo '</li>';
				
				
				echo '<li class="nav-item">';
				if ($page == 'AfficheTitres.php') {
					echo '<a class="nav-link active" href="AfficheTitres.php">AfficheTitres</a>';
				}
				else {
					echo '<a class="nav-link" href="AfficheTitres.php">AfficheTitres</a>';
				}
				echo '</li>';
				
				
				echo '<li class="nav-item">';
				if ($page == 'Test_multiplie.php') {
					echo '<a class="nav-link active" href="Test_multiplie.php">Multiplie</a>';
				}
				else {
					echo '<a class="nav-link" href="Test_multiplie.php">Multiplie</a>';
				}
				echo '</li>';	
			?>
        </ul>
    </div>
</div>

