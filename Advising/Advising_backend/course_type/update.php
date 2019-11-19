<body>
    <?php include 'index.php';?>
    <main role="main" class="container-fluid">  

        <form action="update_courseType.php" method="post">
            <p>Course Type Name <input type="text" name="courseTypeName" maxlength="30" size="30" /></p>
            <p>Course Type Abbreviation<input type="text" name="CoAbbreviation" maxlength="60" size="30" /></p>
            <input type="submit" name="submit" value="update Course Type" />
        </form>
    </main>
</body>

</html>