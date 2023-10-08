<?php
if (isset($_POST['submit'])){
    session_name("SEmilienFIEU");
    session_start();
    session_destroy();

}

header("Location: index.php");
exit();
?>