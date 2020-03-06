<?php
require_once '../includes/db_connection.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">    
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="../includes/jquery.min.js"></script>	
</head>
<body>
	<div class="container">
		<div class="heading">
			<div class="logo"><img src="../includes/images/chef.jpg"></div>
			<h3><a href="../includes/logout.php">Signout</a></h3>
		</div>
		<div class="bodysection">
            <div class="box first">
                <li><a href="home.php">Dashboard</a> </li>                
                <li><a href="new_emp.php">Enter new Employees</a> </li>
                <li><a href="view_all_emp.php">View all employees</a> </li>            
            </div>
            <div class="box second">
                <div class="list_of_emp">
                    <?php
                        $stmt = $conn->prepare("SELECT * FROM employee");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        echo "<table id=='list_emp'>";
                        echo "<tr><th>First name</th><th>Last name</th><th>Phone number</th><th>Duty</th><th>Salary</th></tr>";
                        while($row = $result->fetch_assoc())
                        {
                            $emp_id = $row["id"];
                            echo "<tr>";
                            echo "<td>".$row['first_name']."</td>";
                            echo "<td>".$row['last_name']."</td>";
                            echo "<td>".$row['phone_number']."</td>";
                            echo "<td>".$row['work']."</td>";
                            echo "<td>".$row['salary']."</td>";
                            echo "<td><button type='submit' name='delete_emp' id='delete_emp' class='delete_btn'>Delete</button></td>";
                            echo "</tr>";                            
                        }
                        echo "</table>";
                    ?>                   
                </div>           
                
            </div>            
        </div>
        <div class="foot">
            <i>Developed by @Susan Felix</i>
            <ul>
                 <a href="https://www.facebook.com" target="new window"><img src="../includes/images/fbr.jpg" alt="Facebook"></a>
                <a href="https://www.instagram.com" target="new window"><img src="../includes/images/ig.jpg" alt="Instagram"></a>
                <a href="https://www.twitter.com" target="new window"><img src="../includes/images/tw.jpg" alt="Twitter"></a>
            </ul>
        </div>

	</div>

</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        // body...        
         $(document).on('click', '.delete_btn', function(){
            //var button_id = $(this).attr("id");
            $.ajax({
                url:"delete_emp.php",
                method:"POST",
                data: {id: <?php echo $emp_id;?>},
                success: function(data){
                    alert(data);
                    
                }

            });

        });
    });
    
</script>
