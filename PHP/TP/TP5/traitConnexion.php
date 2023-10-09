<?php
    if (isset($_POST['submit'])){
        $identifiant = htmlentities($_POST['identifiant']);
        $motdepasse = htmlentities($_POST['motdepasse']);
        if ($identifiant == "Joe" && $motdepasse == "Bidden"){

            if (isset($_POST['souvenir'])){
                setcookie("CEmilienFIEU", $identifiant, time() + 60*15);
            }

            session_name("SEmilienFIEU");
            session_start();
            $_SESSION['conn'] = "connected";
            header("Location: index.php");
            exit();

        }else{
            header("Location: identification.php?erreur=1");
            exit();
        }
    } else {
        header("Location: identification.php?erreur=0");
        exit();
    }
?>
