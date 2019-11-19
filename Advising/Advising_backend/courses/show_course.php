<style>
<?php include 'show_course.css'; ?>
</style>
<script>
<?php include 'show_course.js'; ?>
</script>

<body>
<?php
    //displays the header at the top of the page
    include '../header/index.php';

    //connects to the database 
    require_once "../config/advisng_db_config.php";

    //create a 2 loops 
    // one to go through courses 
    // tyhen another one to get the prereqs for that course 


    //query to join the tables with the prereqs and the courses. 
    $query="SELECT DISTINCT c.Title as title, c1.Title as prereq FROM Course c LEFT JOIN CourseAndPrerequisite cp on cp.courseID = c.courseID LEFT JOIN Course c1 on cp.pCourseID = c1.courseID;";
	
	$descriptionquery = "SELECT courseDescription FROM Course;";

    if ($result = $db->query($query)) {
		
		$resultString = "";
		$result2 = $db->query($descriptionquery);
        
        //find size of result set
        $num_results = $result->num_rows;
        $num_fields = $result->field_count;
		
		/*while ($row = $result2->fetch_row()) {
			for ($i=0; $i<1; $i++) {
				echo $row[$i];
				echo "<br>";
			}
		}*/

        echo "<table class='table table-responsive' align='center'>";
        echo "<tr>";

        //get and display field names
        $dbinfo = $result->fetch_fields();
		//$descInfo = $result->
		
		/*foreach ($descInfo as $descVal) {
            echo $descVal->name;
        }*/
		
		/*$courseAndDes = array(
			'Computer Organization' => 'This course...',
			'us' => 'United States'
		);*/
		
		/*foreach( $descInfo as $index => $courseDes ) {
			echo '<option value="' . $code . '">' . $dbinfo[$index] . '</option>';
		}*/


        foreach ($dbinfo as $val) {
            echo "<th>".ucwords($val->name)."</th>";
        }
		echo "<th> </th>";

        echo "</tr>";

        while ($row = $result->fetch_row()) {
            echo "<tr>";
			//echo "<div class='popup' onclick='popupFunction()'>";
            for ($i=0; $i<$num_fields; $i++) {
				echo "<td><a class='popup' onclick='popupFunction()'>". stripslashes($row[$i]);
				while ($row2 = $result2->fetch_row()) {
					for ($i=0; $i<1; $i++) {
						echo "<span class='popuptext' id='myPopup'>".$row2[$i]. "</span>";
						//echo "</a></td>";
						//echo "<br>";
					}
				}
				//echo stripcslashes($row[$i]);
				//echo "<span class='popuptext' id='myPopup'> Popup text... </span>"; 
				//echo "<span class='popuptext' id='myPopup'>". $descVal->name. "</span>";
				//echo "<span class='popuptext' id='myPopup'>". strval($row[$i]). "</span>";
				echo "</a></td>";
				//echo "<td>". stripslashes($row[$i]). "</td>";
            }
			//echo "<span class='popuptext' id='myPopup'> Popup text... </span>"; 
			//echo "</a></td>";
			echo "<td><a href='delete_college.php?collegeID=$row[0]'>Delete</><a> | </a><a href='update_college.php?collegeID=$row[0]'>Update</></td>";
            echo "</tr>";
            //echo "<br />";
            
        }

        $result->close();
        echo "</table>";
    }