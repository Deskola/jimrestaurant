<?php
require_once '../includes/db_connection.php';

$fname = mysqli_real_escape_string($conn, $_POST['first_name']);
$lname = mysqli_real_escape_string($conn, $_POST['last_name']);
$phone = mysqli_real_escape_string($conn, $_POST['phone_num']);
$email = mysqli_real_escape_string($conn, $_POST['email_addr']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$duty = mysqli_real_escape_string($conn, $_POST['emp_duty']);
$salary = mysqli_real_escape_string($conn, $_POST['emp_salary']);

if (!empty($fname) && !empty($lname) && !empty($phone) && !empty($email) && !empty($duty) && !empty($salary)) {
	//echo "<script>".var_dump([$fname,$lname,$phone,$email, $password, $duty, $salary])."</script>";
	$hash_pass = password_hash($password, PASSWORD_DEFAULT);
	$stmt2 = $conn->prepare("INSERT INTO users(upassword,role_id) VALUES(?,?)");
	$stmt2->bind_param('si',$hash_pass,$duty);	
	$res2 = $stmt2->execute();
	echo "<script>".var_dump($res2)."</script>";

	$stmt = $conn->prepare("INSERT INTO employees(first_name,last_name,phone_number,email,role_id,salary) VALUES(?,?,?,?,?,?)");
	$stmt->bind_param('ssssis',$fname,$lname,$email,$phone,$duty,$salary);
	$stmt->execute();

	if ($res2 && $res) {
		echo "<script></script>";
	}
	


}else{
	echo "Please Fill in the empty space";
}


