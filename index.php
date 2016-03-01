<?php
include 'functions.php';
?>

<html>

<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-2.2.0.min.js"></script>


<script type="text/javascript">
	function validate(){
		var num_cols = document.forms["Form"]["num_cols"].value;
		var num_items = document.forms["Form"]["num_items"].value;

		if (num_cols == 0){
			document.getElementById("num_cols").className += " has-error";
			return false;
		}
		if (num_cols != 0){
			$("#num_cols").removeClass("has-error");
		}
		
		if (num_items == 0){
			document.getElementById("num_items").className += " has-error";
			return false;
		}
		if (num_items != ""){
			$("#num_items").removeClass("has-error");
		}

		return true;
		
	}

</script>




</head>

<body>
	<div class="container" style="margin-top:10px;">
		<div class="col-md-8 col-md-offset-2" style="background:#eee;">

		<div>
			<h1>Bootstrap Team Page Generator</h1>
		</div>

		<div>
			<p>
			This tool will create the markup for a nice looking team member page. All you need to do is enter in the info and it will spit out the markup to paste on the page
			</p>
		</div>

		<?php if(!isset($_GET['num_cols']) && !isset($_GET['num_rows'])) : ?>
			<h3>Output Format</h3>
			<div class="row">
				<div class="col-md-3" style="margin-bottom:20px;">
					<img class="img-thumbnail" src="avatar.jpg">
					<h3 style="margin:0;margin-top:3px;">John Doe</h3>
					<span style="font-style:italic;">President & CEO</span>
				</div>
			</div>

			<div class="form-group">
				<form action="index.php" onsubmit="return validate();" method="GET" name="Form">

					<div id="num_cols" class="form-group">
						<label class="control-label">How many Columns? (Up to 6)</label>
						<input class="form-control" style="width:250px;padding-left:5px;" type="number" name="num_cols" placeholder="0">
						
					</div>
					
					<div id="num_items" class="form-group">
						<label class="control-label">How many team members?</label>
						<input class="form-control" style="width:250px;padding-left:5px;" type="number" name="num_items" placeholder="0">
					</div>

					<button class="btn btn-primary" type="submit">Submit</button>
				</form>
			</div>
		<?php endif; ?>
			<?php create_form();?>
		</div>
	</div>
</body>