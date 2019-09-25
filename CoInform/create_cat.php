<?php
session_start();
include 'db/conn.php';
include 'header.php';
include 'forum_header.php';

if((isset($_SESSION['user_name'])) && ($_SESSION['user_type']==1))
{
	//the user has admin rights
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		//the form hasn't been posted yet, display it

		echo'
				<div class="container h-100">
					<div class="d-flex justify-content-center h-100">
						<div class="user_card">
							<div class="d-flex justify-content-center">
								<span class="form_title">Create Category</span>
							</div>
							<div class="d-flex justify-content-center form_container">
								<form method="post" action="">
									<div class="input-group mb-3">
										<div class="input-group-append">
											<span class="input-group-text">Name</span>
										</div> 
										<input type="text"  id = "cat_name" name="cat_name" class="form-control input_user" value="">
									</div>
									<div class="input-group mb-2">
										<div class="input-group-append">
											<span class="input-group-text">Description</span>
										</div>
										<textarea name="cat_description" rows=5 cols=20 class="form-control" /></textarea>
									</div>
									<span class="help-block"></span>

									<div class="d-flex justify-content-center mt-3 login_container">
										<input type="submit" value="Add category" class="btn login_btn" />
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			';
	}
	else
	{
		//the form has been posted, so save it
		$sql = "INSERT INTO categories(cat_name, cat_description)
		   VALUES('" . mysqli_real_escape_string($link,$_POST['cat_name']) . "',
				 '" . mysqli_real_escape_string($link,$_POST['cat_description']) . "')";
		$result = mysqli_query($link,$sql);
		if(!$result)
		{
			//something went wrong, display the error
			echo 'Error' . mysql_error();
		}
		else
		{
			echo 'New category succesfully added.';
		}
	}
}
	//the user is not an admin
else
{
	echo 'Sorry, you do not have sufficient rights to access this page.';
}

include 'footer.php';
?>
