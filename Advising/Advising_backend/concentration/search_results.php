<?php
    include '../header/index.php';
    
    $searchType=$_POST['searchtype'];
    $searchterm=$_POST['searchterm'];

    if(!$searchType){

        echo "Nothing was typed into search, Please type something to search.";
        exit;
    };


    //connect to the database
    require_once '../config/advisng_db_config.php';


    $query = "SELECT * FROM concentration WHERE $searchType LIKE ?";
    $stmt = $db->prepare($query);
    $term = "%" . $searchterm . "%";
    $stmt->bind_param("s", $term);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_results = $result->num_rows;
    echo "<p>Number of concentration found: $num_results ";


    for($i=0; $i<$num_results; $i++){ 
        $row = $result->fetch_assoc();
        echo "<br />";
        echo "Concentration Name: ".stripslashes($row['concentrationName']);
        echo "<br />";
        echo "Concentration Abbreviation: ".stripslashes($row['concentrationabbr']);
        echo "<br />";

    }
    $result->free();
    $db->close();
?>

    <br/>
    ><a href="show_concentration.php">Show Concentration</a>
</main>
</body>

</html>