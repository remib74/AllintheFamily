<?php
/*try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 0, 5');
*/
function rwUpload(){
    
if (isset($_FILES['file']) AND $_FILES['file']['error'] == 0)

{
        
       // Testons si le fichier n'est pas trop gros

       if ($_FILES['file']['size'] <= 10000000)

       {

               // Testons si l'extension est autorisée

               $infosfichier = pathinfo($_FILES['file']['name']);

               $extension_upload = $infosfichier['extension'];

               $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

               if (in_array($extension_upload, $extensions_autorisees))

               {

                       // On peut valider le fichier et le stocker définitivement

                       move_uploaded_file($_FILES['file']['tmp_name'],
                    'uploads/' . basename($_FILES['file']['name']));

                    if (isset($_POST['message'])){
                        $messagetxt=htmlspecialchars($_POST['message']);
                        $pseudo=htmlspecialchars($_POST['pseudo']);
                        
                        $document = simplexml_load_file("xml/dataXML.xml");
                        
                        
                        $message = $document->addChild('message');
                        $message->addChild('pseudo', $pseudo);
                        $message->addChild('msgtxt', $messagetxt);
                    //    $message->addChild('fichier', $messagetxt);
                        



                    //$document = simplexml_load_file("xml/dataXML.xml");
                    $message->addChild('fichier', 'uploads/'.$_FILES['file']['name']);
                     
                    //$document->message->fichier='uploads/'.$_FILES['file']['name'];
                    $document->asXML("xml/dataXML.xml"); 
                    
                       echo "L'envoi a bien été effectué !";
                       header('Location: index.php');
                       

               }
               else {
                   
                echo 'non !!!';

               }

       }

}
}
}
?>