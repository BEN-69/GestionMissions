<?php
include_once ('connect.php');
include_once ('fonction.fun.php');

if(isset($_GET['idMIS'])) {

    $reponse = afficher_missionParId($bdd, $_GET['idMIS']);
    $donnees = $reponse->fetch(PDO::FETCH_ASSOC);

    if($donnees){

    }else{

        ?>
        <script type="text/javascript">document.location.href ="principal.php"</script>
        <?php

    }

}elseif(!empty($_POST)){

    if(!empty($_POST['mission']) and !empty($_POST['lieu']) and  !empty($_POST['directeur'])){
        $mission=$_POST['mission'];
        $lieu=$_POST['lieu'];
        $directeur=$_POST['directeur'];

        $id=$_POST['idmissions'];

        //  var_dump($_POST);

        modifier_missionParId($bdd,$mission,$lieu,$directeur,$id);

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
    <link rel="stylesheet" type="text/css" href="principal.css" />
    <!-- Bootstrap -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-responsive.min.css" rel="stylesheet">
</head>

<body>

<?php
require_once 'menu.php';
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

                <form class="form-horizontal" action=<?php echo $_SERVER["PHP_SELF"] ; ?> method="POST"><fieldset>

                        <input type="hidden" name="idmissions" value="<?= $donnees['idmissions'] ?>" />
                        <div class='form-group row'>
                            <label class="col-sm-2"> Mission :</label>
                            <div class="col-sm-10">
                                <input type="text" name="mission" value="<?= $donnees['mission'] ?>" />
                            </div>
                        </div>

                        <div class='form-group row'>
                            <label class="col-sm-2">Lieu:</label>
                            <div class="col-sm-10">
                                <input type="text" name="lieu" value="<?= $donnees['lieu'] ?>" />
                            </div>
                        </div>
                        <div class='form-group row'>
                            <label class="col-sm-2">Directeur:</label>
                            <div class="col-sm-10">
                                <input type="text" name="directeur" value="<?= $donnees['directeur'] ?>" />
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
    require_once 'footer.php';
    ?>

</body>
</html>

