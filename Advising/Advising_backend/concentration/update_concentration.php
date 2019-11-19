<body>

    <?php include '../header/index.php'; ?>
    <main role="main" class="container-fluid">
    <h1> Edit Concentration </h1>

    <form action="update_concentration.php" method="post">

    New Concentration: <input type="text" name="concentrationName" required>
    <br>
    New Concentration Abbreviation: <input type="text" name="concentrationabbr" required>
    <br>
    <input type="submit" name="update" value="Update Concentration">
    </form>
    <br>

    <?php

    if(isset($_POST['update'])){
        
 
        require_once '../config/advisng_db_config.php';
        
        @$concentrationID = $_POST['concentrationID'];
        @$concentrationName = $_POST['concentrationName'];
        @$concentrationabbr = $_POST['concentrationabbr'];

       
       
        $query = "UPDATE Concentration SET concentrationName = '$concentrationName', concentrationabbr = '$concentrationabbr' WHERE concentrationID = $concentrationID";

    

        $result = mysqli_query($db , $query);

        if($result){
            echo 'Concentration updated';
            echo $concentrationID;
        } else {
            echo 'Concentration did not updated';
        }
        $db->close();
    }


    ?>
    <br>
    <a href="show_concentration.php">Show Concentration</a>
</main>
</body>