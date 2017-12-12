<?php


    function affiche_ingenieurs($bdd){
        //Matiere
        $sql="SELECT * FROM `ingenieurs`";
        $reponse= $bdd->query($sql);
        
       return $reponse;
    }
    
     function affiche_missions($bdd){
        
        //Matiere
        $sql="SELECT * FROM `missions`";
        $reponse= $bdd->query($sql);
        
        return $reponse;
    }
    
     function affiche_missions_ingenieurs($bdd){
        
        
        $sql="SELECT * FROM `missions`,ingenieurs,affectations WHERE ingenieurs.idingenieurs=affectations.idingenieurs and affectations.idmissions=missions.idmissions";
        
        $reponse= $bdd->prepare($sql);
        $reponse->execute();
        return $reponse;
    }
    function affiche_missionsParIngenieur($bdd,$id){ 
        
        
        $sql="SELECT * FROM `missions`,ingenieurs,affectations WHERE ingenieurs.idingenieurs=affectations.idingenieurs and affectations.idmissions=missions.idmissions and ingenieurs.idingenieurs=?";
        
        $reponse= $bdd->prepare($sql);
        $reponse->execute(array($id));
        return $reponse;
    }
    
     function affiche_ingenieursParMission($bdd,$id){
        //Matiere
        $sql="SELECT * FROM `missions`,ingenieurs,affectations WHERE ingenieurs.idingenieurs=affectations.idingenieurs and affectations.idmissions=missions.idmissions and missions.idmissions=?";
        
        $reponse= $bdd->prepare($sql);
        $reponse->execute(array($id));
        return $reponse;
    }
    function modifier_affectations($bdd,$id1,$id2){
        //Matiere
      //  $sql="UPDATE `affectations` SET `idmissions`=? WHERE `idingenieurs`=?";
        $sql="INSERT INTO `affectations` SET `idmissions`=? ,`idingenieurs`=?";

        $reponse= $bdd->prepare($sql);
        $reponse->execute(array($id1,$id2));
        return $reponse;
    }
    function ajouter_ingenieur($bdd,$nom,$prenom,$agence,$telephone){
         $sql="INSERT INTO `ingenieurs`(`nom`, `prenom`, `agence`, `telephone`) VALUES (?,?,?,?)";
       $reponse= $bdd->prepare($sql);
        $reponse->execute(array($nom,$prenom,$agence,$telephone));
        return $reponse;
    }
     function ajouter_mission($bdd,$mission,$lieu,$directeur){
        $sql="INSERT INTO `missions`(`mission`, `lieu`, `directeur`) VALUES (?,?,?)";
        $reponse= $bdd->prepare($sql);
        $reponse->execute(array($mission,$lieu,$directeur));
        return $reponse;
    }

function afficher_ingenieurParId($bdd,$id){

    $sql="SELECT * FROM ingenieurs WHERE ingenieurs.idingenieurs=?";

    $reponse= $bdd->prepare($sql);
    $reponse->execute(array($id));
    return $reponse;
}

function afficher_missionParId($bdd,$id){

    $sql="SELECT * FROM missions WHERE missions.idmissions=?";

    $reponse= $bdd->prepare($sql);
    $reponse->execute(array($id));
    return $reponse;
}

function modifier_ingenieurParId($bdd,$nom,$prenom,$agence,$telephone,$id){
    $sql="UPDATE `ingenieurs` SET `nom`=? , `prenom`=? ,`agence`=?, `telephone`=? WHERE `idingenieurs`=?";

    $reponse= $bdd->prepare($sql);
    $reponse->execute(array($nom,$prenom,$agence,$telephone,$id));

    return $reponse;
}


function modifier_missionParId($bdd,$mission,$lieu,$directeur,$id){
    $sql="UPDATE `missions` SET `mission`=? , `lieu`=? ,`directeur`=? WHERE `idmissions`=?";

    $reponse= $bdd->prepare($sql);
    $reponse->execute(array($mission,$lieu,$directeur,$id));

    return $reponse;
}


?>