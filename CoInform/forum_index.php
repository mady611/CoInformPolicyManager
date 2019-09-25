<?php
session_start();
include 'db/conn.php';
include 'header.php';
include 'forum_header.php';

$sql = "SELECT
					topics.topic_id,
					topics.topic_subject,
					topics.topic_date,
					categories.cat_id,
					categories.cat_name
		FROM
			topics
		LEFT JOIN
			categories
		ON
			categories.cat_id = topics.topic_cat";
		

$result = mysqli_query($link,$sql);
// while ($r = mysqli_fetch_assoc($result)) {
// 	print_r($r);
// }

if(!$result)
{
	echo 'The categories could not be displayed, please try again later.';
}
else
{
	if(mysqli_num_rows($result) == 0)
	{
		echo 'No categories defined yet.';
	}
	else
	{
		//prepare the table
		echo '<table class="table">
			  <tr>
				<th>Topic</th>
				<th>Category</th>
				<th>Time</th>
			  </tr>';
			
		while($row = mysqli_fetch_assoc($result))
		{
			echo '<tr>';
				
				echo '<td>';
					echo '<h5><a class="co-link" href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a></h5>';
				echo '</td>';

				echo '<td>';
					echo '<h5><a  class="co-link" href="category.php?id=' . $row['cat_id'] . '">' . $row['cat_name'] . '</a></h5>';
				echo '</td>';

				echo '<td>';
					echo '<h6>' . $row['topic_date'] . '</h6>';
				echo '</td>';
		
			echo '</tr>';
		}

		echo '</table>';
	}
}

include 'footer.php';
?>
