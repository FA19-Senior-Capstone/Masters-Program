<body>
    <?php  include '../header/index.php';?>
    <main role="main" class="container-fluid">


        <form action="add_department.php" method="post">
            <p>Department Name: <input type="text" name="departmentName" maxlength="13" size="13" /></p>
            <p>Department Abbreviation: <input type="text" name="depAbbrreviation" maxlength="30" size="30" /></p>
            <p>Select College: <input type="text" list="colleges" name="collegeID" maxlength="60" size="40" /></p>
			<datalist id="colleges">
				<option value="Aviation, Science and Technology">
				<option value="Business">
				<option value="Education and Social Sciences">
				<option value="Humanities, Fine Arts and Communications">
				<option value="Nursing and Health Sciences">
			</datalist>
            
            <input type="submit" name="submit" value="Add Department" />
        </form>
    </main>
</body>

</html>
