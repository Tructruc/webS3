<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="include/bootstrap.min.css">
    <link rel="stylesheet" href="include/styles.css">
    <title>Mon site PWS en PHP!</title>
</head>
<body>
<?php include("./include/header.php"); ?>

<?php include("./include/menus.php"); ?>
<div style="padding-top: 30px" id="main">
    <div class="col-md-12">
        <?php
        /* Test_multiplie.php */

        require_once("Fonction.php");
        multiplie();
        echo "<BR><BR>";
        multiplie(12);
        ?>
    </div>
</div>

<?php include("./include/footer.php"); ?>
</body>
</html>