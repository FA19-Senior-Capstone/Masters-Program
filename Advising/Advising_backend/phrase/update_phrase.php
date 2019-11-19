<body>
<?php
    include '../header/index.php';
    //connect to the database
    require_once "../config/advisng_db_config.php";
    
    $CoAbbreviation=$_POST["CoAbbreviation"]; 
    $phraseName=$_POST["phraseName"];  


     //this chechs and see if all the correct fields have the info in it. 
    if (!$phraseName || !$CoAbbreviation) {
        echo "You have not entered all required details. Please go back and try again.";
        exit;
    }

    //formarts the input
    $phraseName = addslashes($phraseName);
    $CoAbbreviation = addslashes($CoAbbreviation);
   

    $query = "UPDATE Phrase SET phraseName=?,CoAbbreviation=? WHERE phraseID=?";
    $stmt = $db->prepare($query);

    $stmt->bind_param("sss",$phraseName, $CoAbbreviation, $phraseID);
    $stmt->execute();
    echo $stmt->affected_rows. " Course Types updated in database";

    $db->close();

?>

   <br/>
   ><a href="show_phrase.php">Show Course Types</a>
   
   
   
</main>
</body>

</html>