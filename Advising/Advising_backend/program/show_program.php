<style>
<?php include '../colleges/show_college.css'; ?>
</style>

<body>
<?php
    include '../header/index.php';

    require_once "../config/advisng_db_config.php";

    $query="SELECT ProgramName, ProgramAbbr, Grad_undgrad FROM Program";

    //$query="SELECT pro.programID AS [Program ID], pro.programName AS [Program Name], pro.programAbbr AS [Program Abbreviation], dep.departmentName AS [Department Name], pro.grad_Undergrad AS [Grad/Undergrad]
    //        FROM Program pro
    //       INNER JOIN Department dep ON pro.departmentID = dep.departmentID";
    //$result = $db->query($query);

    if ($result = $db->query($query)) {

        //find size of result set
        $num_results = $result->num_rows;
        $num_fields = $result->field_count;

        echo "<table class='table table-responsive' align='center'>";
        echo "<tr>";

        //get and display field names
        $dbinfo = $result->fetch_fields();


        foreach ($dbinfo as $val) {
            echo "<th>".ucwords($val->name)."</th>";
        }
		echo "<th> </th>";

        echo "</tr>";

        while ($row = $result->fetch_row()) {
            echo "<tr>";
            for ($i=0; $i<$num_fields; $i++) {
                echo "<td>". stripslashes($row[$i])."</td>";
            }
			echo "<td><a href='delete_college.php?collegeID=$row[0]'>Delete</><a> | </a><a href='update_college.php?collegeID=$row[0]'>Update</></td>";
            echo "</tr>";
            echo "<br />";
            
        }
        $result->close();
        echo "</table>";
    }