<?php
session_start();
include 'db/conn.php';
include 'header.php';
include 'forum_header.php';

//first select the category based on $_GET['cat_id']
$sql = "SELECT
			cat_id,
			cat_name,
			cat_description
		FROM
			categories
		WHERE
			cat_id = " . mysqli_real_escape_string($link,$_GET['id']);

$result = mysqli_query($link,$sql);

if(!$result)
{
	echo 'The category could not be displayed, please try again later.' . mysqli_error();
}
else
{
	if(mysqli_num_rows($result) == 0)
	{
		echo 'This category does not exist.';
	}
	else
	{
		//display category data
		while($row = mysqli_fetch_assoc($result))
		{
			echo '<h2>Topics in &prime;' . $row['cat_name'] . '&prime; category</h2><br />';
		}
	
		//do a query for the topics
		$sql = "SELECT	
					topic_id,
					topic_subject,
					topic_date,
					topic_cat
				FROM
					topics
				WHERE
					topic_cat = " . mysqli_real_escape_string($link,$_GET['id']);
		
		$result = mysqli_query($link,$sql);
		
		if(!$result)
		{
			echo 'The topics could not be displayed, please try again later.';
		}
		else
		{
			if(mysqli_num_rows($result) == 0)
			{
				echo 'There are no topics in this category yet.';
			}
			else
			{
				//prepare the table
				echo '<table class="table">
					  <tr>
						<th>Topic</th>
						<th>Created at</th>
					  </tr>';	
					
				while($row = mysqli_fetch_assoc($result))
				{				

					echo '<tr>';
				
						echo '<td>';
							echo '<h5><a class="co-link" href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a></h5>';
						echo '</td>';

						echo '<td>';
							echo '<h6>' . $row['topic_date'] . '</h6>';
						echo '</td>';
			
					echo '</tr>';

				}
			}
		}
	}
}

include 'footer.php';
?>
