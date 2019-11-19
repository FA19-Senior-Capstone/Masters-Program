
<body>
    <?php include '../header/index.php';?> 
    <main role="main" class="container-fluid">
    
        <form action="add_coursetype.php" method="post">
            <p>courseTypeID <input type="text" name="courseTypeID" maxlength="13" size="13" /></p>
            <p>Course Type Name <input type="text" name="courseTypeName" maxlength="30" size="30" /></p>
            <p>Course Type Abbreviation<input type="text" name="CoAbbreviation" maxlength="60" size="30" /></p>
            
            <input type="submit" name="submit" value="Add Course Type" />
        </form>
    </main>
</body>

</html>
