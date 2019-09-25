<?php
session_start();
include 'db/conn.php';
if(!isset($_SESSION['user_name'])){
	header("location: index.php");
}
include 'header.php';
?>

<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card" style="height: 500px;">
				<div class="d-flex justify-content-center">
					<span class="form_title">Add Policies</span>
					<!-- <div class="brand_logo_container">
						<img src="img/coinform_logo.png" class="brand_logo" alt="Logo">
					</div> -->
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="post">
						<div class="input-group mb-3">
							<input type="text"  id = "policy_name" name="policy_name" class="form-control input_user" value="" placeholder="Policy Name">
						</div>
						<div class="input-group mb-2">
							<textarea id="policy_desc" name="policy_desc" class="form-control input_pass" rows="4" value="" placeholder="Policy Description"></textarea>
						</div>
						<div class="input-group mb-2">

							<select id="sel_event">

								<option value="" selected="selected">- Select Event for Policy -</option>
								   <?php 
								   // Fetch Event
								   $event_sql = "SELECT * FROM coin_service_tb";
								   $event_data = mysqli_query($link,$event_sql);

								   while($row = mysqli_fetch_assoc($event_data) ){
								      $eventid = $row['co_ser_id'];
								      $event_name = $row['co_ser_name'];
								   	  print_r($row);
								      
								      // Option
								      echo "<option value=".$eventid.">".$event_name."</option>";
								   }
								   ?>
							</select>

						</div>
						<span class="help-block"></span>
					</form>
				</div>
				<div class="d-flex justify-content-center mt-3 login_container">
					<button type="button" name="submit"  value="submit" onclick="add_policy()" class="btn login_btn">Next Step</button>
				</div>
			</div>
		</div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
	function add_policy() {
		var name = document.getElementById('policy_name').value;
		var desc = document.getElementById('policy_desc').value;
		var event = document.getElementById('sel_event').value;

		$.ajax({
			type: 'GET',
			url: 'db/policy_db.php',
			data:{"policy_name":name,"policy_desc":desc,"policy_event":event},
			success:function(result){
				if(result!=0){
					window.location.href = 'add_rule.php?e='+event+'&&p='+result;
				}
				else{
					alert("ERROR");
				}
			}
		})
	}
</script>
</body>
</html>