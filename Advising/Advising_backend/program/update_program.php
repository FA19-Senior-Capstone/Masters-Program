<body>

    <?php include '../header/index.php'; ?>
    <main role="main" class="container-fluid">
    <h1> Edit Program </h1>

    <form action="update_program.php" method="post">

    Program ID: <input type="text" name="programID" required>
    <br>
    Edit Program: <input type="text" name="programName" required>
    <br>
    Edit Program Abbreviation: <input type="text" name="programAbbr" required>
    <br>
    Edit Grad/Undergrad: <input type="text" name="grad/undergrad" required>
    <br>
    <input type="submit" name="update" value="Update Program">
    </form>
    <br>

    <?php

    if(isset($_POST['update'])){
        
 
        require_once '../config/advisng_db_config.php';
        
        $programID = $_POST['programID'];
        $programName = $_POST['programName'];
        $programAbbr = $_POST['programAbbr'];
        $gradUnder = $_POST['grad/undergrad'];


        // query to send to the database to update it 
        $query = "UPDATE Program SET programName = '$programName', programAbbr = '$programAbbr' WHERE programID = '$programID'";

    

        $result = mysqli_query($db , $query);

        if($result){
            echo 'Program updated';
            
        } else {
            echo 'Program did not updated';
        }
        $db->close();
    }


    ?>
    <br>
    <a href="show_program.php">Show Program</a>
</main>
</body>