<body>
    <?php  include '../header/index.php';?> 
    <main role="main" class="container-fluid">


        <form action="add_prefix.php" method="post">
            <p>prefixID <input type="text" name="prefixID" maxlength="13" size="13" /></p>
            <p>prefix <input type="text" name="prefix" maxlength="30" size="30" /></p>
            <p>departmentID<input type="text" name="departmentID" maxlength="60" size="30" /></p>
            
            <input type="submit" name="submit" value="Add Prefix" />
        </form>
    </main>
</body>

</html>
