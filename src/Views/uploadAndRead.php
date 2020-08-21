<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <script src="js/message.js"></script>
</head>

<body>
    <header>
        <h1>All in the Family</h1>
        <div name="messageArea" id="messageArea">

        <?php


if (file_exists('xml/dataXML.xml')) {
    $xml = simplexml_load_file('xml/dataXML.xml');
    

    
    $p_cnt = count($xml->message)-1;
    
///////////////////////////////////////////////////////////////////////////////////////

if($p_cnt>10){

    echo "too much message aboard";
    $xmlRemove = simplexml_load_file('xml/dataXML.xml');
    list($xmlRem) = $xml->xpath("message");
    unset($xmlRem[0]);
   
}

$xml->asXML("xml/dataXML.xml"); 
////////////////////////////////////////////////////////////////////////////////////////

    for($i = $p_cnt; $i > 0; $i--) {
      $message = $xml->message[$i];
      $imgSrc=$xml->message[$i]->fichier;
      echo $xml->message[$i]->pseudo.'<br/>' ;
      echo $xml->message[$i]->msgtxt.'<br/>'; 
      echo "<a href='$imgSrc'><img src='$imgSrc' width='200px'></a>'".'<br/>';
    } 

} 

else {
    exit('Echec lors de l\'ouverture du fichier test.xml.');
}
?>

        </div>
    </header>
    <section>
        <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="pseudo" id="pseudo" value="family">
            <input type="text" name="message" id="message" value="" placeholder="entrez votre message...">
            <p class="txtcenter">
                <label for="file" class="label-file">Choisir un fichier</label>
                <input name="file" id="file" class="input-file" type="file">
            </p>
            <input type="submit" value="envoyer"><input type="reset" value="effacer">
        </form>
    </section>
</body>

</html>