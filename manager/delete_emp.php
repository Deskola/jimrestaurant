<?php

require_once '../includes/db_connection.php';

if (isset($_POST['id'])) {
	# code...
	$emp_id = strip_tags($_POST['id']);
	echo $emp_id;

	$stmt = $conn->prepare("DELETE FROM employee WHERE id = ?");
	$stmt->bind_param('i',$emp_id);
	$res = $stmt->execute();

	if ($res) {
		# code...
		echo "Data delete successfully";
	}
}