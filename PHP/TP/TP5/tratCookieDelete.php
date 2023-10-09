<?php
if (isset($_POST['submit'])){


    if (isset($_COOKIE['CEmilienFIEU'])){
        unset($_COOKIE['CEmilienFIEU']);
        setcookie("CEmilienFIEU", null, -1);
    }
}

header("Location: index.php");
exit();
?>