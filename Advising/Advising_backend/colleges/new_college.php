
<body>
    <?php include '../header/index.php';?> 
    <main role="main" class="container-fluid">
    
        <form action="add_college.php" method="post">
            <p>College Name: <input type="text" name="collegeName" maxlength="30" size="30" /></p>
            <p>College Abbreviation: <input type="text" name="CoAbbreviation" maxlength="60" size="30" /></p>
            
            <input type="submit" name="submit" value="Add College" />
        </form>
    </main>
</body>

</html>
