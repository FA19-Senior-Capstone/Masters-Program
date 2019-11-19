<body>

    <?php include '../header/index.php'; ?>
    <main role="main" class="container-fluid">
    <h1> Edit Prefix </h1>

    <form action="update_prefix.php" method="post">

    New Prefix: <input type="text" name="prefix" required>
    <br>
    <input type="submit" name="update" value="Update Prefix">
    </form>
    <br>

    <?php

    if(isset($_POST['update'])){
    
        require_once '../config/advisng_db_config.php';
    
        //prefixID will be updated on its own. 
        //@$prefixID = $_POST['prefixID'];
        @$prefix = $_POST['prefix'];

        //remove this, this isnt where the departmentID will be needed 
       // @$departmentID = $_POST['departmentID'];
       
        $query = "UPDATE Prefix SET prefix = '$prefix'  WHERE prefixID = $prefixID";

        $result = mysqli_query($db, $query);

        if($result){
            echo 'Prefix updated';
        } else {
            echo 'Prefix did not updated';
        }
        $db->close();
    }
    ?>
    <br>
    <a href="show_prefix.php">Show Prefixes</a>
</main>
</body>