<?php
include_once('fonctions/connect.php');
include_once('fonctions/fonction.fun.php');


if(!empty($_GET)){

    if(isset($_GET['idING'])) {

        $id = $_GET['idING'];


        $query = 'DELETE FROM `ingenieurs` WHERE idingenieurs =' . $id;

        //envoyer cette requête


        $ps = $bdd->prepare($query);

        if($ps->execute()) {

            $msg1 = " l'ingenieur a été bien supprimer ";
        }
    }elseif(isset($_GET['idMIS'])) {

        $id = $_GET['idMIS'];

        $query = 'DELETE FROM `missions` WHERE idmissions =' . $id;

        //envoyer cette requête


        $ps = $bdd->prepare($query);

        if($ps->execute()) {

            $msg2 = " la mission a été bien supprimer ";

        }
    }

    else{
        $erreur= "Erreur lors du suppresion  ";

    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
        Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Gestion missions</title>
        <meta name="description" content="">
        <meta name="author" content="Benaata">

        <meta name="viewport" content="width=device-width; initial-scale=1.0">

        <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
        <link rel="shortcut icon" href="/favicon.ico">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link rel="stylesheet" type="text/css" href="css/principal.css" />
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    </head>

    <body>

    <?php
    require_once 'includes/menu.php';
    ?>

    <div class="col-md-12 col-xs-12 spacer">
        <div class="panel panel-info spacer">
            <div class="panel-heading">
                <h2>Gestion le suivi des missions confiées aux ingénieurs d’une SSII</h2>
            </div>
            <div class="panel-body">
                <div class="content">

                    <h3 id="ingenieurs">1 . la table des ingenieurs</h3>

                    <a class="btn btn-primary btn-lg" href="formulaire_ajouterIngenieur.php">Ajouter un ingenieur </a>
                    <br>

                    <?php  if(isset($msg1))
                        echo "<div class='alert alert-success'>" .$msg1."</div>";
                    ?>

                    <?php  if(isset($erreur))

                        echo "<div class='alert alert-danger'>" .$erreur."</div>";
                    ?>
                    <br>
                    <div class="table-responsive table-bordered">
                        <table class="table table-striped">
                            <thead>
                            <tr class="bg-info">
                                <th>#</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Agence</th>
                                <th>Télèphone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  $reponse = affiche_ingenieurs($bdd); while ($donnees = $reponse -> fetch(PDO::FETCH_ASSOC)): ?>
                                <tr class="gradeC">
                                    <td><?= $donnees['idingenieurs']  ?></td>
                                    <td><?= $donnees['nom'] ?></td>
                                    <td><?= $donnees['prenom'] ?></td>
                                    <td><?= $donnees['agence'] ?></td>
                                    <td><?= $donnees['telephone'] ?></td>
                                    <td class="center">
                                        <a href="formulaire_modifierIngenieur.php?idING=<?= $donnees['idingenieurs'] ?>" class="btn btn-mini btn-info">Edit</a>
                                        <a href="principal.php?idING=<?= $donnees['idingenieurs'] ?>" class="btn btn-mini btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>

                            </tbody>
                        </table>
                    </div>

                    <h3 id="missions">2 . la table des missions</h3>
                    <a class="btn btn-primary btn-lg" href="formulaire_ajouterMission.php">Ajouter une mission </a>

                    <br/>

                    <?php  if(isset($msg2))
                        echo "<div class='alert alert-success'>" .$msg2."</div>";
                    ?>

                    <?php  if(isset($erreur))

                        echo "<div class='alert alert-danger'>" .$erreur."</div>";
                    ?>

                    <br>

                    <div class="table-responsive table-bordered">
                        <table class="table table-striped">
                            <thead>
                            <tr class="bg-info">
                                <th>#</th>
                                <th>mission</th>
                                <th>lieu</th>
                                <th>directeur</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php   $reponse = affiche_missions($bdd); while ($donnees = $reponse -> fetch(PDO::FETCH_ASSOC)): ?>
                                <tr class="gradeC">
                                    <td><?= $donnees['idmissions']  ?></td>
                                    <td><?= $donnees['mission'] ?></td>
                                    <td><?= $donnees['lieu'] ?></td>
                                    <td><?= $donnees['directeur'] ?></td>
                                    <td class="center">
                                        <a href="formulaire_modifierMission.php?idMIS=<?= $donnees['idmissions'] ?>" class="btn btn-mini btn-info">Edit</a>
                                        <a href="principal.php?idMIS=<?= $donnees['idmissions'] ?>" class="btn btn-mini btn-danger">Delete</a>

                                    </td>
                                </tr>
                            <?php endwhile; ?>

                            </tbody>
                        </table>
                    </div>

                    <h3 id="ingenieur_mission">3 . la table Les ingenieurs avec leur missions</h3>
                    <div class="table-responsive table-bordered">
                        <table class="table table-striped">
                            <thead>
                            <tr class="bg-info">
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Agence</th>
                                <th>Télèphone</th>
                                <th>Mission</th>
                                <th>Lieu</th>
                                <th>Directeur</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php   $reponse = affiche_missions_ingenieurs($bdd); while ($donnees = $reponse -> fetch(PDO::FETCH_ASSOC)): ?>
                                <tr class="gradeC">
                                    <td><?= $donnees['nom']  ?></td>
                                    <td><?= $donnees['prenom'] ?></td>
                                    <td><?= $donnees['agence'] ?></td>
                                    <td><?= $donnees['telephone'] ?></td>
                                    <td><?= $donnees['mission'] ?></td>
                                    <td><?= $donnees['lieu'] ?></td>
                                    <td><?= $donnees['directeur'] ?></td>
                                </tr>
                            <?php endwhile; ?>

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>

        <?php
        require_once 'includes/footer.php';
        ?>

    </body>
</html>

