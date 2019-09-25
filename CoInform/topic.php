<?php
session_start();
include 'db/conn.php';
include 'header.php';
include 'forum_header.php';

$sql = "SELECT
			topics.topic_id,
			topics.topic_subject,
			categories.cat_name
		FROM
			topics
		LEFT JOIN
			categories
		ON
			categories.cat_id = topics.topic_cat
		WHERE
			topics.topic_id = " . mysqli_real_escape_string($link,$_GET['id']);
			
$result = mysqli_query($link,$sql);

if(!$result)
{
	echo 'The topic could not be displayed, please try again later.';
}
else
{
	if(mysqli_num_rows($result) == 0)
	{
		echo 'This topic doesn&prime;t exist.';
	}
	else
	{
		while($row = mysqli_fetch_assoc($result))
		{
			echo '<div class="co-forum-post">';
			echo '<div class="co-forum-topic">' 
					. $row['topic_subject'] . 
				 	'<div class="cat-name">'
				 		. $row['cat_name'] . 
				 	'</div>
				 </div>'
					;
			//display post data
			// echo '<table class="topic" border="1">
			// 		<tr>
			// 			<th colspan="2">' . $row['topic_subject'] . '</th>
			// 		</tr>';
		
			//fetch the posts from the database
			$posts_sql = "SELECT
						posts.post_topic,
						posts.post_content,
						posts.post_date,
						posts.post_by,
						posts.type,
						coin_user_tb.co_user_id,
						coin_user_tb.co_user_display_name
					FROM
						posts
					LEFT JOIN
						coin_user_tb
					ON
						posts.post_by = coin_user_tb.co_user_id
					WHERE
						posts.post_topic = " . mysqli_real_escape_string($link,$_GET['id']) . "
					ORDER BY
						posts.post_date";

						
			$posts_result = mysqli_query($link,$posts_sql);
			echo mysqli_error($link);
			
			if(!$posts_result)
			{
				echo '<tr><td>The posts could not be displayed, please try again later.</tr></td></table>';
			}
			else
			{
			
				while($posts_row = mysqli_fetch_assoc($posts_result))
				{

					echo '
							<div class="co-forum-post-text">
								<div class="text">
									' . htmlentities(stripslashes($posts_row['post_content'])) . '
								</div>
								<div class="user">
									<img src="img/user.png" />
										' . $posts_row['co_user_display_name'] . '
									<br/>
									<span>
										' . date('d-m-Y H:i', strtotime($posts_row['post_date'])) . '
									</span>
								</div>

					';
					if ($posts_row['type'] == 0) {
						echo '
							<div class="reply">
								Reply
							</div>
						';
					}
					echo 	'</div>';

				}
			}
			
			if(!isset($_SESSION['user_name']))
			{
				echo '<tr>
						<td colspan=2>
							You must be <a href="login.php">logged in</a> to reply.
						</td>
					  </tr>';
			}
			else
			{
				//show reply box
				echo '<tr><td colspan="2"><h2>Reply:</h2><br />
					<form method="post" action="reply.php?id=' . $row['topic_id'] . '">
						<textarea name="reply-content"></textarea><br /><br />
						<input type="submit" value="Submit reply" />
					</form></td></tr>';
			}
			
			//finish the table
			echo '</table>';
		}
	}
}

include 'footer.php';
?>