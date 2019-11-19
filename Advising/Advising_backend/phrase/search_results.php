<body>
    <main role="main" class="container-fluid">
	<h1> Course Type Search </h1>
<?php

    // has the navbar at the top
    include '../header/index.php';
    //file used to connect to the databse 
    require_once "../config/advisng_db_config.php";

    $searchType=$_POST['searchtype'];
    $searchterm=$_POST['searchterm'];

    if(!$searchType){

        echo "Nothing was typed into search, Please type something to search.";
        exit;
    };



    $query = "SELECT * FROM Phrase WHERE $searchType LIKE ?";
    $stmt = $db->prepare($query);
    $term = "%" . $searchterm . "%";
    $stmt->bind_param("s", $term);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_results = $result->num_rows;
    echo "<p>Number of collges found: $num_results ";


    for($i=0; $i<$num_results; $i++){ 
        $row = $result->fetch_assoc();
        echo "<br />";
        echo "Phrase Name ".stripslashes($row['phraseName']);
        echo "<br />";
        echo "Phrase Abbreviation: ".stripslashes($row['CoAbbreviation']);
        echo "<br />";

    }
    $result->free();
    $db->close();
?>

    <br/>
    ><a href="show_phrase.php">Show Course Types</a>
</main>
</body>

</html>