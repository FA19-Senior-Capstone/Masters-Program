<body>
    <?php  include '../header/index.php';?>
    <main role="main" class="container-fluid">
        

        <form action="add_course.php" method="post">
            <p>Prefix ID <input type="text" name="prefixID" maxlength="30" size="30" /></p>
            <p>Course Number <input type="text" name="courseNum" maxlength="30" size="30" /></p>
            <p>Title<input type="text" name="title" maxlength="60" size="30" /></p>
            <p>Course Description<input type="text" name="courseDescription" maxlength="60" size="30" /></p>
            <p>Credits<input type="text" name="credits" maxlength="60" size="30" /></p>
            
            
            <input type="submit" name="submit" value="Add Course" />
        </form>
    </main>
</body>

</html>
