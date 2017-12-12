<?php
include_once ('connect.php');
include_once ('fonction.fun.php');

if(!empty($_GET)){

    if(isset($_GET['missions']) && isset($_GET['ingenieurs'])) {

        modifier_affectations($bdd,$_GET['missions'],$_GET['ingenieurs']);
        $msg= "l'affectation a été bien effectuer  ";

    }elseif(isset($_GET['missions']) ){

    }

    else{
        $erreur= "Erreur lors du affectation";

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

                <h3>1 - Afficher la liste des ingénieurs d’une mission donnée</h3>


                <form method="get" action="<?php echo $_SERVER['PHP_SELF']?>">

                    <label>Sélectionnez la mission:</label>
                    <?php $reponse=affiche_missions($bdd);   ?>
                    <select name="missions" id="missions">

                        <?php     while($donnees= $reponse->fetch(PDO::FETCH_ASSOC)){ ?>
                            <option <?php if(!isset($_GET['missions'])) $_GET['missions']=1; if($donnees['idmissions'] == $_GET['missions']) echo "selected='selected'"?> value="<?php echo $donnees['idmissions'];?>"><?php echo $donnees['mission'];?></option>

                        <?php  } ?>
                    </select>
                    <input type="submit" name="bouton" id="bouton" value="Envoyer" />
                </form>

                <br>

                <?php if(isset($_GET['missions'])){

                    echo"<table class=\"table\">";
                    echo "<tr>
                        <th>idingenieurs</th><th>nom</th><th>prenom</th><th>agence</th><th>telephone</th>
                    </tr> ";

                    $reponse=affiche_ingenieursParMission($bdd,$_GET['missions']);
                    while($donnees= $reponse->fetch(PDO::FETCH_ASSOC)){
                        echo"<tr>";
                        echo "<td>".$donnees['idingenieurs']."</td><td>".$donnees['nom']."</td><td>".$donnees['prenom']."</td><td>".$donnees['agence']."</td><td>".$donnees['telephone']."</td>" ;
                        echo"</tr>";
                    }

                    echo"</table>";
                }?>


            </div>

            <br>

            <div class="content">

                    <h3>2-Table affectation</h3>


                    <?php  if(isset($msg))
                        echo "<div class='alert alert-success'>" .$msg."</div>";
                    ?>

                    <?php  if(isset($erreur))

                        echo "<div class='alert alert-danger'>" .$erreur."</div>";
                    ?>

                    <form method="get" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <table class="table">

                            <tr>
                                <td><label for="age">Sélectionnez la mission:</label> <?php $reponse = affiche_missions($bdd); ?> </td>
                                <td>
                                    <select name="missions" id="missions">

                                        <?php     while($donnees= $reponse->fetch(PDO::FETCH_ASSOC)){ ?>
                                            <option <?php if(!isset($_GET['missions'])) $_GET['missions']=1; if($donnees['idmissions'] == $_GET['missions']) echo "selected='selected'"?> value="<?php echo $donnees['idmissions']; ?>"><?php echo $donnees['mission']; ?></option>
                                            <!--  <option><?php echo $donnees['nom'] ?></option> -->
                                        <?php  } ?>
                                    </select></td>
                            </tr>

                            <tr>
                                <td><label for="age">Sélectionnez l'ingenieur:</label> <?php $reponse = affiche_ingenieurs($bdd); ?> </td>
                                <td>
                                    <select name="ingenieurs" id="ingenieurs">

                                        <?php     while($donnees= $reponse->fetch(PDO::FETCH_ASSOC)){    ?>
                                            <option <?php if(!isset($_GET['ingenieurs'])) $_GET['ingenieurs']=1 ;if($donnees['idingenieurs']== $_GET['ingenieurs']) echo "selected='selected'"?> value="<?php echo $donnees['idingenieurs']; ?>"><?php echo $donnees['nom']; ?></option>
                                            <!--  <option><?php echo $donnees['nom'] ?></option> -->
                                        <?php  } ?>
                                    </select></th>
                            </tr>

                            <tr>
                                <td>
                                    <input type="submit" value="Valider"/>
                                </td>
                                <td></td>
                            </tr>

                        </table>


                </div>

            </div>

        </div>


    <?php
    require_once 'footer.php';
    ?>

</body>
</html>
