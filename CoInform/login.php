<?php
session_start();
if(isset($_SESSION['user_name'])){
	header("location: index.php");
}
include 'header.php';

?>

	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="img/coinform_logo.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="post">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div> 
							<input type="text"  id = "username" name="username" class="form-control input_user" value="" placeholder="username">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" id = "pass" name="pass" class="form-control input_pass" value="" placeholder="password">
						</div>
						<span class="help-block"></span>
					</form>
				</div>
				<div class="d-flex justify-content-center mt-3 login_container">
					<button type="button" name="submit"  value="submit" onclick="abc()" class="btn login_btn">Login</button>
				</div>
			</div>
		</div>
	</div>
</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	function abc()
	{
		var user = document.getElementById('username').value;
		var pass = document.getElementById('pass').value;

		$.ajax({
			type: 'GET',
			url: 'db/abc.php',
			data:{"user":user,"pass":pass},
			success:function(result){
				if(result==1){
					alert("invalid");
				}
				else{
						window.location.href = 'index.php'
				}
			}
		})
	}
</script>
</html>