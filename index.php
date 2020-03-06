<?php
 require 'includes/db_connection.php';

 if (isset($_POST['loginbtn'])) {
     # if login button is clicked the code in this block will be executed

    $uname = mysqli_real_escape_string($conn, $_POST['username']);
    $upass = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($uname) && !empty($upass)) {
        //logic
        $stmt = $conn->prepare("SELECT * from users where role_id=?");
        $stmt->bind_param('i',$uname);
        $res =$stmt->execute();
        $res = $stmt->get_result();
        
        if ($row = $res->fetch_assoc()) {
            //var_dump($row);
            // echo password_hash("54321", PASSWORD_DEFAULT);
           if (password_verify($upass, $row['upassword'])) {

              if ($row['role_id'] == 1) {
                  header("Location:manager/home.php");
              }else{
                header("Location:employees/dashboard.php");
              }
           }else{
            echo "<script>alert('Invalid Password')</script>";
           }
        }
        else{
            echo "<script>alert('Invalid User')</script>";
        }
    }else{
        echo "<script>alert('Username or Password fields are empty')</script>";
    }  
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Restaurant</title>
    <link rel="stylesheet" type="text/css" href="includes/index_style.css">
</head>
<body>
    <div class="conatiner">
        <header>
            <div class="logo">
                <img src="includes/images/chef.jpg">
            </div>
        </header>
        <div class="body_section">
            <div class="box login_form">
                <form action="" method="POST">
                <label>Role</label>                    
                    <select name="username">
                        <option>Select Role...</option>
                        <option value="1">Manager</option>
                        <option value="2">Cashier</option>
                    </select> <br><br><br>
                    <label>Password</label>   
                    <input required autofocus  type="password" name="password" placeholder="Password"><br><br><br>
                    <input type="submit" name="loginbtn" id="loginbtn" value="LOGIN">
                </form>
            </div>
            <div class="box body_logo">
                
            </div>
            
        </div>
        
    </div>
    
</body>
</html>