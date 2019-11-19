<body>
    <main role="main" class="container-fluid">
	<h1> College Search </h1>
<?php

    // has the navbar at the top
    include '../header/index.php';
    //file used to connect to the databse 
    require_once "../config/advisng_db_config.php";

    //POST will send the data to the server. 
    //So this will send the searchterm/searchType

    $searchType=$_POST['searchtype'];
    $searchterm=$_POST['searchterm'];

    //if there is no data typed into search
    if(!$searchType){

        echo "Nothing was typed into search, Please type something to search.";
        exit;
    };

    //This is the query being sent to the database
    $query = "SELECT * FROM College WHERE $searchType LIKE ?";
    //prepairs the query to be sent 
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
        echo "College Name ".stripslashes($row['collegeName']);
        echo "<br />";
        echo "College Abbreviation: ".stripslashes($row['CoAbbreviation']);
        echo "<br />";

    }
    $result->free();
    $db->close();
?>

    <br/>
    ><a href="show_college.php">Show Colleges</a>
</main>
</body>

</html>