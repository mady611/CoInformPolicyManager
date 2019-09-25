<?php
session_start();
include 'conn.php';

	$event_id = $_GET['e'];
	$policy_id = $_GET['p'];
	$form_ele = $_GET['len'];
	$form_data = $_GET['form_data'];

	$form_data = json_decode($form_data, true);

	$repe = $form_ele/6;

	// echo $repe;

	for ($i=0; $i < $repe; $i++) { 

		$co_rule_condition = $form_data[(1+($i*6)-1)]['value'];
		$co_rule_design = $form_data[(2+($i*6)-1)]['value'];
		$co_rule_action_type = $form_data[(3+($i*6)-1)]['value'];
		$co_rule_comment = $form_data[(4+($i*6)-1)]['value'];
		$co_rule_priority = $form_data[(5+($i*6)-1)]['value'];
		$co_action_id = $form_data[(6+($i*6)-1)]['value'];

		$sql = "INSERT INTO coin_rule_tb (
										co_action_id,
										co_rule_condition,
										co_event_id,
										co_rule_design,
										co_rule_action_type,
										co_rule_comment,
										co_rule_priority,
										co_policy_id
								) VALUES (
										'$co_action_id',
										'$co_rule_condition',
										'$event_id',
										'$co_rule_design',
										'$co_rule_action_type',
										'$co_rule_comment',
										'$co_rule_priority',
										'$policy_id'
										)";
		// echo($sql);

		$result = mysqli_query($link, $sql);
		$last_id = mysqli_insert_id($link);
		if ($result) {
		    echo "1";
		 		} else {
		     echo "Error: " . $sql . "<br>" . mysqli_error($link);
		     echo "0";
		}
	}
mysqli_close($link);
?>
