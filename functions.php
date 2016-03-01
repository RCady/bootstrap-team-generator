<?php

// Create the form for inputting values
function create_form(){
if (isset($_GET['num_cols']) && isset($_GET['num_items']) && !isset($_POST['layout_created'])){

	$NUM_COLS = $_GET['num_cols'];
	$NUM_ITEMS = $_GET['num_items'];
	
	$NUM_ROWS = $NUM_ITEMS / $NUM_COLS;
	$NUM_EXTRA = $NUM_ITEMS % $NUM_COLS;
	$NUM_ROWS = floor($NUM_ROWS);

	if ($NUM_EXTRA > 0)
		$NUM_ROWS += 1;

	$hasOffset = false;
	
	if ($NUM_COLS != 5)
		$COL_SIZE = 12 / $NUM_COLS;
	else {
		$COL_SIZE = 2;
		$hasOffset = true;
		$offset = 'col-md-offset-1';
	}

	echo '<form method="POST">';

	for ($i = 0; $i < $NUM_ROWS; $i++){
		echo '<div class="row form-group">';
		if ($NUM_ITEMS > $NUM_EXTRA){
			for ($x = 0; $x < $NUM_COLS; $x++){
				if($hasOffset && $x == 0)
					echo '<div class="col-md-' . $COL_SIZE . ' ' . $offset . '">';
				else 
					echo '<div class="col-md-' . $COL_SIZE . '">';

				echo '<img class="img-thumbnail" src="avatar.jpg">';
				echo '<input class="form-control" type="text" name="img_url_row' . $i . '_col' . $x . '"' . 'placeholder="Image URL">';
				echo '<input class="form-control" type="text" name="member_name_row' . $i . '_col' . $x . '"' . 'placeholder="Name">';
				echo '<input style="font-style:italic;" class="form-control" type="text" name="member_title_row' . $i . '_col' . $x . '"' . 'placeholder="Title">';
				echo '</div>';
				$NUM_ITEMS--;
			}
		}
		elseif ($NUM_ITEMS == $NUM_EXTRA) {
			for ($x = 0; $x < $NUM_EXTRA; $x++){
				if($hasOffset && $x == 0)
					echo '<div class="col-md-' . $COL_SIZE . ' ' . $offset . '">';
				else 
					echo '<div class="col-md-' . $COL_SIZE . '">';

				echo '<img class="img-thumbnail" src="avatar.jpg">';
				echo '<input class="form-control" type="text" name="img_url_row' . $i . '_col' . $x . '"' . 'placeholder="Image URL">';
				echo '<input class="form-control" type="text" name="member_name_row' . $i . '_col' . $x . '"' . 'placeholder="Name">';
				echo '<input style="font-style:italic;" class="form-control" type="text" name="member_title_row' . $i . '_col' . $x . '"' . 'placeholder="Title">';
				echo '</div>';
			}
		}
		echo '</div>';
	}
	echo '<input type="hidden" name="layout_created">';
	echo '<button class="btn btn-primary" type="submit">Submit</button>';
	echo '</form>';

}

if (isset($_POST['layout_created'])){
		create_markup();
	}
}

function create_markup(){

	$NUM_COLS = $_GET['num_cols'];
	$NUM_ITEMS = $_GET['num_items'];

	$NUM_ROWS = $NUM_ITEMS / $NUM_COLS;
	$NUM_EXTRA = $NUM_ITEMS % $NUM_COLS;
	$NUM_ROWS = floor($NUM_ROWS);

	if ($NUM_EXTRA > 0)
		$NUM_ROWS += 1;

	$hasOffset = false;
	
	if ($NUM_COLS != 5)
		$COL_SIZE = 12 / $NUM_COLS;
	else {
		$COL_SIZE = 2;
		$hasOffset = true;
		$offset = 'col-md-offset-1';
	}
	
	echo '<figure class="highlight"><pre contenteditable="true"><code>';

	for ($i = 0; $i < $NUM_ROWS; $i++){
		echo '&lt;div class="row"&gt;<br>';
		if ($NUM_ITEMS > $NUM_EXTRA){
			for ($x = 0; $x < $NUM_COLS; $x++){
				if($hasOffset && $x == 0)
					echo '&#09;&lt;div class="col-md-' . $COL_SIZE . ' ' . $offset . '"&gt;<br>';
				else 
					echo '&#09;&lt;div class="col-md-' . $COL_SIZE . '"&gt;<br>';
				
				echo '&#09;&#09;&lt;img class="img-thumbnail" src="' . $_POST['img_url_row' . $i . '_col' . $x] . '"&gt;<br>';
				echo '&#09;&#09;&lt;h3&gt;' . $_POST['member_name_row' . $i . '_col' . $x] . '&lt;/h3&gt;<br>';
				echo '&#09;&#09;&lt;span&gt;' . $_POST['member_title_row' . $i . '_col' . $x] . '&lt;/span&gt;<br>';
				echo '&#09;&lt;/div&gt;<br>';
				$NUM_ITEMS--;
			}
		}
		elseif ($NUM_ITEMS == $NUM_EXTRA) {
			for ($x = 0; $x < $NUM_EXTRA; $x++){
				if($hasOffset && $x == 0)
					echo '&#09;&lt;div class="col-md-' . $COL_SIZE . ' ' . $offset . '"&gt;<br>';
				else 
					echo '&#09;&lt;div class="col-md-' . $COL_SIZE . '"&gt;<br>';

				echo '&#09;&#09;&lt;img class="img-thumbnail" src="' . $_POST['img_url_row' . $i . '_col' . $x] . '"&gt;<br>';
				echo '&#09;&#09;&lt;h3&gt;' . $_POST['member_name_row' . $i . '_col' . $x] . '&lt;/h3&gt;<br>';
				echo '&#09;&#09;&lt;span&gt;' . $_POST['member_title_row' . $i . '_col' . $x] . '&lt;/span&gt;<br>';
				echo '&#09;&lt;/div&gt;<br>';
			}
		}
		echo '&lt;/div&gt;<br>';
	}

	echo '</code></pre></figure>';
}