<body>
<?php
    include '../header/index.php';
    $searchType=$_POST['searchtype'];
    $searchterm=$_POST['searchterm'];

    if(!$searchType){

        echo "Nothing was typed into search, Please type something to search.";
        exit;
    };

    //connect to the database
    
    @$db = new mysqli('localhost', 'root', '', 'cs492s19');


    if ($db->connect_error) {
        die('Connect Error ' . $db->connect_errno . ': ' . $db->connect_error);
    }


    $query = "SELECT * FROM Prefix WHERE $searchType LIKE ?";
    $stmt = $db->prepare($query);
    $term = "%" . $searchterm . "%";
    $stmt->bind_param("s", $term);
    $stmt->execute();
    $result = $stmt->get_result();
    $num_results = $result->num_rows;
    echo "<p>Number of prefixes found: $num_results ";


    for($i=0; $i<$num_results; $i++){ 
        $row = $result->fetch_assoc();
        echo "<br />";
        echo "Prefix: ".stripslashes($row['prefix']);
        echo "<br />";
        echo "departmentID: ".stripslashes($row['departmentID']);
        echo "<br />";

    }
    $result->free();
    $db->close();
?>

    <br/>
    ><a href="show_prefix.php">Show Prefixes</a>
</main>
</body>

</html>