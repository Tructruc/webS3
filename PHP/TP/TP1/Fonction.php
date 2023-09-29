<?php
/* Fonction.php */

function multiplie(int $taille=5) {
	echo "<h2> Table de multiplication</h2>";
	//Début du tableau HTML
	echo "<table border='2'>";
	//Création de la première ligne de titres
	echo "<tr><th>X</th>";
	for($i=1;$i<=$taille;$i++) {
		echo "<th>$i</th>"; 
	}
	echo "</tr>";

	/*****************************
	 Création du corps de la table
	******************************/

	// Boucles de création du contenu de la table
	for ($j=1;$j<=$taille;$j++) {
		// Création de la première colonne
		echo "<tr><th>$j</th>";
		// Remplissage de la table
		for($k=1;$k<=$taille;$k++) {
			echo "<td>".$j*$k."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}
?>
