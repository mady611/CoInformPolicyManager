<?php
session_start();
if(!isset($_SESSION['user_name'])){
	header("location: index.php");
}
include 'header.php';

?>

<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<span class="form_title">Add Service</span>
					<!-- <div class="brand_logo_container">
						<img src="img/coinform_logo.png" class="brand_logo" alt="Logo">
					</div> -->
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="post">
						<div class="input-group mb-3">

							<!-- <div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>  -->
							<input type="text"  id = "service_name" name="service_name" class="form-control input_user" value="" placeholder="Name">
						</div>
						<div class="input-group mb-2">
							<!-- <div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div> -->
							<textarea id="service_desc" name="service_desc" class="form-control input_pass" rows="4" value="" placeholder="Description"></textarea>
						</div>
						<span class="help-block"></span>
					</form>
				</div>
				<div class="d-flex justify-content-center mt-3 login_container">
					<button type="button" name="submit"  value="submit" onclick="add_event()" class="btn login_btn">Add</button>
				</div>
			</div>
		</div>
	</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
	function add_event() {
		var name = document.getElementById('service_name').value;
		var desc = document.getElementById('service_desc').value;

		$.ajax({
			type: 'GET',
			url: 'db/service_db.php',
			data:{"service_name":name,"service_desc":desc},
			success:function(result){
				if(result==1){
					alert("Successfully Added");
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