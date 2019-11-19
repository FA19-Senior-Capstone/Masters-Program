<body>
    <?php include '../header/index.php';?>
    <main role="main" class="container-fluid">


        <form action="add_program.php" method="post">
            <p>Program Name: <input type="text" name="programName" maxlength="13" size="13" /></p>
            <p>Program Abbreviation: <input type="text" name="programAbbr" maxlength="30" size="30" /></p>
            <p>Choose Department: <input type="text" list="departments" name="departmentID" maxlength="60" size="30" /></p>
			<datalist id="departments">
				<option value="Aviation and Transportation Studies">
				<option value="Chemistry">
				<option value="Biology">
				<option value="Computer and Mathematical Sciences">
				<option value="Physics">
			</datalist>
            <p>Select Grad/Undergrad: <input type="text" list="gradUndergrad" name="grad_undergrad" maxlength="13" size="13" /></p>
			<datalist id="gradUndergrad">
				<option value="Graduate">
				<option value="Undergraduate">
			</datalist>
            
            
            <input type="submit" name="submit" value=" Add Program" />
        </form>
    </main>
</body>

</html>
