<body>

<?php

    include '../header/index.php';
    //required to connect to the database 
    require_once "../config/advisng_db_config.php";

    $searchType=$_POST['searchtype'];
    $searchterm=$_POST['searchterm'];

    if(!$searchType){

        echo "Nothing was typed into search, Please type something to search.";
        exit;
    };

    $query = "SELECT * FROM Course WHERE $searchType LIKE ?";
    $stmt = $db->prepare($query);
    $term = "%" . $searchterm . "%";
    $stmt->bind_param("s", $term);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_results = $result->num_rows;
    echo "<p>Number of Courses found: $num_results ";


    for($i=0; $i<$num_results; $i++){ 
        $row = $result->fetch_assoc();
        echo "<br />";
        echo "Course Number ".stripslashes($row['courseNum']);
        echo "<br />";
        echo "Course Title: ".stripslashes($row['title']);
        echo "<br />";
        echo "Course credits: ".stripslashes($row['credits']);
        echo "<br />";

    }
    $result->free();
    $db->close();
?>

    <br/>
    ><a href="show_course.php">Show course</a>
</main>
</body>

</html>