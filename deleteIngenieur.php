<?php
include_once ('connect.php');
include_once ('fonction.fun.php');

     if(!empty($_GET)){

            if(isset($_GET['id'])) {

                $id = $_GET['id'];


                $query = 'DELETE FROM `ingenieurs` WHERE idingenieurs =' . $id;

                //envoyer cette requête


                $ps = $bdd->prepare($query);

                if($ps->execute()) {

                    $msg = " l'ingenieur a été bien ajouter ";
                }
            }

             else{
                 $erreur= "Erreur : les champs sont vide ";
                 
             }
     }



?>

<script type="text/javascript">document.location.href = "principal.php"</script>
