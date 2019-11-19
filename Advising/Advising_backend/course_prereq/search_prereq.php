<body>
    <?php include_once '../header/index.php'; ?>
    <main role="main" class="container-fluid">
	<h1> Prerequisite Search </h1>
<?php

    //connects to the database 

    require_once '../config/advisng_db_config.php';
    $searchType=$_POST['searchtype'];
    $searchterm=$_POST['searchterm'];

    if(!$searchType){

        echo "Nothing was typed into search, Please type something to search.";
        exit;
    };


    $query = "SELECT * FROM phrasepreq p RIGHT JOIN courseandprerequisite c ON p.prereqID = c.prereqID WHERE $searchType LIKE ?"; //Course Prerequisite is the name of the prereq table in the database, not sure if should use course prerequisite, phrase prerequisite, or course table. Possible join Course and phrase prereq table?
    $stmt = $db->prepare($query);
    $term = "%" . $searchterm . "%";
    $stmt->bind_param("s", $term);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_results = $result->num_rows;
    echo "<p>Number of Prerequisites found: $num_results ";


    for($i=0; $i<$num_results; $i++){ 
        $row = $result->fetch_assoc(); 
        echo "<br />";
        echo "Prerequisite ID: ".stripslashes($row['prereqID']);
        echo "<br />";
        echo "Course ID: ".stripslashes($row['courseID']);
        echo "<br />";
        // It makes sense to show name for the prerequisite but I'm not sure if it should show course name or phrases? How to get the course title and phrase from course ID?
    }
    $result->free();
    $db->close();
?>

    <br/>
    ><a href="show_prereq.php">Show Prerequisite</a>
</main>
</body>

</html>