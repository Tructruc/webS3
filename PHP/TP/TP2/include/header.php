<nav style="" class="navbar navbar-dark bg-dark shadow-sm fixed-top">
    <div style="text-align: center; width: 100%">
        <a class="navbar-brand" style="font-size: 30px" href="index.php">
            <?php
            $page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_BASENAME);
            $page = explode(".", $page);
            $page = $page[0];
            
            if ($page == "index"){$page = "Acceuil";}
            echo "$page";
            ?>
		</a>
    </div>
</nav>

