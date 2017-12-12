<?php
include_once('fonctions/connect.php');
include_once('fonctions/fonction.fun.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
        Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>formulaire_mission</title>
        <meta name="description" content="">
        <meta name="author" content="Benaata">

        <meta name="viewport" content="width=device-width; initial-scale=1.0">

        <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link rel="stylesheet" type="text/css" href="css/principal.css" />
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
        <ul class="nav navbar-nav">

            <?php
            require_once 'includes/menu.php';
            ?>

    </div>

    <div class="col-md-12 col-xs-12 spacer">
        <div class="panel panel-info spacer">
            <div class="panel-heading">
                <h2>Gestion le suivi des missions confiées aux ingénieurs d’une SSII</h2>
            </div>

            <div class="panel-body">
                <p>

                    J’ai réalisé cette application à l’aide

                <ul>
                    <li> Safari 8.0: navigateur.</li>
                    <li> Aptana studio 3: éditeur avec coloration syntaxique.</li>
                    <li> MAMP : serveur locale</li>
                </ul>


                </p>
                <p>
                    Il a pour but de gérer le suivi des missions confiées aux ingénieurs d’une SSII.
                    Et ces interfaces respecteront les standards XHTML5 Strict et CSS.

                </p>
                <p>La structure relationnelle proposée est constituée de trois tables MySql :</p>
                <div class="col-lg-12">
                    <img src="img/srp.png" width="40%">
                    <h6>
                        FIG. 2 – Structure relationnelle proposée.
                    </h6>

                </div>

                <div class="col-lg-12">
                    <img src="img/tign.png" width="40%">
                    <h6>
                        FIG. 2 – Structure relationnelle proposée.
                    </h6>

                </div>

                <div class="col-lg-12">
                    <img src="img/tm.png" width="60%">
                    <h6>
                         FIG. 4 – Table “ingenieurs”.
                    </h6>

                </div>
            </div>

            <a class="btn btn-primary btn-lg" href="doc/document.pdf">Voir détail  de ce TP</a>

        </div>
    </div>

    <?php
    require_once 'includes/footer.php';
    ?>
    </body>
</html>

