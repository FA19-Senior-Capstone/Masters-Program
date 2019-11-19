<body>
<?php 
//this calls the header for page
include_once "../styling/index.php"; 
?>

<h1>Concentration: Non-Declaired</h1> 

<?php
/*
* Created by Sean Doody
* Created on 11/07/2019
* Lists all core courses and electives for specific concentrations. 
* Created for Lewis Universitiy and their masters program
*/

    //Header
    include_once "../styling/index.php";

    //connects to the database 
    require_once "../../Advising_backend/config/advisng_db_config.php";

    /* 
    *****KEYs FOR THE CONCENTRATIONIDs**********
    THIS CAN BE CHANGED ANY TIME. FOR UP TO DATE DATA LOOK AT DATABASE
    * Artifical Intelligence - 1
    * Cyber Security - 2
    * Digital Forensics - 3
    * Enterprise and Clouse computing - 4
    * Game and Simulation Programming - 5
    * Software Engineering - 6
    * non-delared - 7
    */

    //this query will display all core, foundation, and elective courses that can be taken for a non-declaed student. 
    $query="SELECT c.title as title, ct.courseType as courseType
            FROM concentrationAndCourse cc
            INNER JOIN Course c on cc.courseID = c.courseID
            INNER JOIN Concentration c1 on c1.concentrationID = cc.concentrationID 
            INNER JOIN CourseType ct on cc.courseTypeID = ct.courseTypeID
            WHERE c1.concentrationID = '7' ";

    if ($result = $db->query($query)) 
        
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
            echo "</tr>";
            
        }
        $result->close();
        echo "</table>";