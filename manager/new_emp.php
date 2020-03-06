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
                <div class="new_emp_form">
                    <form  name="enter_new_emp" id="enter_new_emp">                        
                        <input required autofocus type="text" name="first_name" placeholder="First name">
                        <input required autofocus type="text" name="last_name" placeholder="Last name"><br><br>                  
                        <input required autofocus type="text" name="phone_num" placeholder="Phone number"><br><br>               
                        <input required autofocus type="email" name="email_addr" placeholder="Email"><br><br>
                        <input required autofocus type="password" name="password" placeholder="Password"><br><br>
                        <label for="work">Employee Duty</label><br>
                        <select name="emp_duty">
                            <option>Select one</option>
                            <option value="2">Cashier</option>
                            <option value="3">Chef</option>
                            <option value="4">Waiter</option>
                        </select><br><br>                        
                        <input required autofocus type="text" name="emp_salary" placeholder="Salary"><br><br>
                        <button type="submit" name="emp_info_btn" id="emp_info_btn">Save</button>
                    </form>                    
                </div>       	
                
            </div>            
        </div>
        <div class="foot">
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
    $(document).ready(function () {
        // body...
        $('#emp_info_btn').click(function(){
            $.ajax({
                url:"pros_new_emp.php",
                method:"POST",
                data:$('#enter_new_emp').serialize(),
                success: function(data){
                        alert(data);
                        $('#my_form')[0].reset();
                    } 

            });
             
        });
    });
</script>
