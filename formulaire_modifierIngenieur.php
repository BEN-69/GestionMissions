<?php
include_once('fonctions/connect.php');
include_once('fonctions/fonction.fun.php');

        if(isset($_GET['idING'])) {

            $reponse = afficher_ingenieurParId($bdd, $_GET['idING']);
            $donnees = $reponse->fetch(PDO::FETCH_ASSOC);

            if($donnees){

            }else{

                ?>
                <script type="text/javascript">document.location.href ="principal.php"</script>
                <?php

            }

        }elseif(!empty($_POST)){

            if(!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['agence']) and  !empty($_POST['telephone'])){
                $nom=$_POST['nom'];
                $prenom=$_POST['prenom'];
                $agence=$_POST['agence'];
                $telephone=$_POST['telephone'];
                $id=$_POST['idingenieurs'];

              //  var_dump($_POST);

                 modifier_ingenieurParId($bdd,$nom,$prenom,$agence,$telephone,$id);

                ?>
                <script type="text/javascript">document.location.href ="principal.php"</script>
                <?php
            }
            else{
                $erreur= "Erreur : les champs sont vide ";
            }
        }else{


            ?>
            <script type="text/javascript">document.location.href ="principal.php"</script>
            <?php

        }


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

                <h3>Ajouter un ingénieur a la base de données</h3>


                <?php  if(isset($msg))

                    echo "<div class='alert alert-success'>" .$msg."</div>";

                ?>

                <?php  if(isset($erreur))

                    echo "<div class='alert alert-danger'>" .$erreur."</div>";
                ?>
                <br>

                <form class="form-horizontal" method="POST" action=<?php echo $_SERVER["PHP_SELF"] ; ?>>


                        <input type="hidden" name="idingenieurs" value="<?= $donnees['idingenieurs'] ?>" />
                        <div class='form-group row'>
                            <label class="col-sm-2"> Nom:</label>
                            <div class="col-sm-10">
                                <input type="text" name="nom" value="<?= $donnees['nom'] ?>" />
                            </div>
                        </div>

                        <div class='form-group row'>
                            <label class="col-sm-2">Prénom:</label>
                            <div class="col-sm-10">
                             <input type="text" name="prenom" value="<?= $donnees['prenom'] ?>" />
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label class="col-sm-2">Agence:</label>
                            <div class="col-sm-10">
                                <input type="text" name="agence" value="<?= $donnees['agence'] ?>" />
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label class="col-sm-2 col-form-label">Telephone:</label>
                            <div class="col-sm-10">
                                <input type="text" name="telephone" value="<?= $donnees['telephone'] ?>" />
                            </div>
                        </div>
                        <div class='form-group row'>
                            <div class="col-sm-10">
                            <button type="reset" class="btn btn-primary">Annuler</button>
                            <button type="submit" class="btn btn-primary">Valider</button>
                            </div>

                        </div>
                </form>




            </div>

        </div>

    </div>

    <?php
    require_once 'includes/footer.php';
    ?>

</body>
</html>

