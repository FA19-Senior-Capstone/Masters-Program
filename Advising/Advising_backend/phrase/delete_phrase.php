<body>
    
    <main role="main" class="container-fluid">
	<h1>Remove Course Type</h1>
<?php
    //gets the navbar
    include '../header/index.php';

    $phraseID=$_GET["phraseID"];
   
    //connect to the database
    require_once "../config/advisng_db_config.php";

    $query = "DELETE FROM Phrase WHERE phraseID=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $phraseID);
    $stmt->execute();
    echo $stmt->affected_rows." Phrase deleted from database";
    
    $db->close();
?>

    <br/>
    ><a href="show_phrase.php">Show Course Types</a>   
</main>
</body>

</html>
