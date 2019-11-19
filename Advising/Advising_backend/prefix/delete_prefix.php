<body>
<?php
    include '../header/index.php';
    $prefixID=$_GET["prefixID"];
   
    //connect to the database
    
    @$db = new mysqli('localhost', 'root', '', 'cs492s19');


    if ($db->connect_error) {
        die('Connect Error ' . $db->connect_errno . ': ' . $db->connect_error);
    }


    $query = "Delete from Prefix where PrefixID=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $prefixID);
    $stmt->execute();
    echo $stmt->affected_rows." Prefix deleted from database";

    $db->close();
?>

    <br/>
    ><a href="show_prefix.php">Show Prefix</a>
    
    
</main>
</body>

</html>
