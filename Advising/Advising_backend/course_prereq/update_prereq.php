<body>

    <?php include '../header/index.php'; ?>

    <main role="main" class="container-fluid">
    <h1> Edit College </h1>

    <form action="update_college.php" method="post">

    College ID <input type="text" name="collegeID" required>
    <br>
    Update College Name: <input type="text" name="collegeName" required>
    <br>
    Update College Abbreviation: <input type="text" name="coAbbreviation" required>
    <br>

    <input type="submit" name="update" value="Update College">
    </form>
    <br>

    <?php

    if(isset($_POST['update'])){


        require_once '../config/advisng_db_config.php';


        $postCollegeID = $_POST['collegeID'];
        $collegeName = $_POST['collegeName'];
        $coAbbreviation = $_POST['coAbbreviation'];

        // look into changing this either by the end of the semester or next semester because this can cause a sql injection.
        $query = "UPDATE College SET collegeName = '$collegeName', coAbbreviation = '$coAbbreviation' WHERE collegeID = '$postCollegeID'";

        $result = mysqli_query($db, $query);

        if($result){
            echo 'College updated';
        } else {
            echo 'College did not updated';
        }
        $db->close();
    }


    ?>
    <br>
    <a href="show_college.php">Show College</a>
</main>
</body>
