<?php



// get l'admin lors de la connection
function getAdmin($email, $motdepasse){

    if(require("connection.php"))
    {
        $req = $access->prepare("SELECT * FROM admin WHERE email = ? AND motdepasse = ?");
        
        $req->execute(array($email, $motdepasse));

        if($req->rowCount()==1)
        {
            $data = $req->fetch();

            return $data;

        } else {
            return false;
        }
        $req->closeCursor();
    }
}





function ajouter($IDcd, $nomCD, $dateSortie, $imagePochette, $prix){
    if(require("connection.php")){
        $req = $access->prepare("INSERT INTO cd (IDcd, nomCD, dateSortie, imagePochette, prix) VALUES (?, ?, ?, ?, ?)");
        
        $req->execute(array($IDcd, $nomCD, $dateSortie, $imagePochette, $prix));

        $req->closeCursor();
    }
}

// On aurait pu juste faire une fonction ajouter pour les deux
function ajouterArtiste($id, $nom, $alias, $dateNaissance){
    if(require("connection.php")){
        $req = $access->prepare("INSERT INTO auteur (id, nom, alias, dateNaissance) VALUES (?, ?, ?, ?)");
        
        $req->execute(array($id, $nom, $alias, $dateNaissance));

        $req->closeCursor();
    }
}


function afficher(){
    $data = [];
    if(require("connection.php")){
        $req = $access->prepare("SELECT * FROM cd LEFT JOIN auteur ON cd.IDcd = auteur.id ORDER BY auteur.ID ASC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);


        $req->closeCursor();

    }
    return $data;
}



function supprimer($IDcd){
    if(require("connection.php")){
        // Pour l'instant problème de structure de bd, obligation de supprimer l'artiste en meme temps que le cd
        $req = $access->prepare("DELETE FROM auteur WHERE ID = ?;");
        $req2 = $access->prepare("DELETE FROM cd WHERE IDcd =? ;");

        $req->execute(array($IDcd));
        $req2->execute(array($IDcd));
    }
}




?>