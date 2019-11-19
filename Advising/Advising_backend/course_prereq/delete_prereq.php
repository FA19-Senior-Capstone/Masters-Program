<body>

    <?php include_once '../header/index.php'; ?>
    <main role="main" class="container-fluid">
	<h1>Remove Prerequisite </h1>
<?php

    require_once '../config/advisng_db_config.php';
    $prereqID=$_GET["prereqID"];


    $query = "Delete from Prerequisite where prereqID=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $prereqID);
    $stmt->execute();
    echo $stmt->affected_rows." Prerequisite deleted from database";

    $db->close();
?>

    <br/>
    ><a href="show_prereq.php">Show Prerequisites </a>
    
    
</main>
</body>

</html>
