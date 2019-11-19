<body>
    <?php include_once '../header/index.php'; ?>
    <main role="main" class="container-fluid">
        <h1>Show Prerequisites</h1>
<?php
    require_once '../config/advisng_db_config.php';
    //$query = "SELECT * FROM CourseAndPrerequisite";
    $query="SELECT DISTINCT Course.title as courseName, Course.courseNum as CourseNumber FROM Course INNER JOIN CourseAndPrerequisite ON CourseAndPrerequisite.courseID = Course.courseID; "; //Not sure if course prereq table and phrase prereq table should both be used? 
    //$result = $db->query($query);

    if ($result = $db->query($query)) {

        //find size of result set
        $num_results = $result->num_rows;
        $num_fields = $result->field_count;

        echo "<table class='table table-responsive'>";
        echo "<tr>";

        //get and display field names
        $dbinfo = $result->fetch_fields();


        foreach ($dbinfo as $val) {
            echo "<th>".ucwords($val->name)."</th>";
        }

        echo "</tr>";

        while ($row = $result->fetch_row()) {
            echo "<tr>";
            for ($i=0; $i<$num_fields; $i++) {
                echo "<td>". stripslashes($row[$i])."</td>";
            }
            echo "<td><a href='delete_prereq.php?prereqID=$row[0]'>Delete</></td>";
            echo "<td><a href='update_prereq.php?prereqID=$row[0]'>Update</></td>";
            echo "</tr>";
            echo "<br />";
            
        }

        $result->close();
        echo "</table>";
    }