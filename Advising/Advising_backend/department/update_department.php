<body>

    <?php include '../header/index.php'; ?>
    <main role="main" class="container-fluid">
    <h1> Edit Department </h1>

    <form action="update_department.php" method="post">

    Department ID: <input type="text" name="departmentID" required>
    <br>
    New Department: <input type="text" name="departmentName" required>
    <br>
    New Department Abbreviation: <input type="text" name="depAbbrreviation" required>
    <br>
    <input type="submit" name="update" value="Update Department">
    </form>
    <br>

    <?php

    if(isset($_POST['update'])){
        
 
        require_once '../config/advisng_db_config.php';
        
        $departmentID = $_POST['departmentID'];
        $departmentName = $_POST['departmentName'];
        $depAbbreviation = $_POST['depAbbrreviation'];

       
       
        $query = "UPDATE Department SET departmentName = '$departmentName', depAbbrreviation = '$depAbbreviation' WHERE DepartmentID = '$departmentID'";

    

        $result = mysqli_query($db , $query);

        if($result){
            echo 'Department updated';
            
        } else {
            echo 'Department did not updated';
        }
        $db->close();
    }


    ?>
    <br>
    <a href="show_department.php">Show Department</a>
</main>
</body>