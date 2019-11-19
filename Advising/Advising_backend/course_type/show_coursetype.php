<body>
<?php

    include '../header/index.php';
    require_once "../config/advisng_db_config.php";

    $query="SELECT * FROM CourseType";
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
            echo "<td><a href='delete_coursetype.php?courseTypeID=$row[0]'>Delete</></td>";
            echo "<td><a href='update.php?courseTypeID=$row[0]'>Update</></td>";
            echo "</tr>";
            echo "<br />";
            
        }
            
        $result->close();
        echo "</table>";
    }