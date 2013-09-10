<?php
if(isset($_FILES['userfile']))
{
	if($_FILES['userfile']['type']=="image/jpeg")
	{
		if(move_uploaded_file($_FILES['userfile']['tmp_name'],'images/'.$_FILES['userfile']['name']))
		{
			$message="File uploaded";
		}
	}
}
//For deleting image
if(isset($_GET['del']))
	{

		$img=$_GET['del'];
		if(file_exists($img)):
		if(unlink($img))
		{
			$message="Image deleted";
		}
		endif;
	}
//End Deleting image

?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple PHP Gallery</title>
<style type="text/css">
*{
	font-family: Helvetica;
}
body{
	margin: 0;
	margin: 0;
	background: #cccccc;
}
	.gallery{
		margin: auto;
		width:700px;
		margin-top:60px;
		background: #fff;
		color: #000;
		padding: 5px;
		border-radius: 10px;
	}
	.gallery label{
		display: block;
	}
	fieldset{
		border: none;
	}
	input[type="submit"]{
		border: none;
		background: #6ad;
		border-radius: 10px;
		margin-top: 5px;
	}
		input[type="submit"]:hover{
		border: none;
		background: #6bc;
	}
	li{

		display:inline-block;
		width:100px;
		padding: 5px;
		border: solid #aaaaaa;
		height: 100px;
		position:relative;
		margin: 2px;
	}
	li a{
				margin-top: 101px;
	}
</style>
</head>
<body>
<div class="gallery">
	<h3>My Gallery</h3>
<?php if(isset($message)) echo $message; ?>
<ul>
<?php 
	$images=glob('images/*.jpg');
	foreach ($images as $key) {
		echo '<li>
		<a href="'.$key.'" ><img height="100px" width="100px" src="'.$key.'" /></a>
		<a href="index.php?del='.$key.'">Delete</a>
		</li>';
	}
?>
</ul>

<div class="upload">
<form method="post" enctype="multipart/form-data">
	<input type="file" name="userfile" />
	<input type="submit" name="upload" value="Upload" />
</form>
</div>

</div>
</body>
</html>
