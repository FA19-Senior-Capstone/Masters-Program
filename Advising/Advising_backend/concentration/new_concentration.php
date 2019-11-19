<body>
    <main role="main" class="container-fluid">
    <?php include_once '../header/index.php'; ?>

        <form action="add_concentration.php" method="post">
            <p>concentrationID  <input type="text" name="concentrationID" maxlength="3" size="13" /></p>
            <p>concentrationName <input type="text" name="concentrationName" maxlength="30" size="30" /></p>
            <p>concentrationabbr <input type="text" name="concentrationabbr" maxlength="6" size="30" /></p>
            <p>programID <input type="text" name="programID" maxlength="6" size="30" /></p>
            
            <input type="submit" name="submit" value="Add Concentration" />
        </form>
    </main>
</body>


