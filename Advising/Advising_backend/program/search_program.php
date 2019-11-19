<body>
    <?php include 'index.php';?>
	<main role="main" class="container-fluid">
		<h2>Program Search</h2>


		<form action="search_results.php" method="POST">

            <select name = "searchtype">
                <option value="programID">programID</option>
                <option value="ProgramName">Name Of Program</option>
            </select>

			<div id="ProgramSearch" class="form-div">
				<div class="form-group">
					<label for="searchterm">Search Term:</label>
					<input type="text" class="form-control" id="searchterm" name="searchterm" />
                </div>
                
            
                <div id="submit" class="form-div">
                    <button type="submit" class="btn btn-primary"> Submit</button>
                </div>
		</form>
	</main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
