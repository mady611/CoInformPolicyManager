<?php
session_start();
include 'db/conn.php';
if (!isset($_SESSION['user_name'])) {
    header("location: index.php");
}
$action_sql  = "SELECT co_ser_id, co_ser_name FROM coin_service_tb";
$action_data = mysqli_query($link, $action_sql);

$action_rows = array();
while ($row = mysqli_fetch_assoc($action_data)) {
    array_push($action_rows, $row);
}
include 'header.php';

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/jquery.add-input-area.min.js"></script>
<!-- <script src="js/form-serialize.js"></script> -->

<script type="text/javascript">
	 $(function() {
      $('#list').addInputArea();
    });
</script>

<div class="container h-100" style="max-width: 90%">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card" style="display: inline-table; width: 100%;">
            <div class="d-flex justify-content-center">
                <span class="form_title">Add Rule</span>
            </div>
            
            <form class="form-serialize">
	            <div id="list">
            		<div class="row co-rule-title">
					      <div class="col">Condition</div>
					      <div class="col">Rule Design</div>
					      <div class="col">Action Type</div>
					      <div class="col">Comment</div>
					      <div class="col-1">Priority</div>
					      <div class="col-1">Action</div>
					      <div class="col-1"></div>
					</div>
	                <div class="list_var row co-rule-items">
						<div  class="col">
						    <textarea id="rule_condition" name="list_condition_0" class="form-control input_pass" rows="2" cols="15" value="" placeholder="Rule Condition"></textarea>
						</div>
						<div  class="col">
						    <textarea id="rule_design" name="list_design_0" class="form-control input_pass" rows="2" cols="5" value="" placeholder="Rule Design"></textarea>
						</div>
						<div  class="col">
						    <input type="text"  id="rule_action_type" name="list_actiontype_0" class="form-control input_user" value="" placeholder="Rule Action Type">
						</div>
						<div class="col">
						    <textarea id="rule_comment" name="list_comment_0" class="form-control input_pass" rows="2" value="" placeholder="Rule Comment"></textarea>
						</div>
						<div class="col-1">
						    <select id="rule_priority" name="list_priority_0">
	                            <option value="">-Priority-</option>
	                            <option value="3">Low</option>
	                            <option value="2">Normal</option>
	                            <option value="1">High</option>
	                        </select>
						</div>
						<div class="col-1">
						    <select id="sel_action" name="list_action_0">
	                            <option value="" selected="selected">-Action-</option>
	                            <?php
									foreach ($action_rows as $act) {
									    $actionid    = $act['co_ser_id'];
									    $action_name = $act['co_ser_name'];
									    
									    echo "<option value=" . $actionid . ">" . $action_name . "</option>";
									}
								?>
	                        </select>
						</div>
						<div class="col-1">
		              		<button type="button" class="list_del login_btn btn">Delete</button>
						</div>
        			</div>
	        	</div>
	            
	            <div class="d-flex justify-content-center mt-3 login_container">
	                <button type="button" name="add_more_rule"  value="add_more_rule" class="btn login_btn co-rule-btn list_add">Add More Rule</button>
	            </div>
	            <div class="d-flex justify-content-center mt-3 login_container">
	            	<input type="submit" value="Submit Rules" name="submit" class="btn login_btn co-rule-btn" />	
	            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/bootstrap.js"></script>\
<script type="text/javascript">

    function finish_policy() {

        $.ajax({
            type: 'GET',
            url: 'db/action_db.php',
            data:{"action_name":name,"action_desc":desc},
            success:function(result){
                if(result==1){
                    alert("Successfully Added");
                }
                else{
                    alert("Error");
                }
            }
        })
    }

    function getUrlVars() {
	    var vars = {};
	    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
	        vars[key] = value;
	    });
	    return vars;
	}

    $(function() {
		$('.form-serialize').submit(function(ev) {
		    ev.preventDefault();
		    var arr = $(this).serializeArray();
		    console.log(arr);

		    var data_len = arr.length;

		    var e_id = getUrlVars()["e"];
		    var p_id = getUrlVars()["p"];

		    var jsonString = JSON.stringify(arr);

		    console.log(jsonString);
		    
		    $.ajax({
	            type: 'GET',
	            url: 'db/rule_db.php',
	            data:{e : e_id, p : p_id, len : data_len, form_data : jsonString},
	            success:function(result){
	                if(result==1){
	                    window.location.href = 'policies.php';
	                }
	                else{
	                	alert("Error");
	                }
	            }
	        })
		});
	});


</script>