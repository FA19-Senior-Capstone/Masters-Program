<body>

    <?php include '../header/index.php'; ?>

    <main role="main" class="container-fluid">
    <h1> Edit Course </h1>

    <form action="update_course.php" method="post">

    Course ID <input type="text" name="courseID" required>
    <br>
    Update Course Number: <input type="text" name="courseNum" required>
    <br>
    Update Title: <input type="text" name="title" required>
    <br>
    Update Course Description: <input type="textbox" name="courseDescription" required>
    <br>
    Update Credit Hours: <input type="text" name="credits" required>
    <br>
    
    <input type="submit" name="update" value="Update Course">
    </form>
    <br>

    <?php

    if(isset($_POST['update'])){
        
 
        require_once '../config/advisng_db_config.php';
        
        $courseID = $_POST['courseID'];
        $courseNum = $_POST['courseNum'];
        $title = $_POST['title'];
        $courseDescription = $_POST['courseDescription'];
        $credits = $_POST['credits'];

        // look into changing this either by the end of the semester or next semester because this can cause a sql injection.
        $query = "UPDATE Course SET courseNum = '$courseNum', title = '$title', courseDescription = '$courseDescription', credits = '$credits' WHERE courseID = $courseID";

        $result = mysqli_query($db, $query);

        if($result){
            echo 'Course updated';
        } else {
            echo 'Course did not updated, try again, or contact your system admin.';
        }
        $db->close();
    }


    ?>
    <br>
    <a href="show_course.php">Show Course</a>
</main>
</body>