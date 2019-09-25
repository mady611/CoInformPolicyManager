<?php
session_start();
include 'db/conn.php';
include 'header.php';
include 'forum_header.php';

if(!isset($_SESSION['user_name']))
{
	//the user is not signed in
	echo 'Sorry, you have to be <a href="login.php">logged in</a> to create a topic.';
}
else
{
	//the user is signed in
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{	
		//the form hasn't been posted yet, display it
		//retrieve the categories from the database for use in the dropdown
		$sql = "SELECT
					cat_id,
					cat_name,
					cat_description
				FROM
					categories";
		
		$result = mysqli_query($link,$sql);
		
		if(!$result)
		{
			//the query failed, uh-oh :-(
			echo 'Error while selecting from database. Please try again later.';
		}
		else
		{
			if(mysqli_num_rows($result) == 0)
			{
				//there are no categories, so a topic can't be posted
				if($_SESSION['user_type'] == 1)
				{
					echo 'You have not created categories yet.';
				}
				else
				{
					echo 'Before you can post a topic, you must wait for an admin to create some categories.';
				}
			}
			else
			{
				echo '
					<div class="container h-100">
						<div class="d-flex justify-content-center h-100">
							<div class="user_card">
								<div class="d-flex justify-content-center">
									<span class="form_title">Create Topic</span>
								</div>
								<div class="d-flex justify-content-center form_container">
									<form method="post" action="">
										<div class="input-group mb-3">
											<div class="input-group-append">
												<span class="input-group-text">Subject</span>
											</div>
											<input type="text"  id = "topic_subject" name="topic_subject" class="form-control input_user" value="">
										</div>
										<div class="input-group mb-2">
											<div class="input-group-append">
												<span class="input-group-text">Category</span>
											</div>';
											echo '<select name="topic_cat" class="form-control">';
												while($row = mysqli_fetch_assoc($result))
												{
													echo '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>';
												}
											echo '</select><br />';
											echo'</div>
										<div class="input-group mb-2">
											<div class="input-group-append">
												<span class="input-group-text">Message</span>
											</div>
											<textarea class="form-control" name="post_content" rows=5 cols=26></textarea>
										</div>
										<span class="help-block"></span>
										<div class="d-flex justify-content-center mt-3 login_container">
											<input class="btn login_btn" type="submit" value="Create topic" />
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					';
			}
		}
	}
	else
	{
		//start the transaction
		$query  = "BEGIN WORK;";
		$result = mysqli_query($link,$query);
		
		if(!$result)
		{
			//Damn! the query failed, quit
			echo 'An error occured while creating your topic. Please try again later.';
		}
		else
		{
	
			//the form has been posted, so save it
			//insert the topic into the topics table first, then we'll save the post into the posts table
			$sql = "INSERT INTO 
						topics(topic_subject,
							   topic_date,
							   topic_cat,
							   topic_by)
				   VALUES('" . mysqli_real_escape_string($link,$_POST['topic_subject']) . "',
							   NOW(),
							   " . mysqli_real_escape_string($link,$_POST['topic_cat']) . ",
							   " . $_SESSION['user_id'] . "
							   )";
					 
			$result = mysqli_query($link,$sql);
			if(!$result)
			{
				//something went wrong, display the error
				echo 'An error occured while inserting your data. Please try again later.<br /><br />' . mysqli_error($link);
				$sql = "ROLLBACK;";
				$result = mysqli_query($link,$sql);
			}
			else
			{
				//the first query worked, now start the second, posts query
				//retrieve the id of the freshly created topic for usage in the posts query
				$topicid = mysqli_insert_id($link);
				
				$sql = "INSERT INTO
							posts(post_content,
								  post_date,
								  post_topic,
								  post_by,
								  type)
						VALUES
							('" . mysqli_real_escape_string($link,$_POST['post_content']) . "',
								  NOW(),
								  " . $topicid . ",
								  " . $_SESSION['user_id'] . ",
								  0
							)";
				$result = mysqli_query($link,$sql);
				
				if(!$result)
				{
					//something went wrong, display the error
					echo 'An error occured while inserting your post. Please try again later.<br /><br />' . mysqli_error($link);
					$sql = "ROLLBACK;";
					$result = mysqli_query($link,$sql);
				}
				else
				{
					$sql = "COMMIT;";
					$result = mysqli_query($link,$sql);
					
					//after a lot of work, the query succeeded!
					echo 'You have succesfully created <a href="topic.php?id='. $topicid . '">your new topic</a>.';
				}
			}
		}
	}
}

include 'footer.php';
?>
