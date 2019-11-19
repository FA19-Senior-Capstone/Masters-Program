<body>
    <?php include_once '../header/index.php'; ?>    
    <main role="main" class="container-fluid">
        <form action="add_prereq.php" method="post">
            <p>prereqID <input type="text" name="prereqID" maxlength="30" size="30" /></p>
            <p>courseID <input type="text" name="courseID" maxlength="30" size="30" /></p>
            <p>groupID<input type="text" name="groupID" maxlength="30" size="30" /></p>
            <p>pCourseID<input type="text" name="pCourseID" maxlength="30" size="30" /></p>
            
            <input type="submit" name="submit" value="Add Prerequisite" />
        </form>
    </main>
</body>

</html>
