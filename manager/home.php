\<?php
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
                <div class="backgroung_img" style="background-image: url('../includes/images/ugali.jpg')"></div> 
                <div class="search_form">                 
                <form action="" method="POST">
                    <fieldset>
                        <legend>Search By Date:</legend>
                        <input type="date" name="search_date" placeholder="Enter Date">
                        &nbsp;
                        <button type="submit" name="search_btn">Search</button>
                    </fieldset>
                    </div>                    
                </form>
                <div class="search_result">
                    <fieldset>
                        <legend>Search Result</legend>
                        <?php
                    if (isset($_POST['search_btn'])) {
                            # code...
                            $ser_date = mysqli_real_escape_string($conn,$_POST["search_date"]);
                            echo $ser_date;

                            $stmt = $conn->prepare("SELECT name, COUNT(*) AS f_name, in_timestamp FROM main_course_dish WHERE DATE(in_timestamp) = ? GROUP BY name");
                            $stmt->bind_param('s',$ser_date);
                            $res = $stmt->execute();
                            
                            $res = $stmt->get_result();

                             echo "<table>
                                  <tr>
                                    <th>Food Name</th>
                                    <th>Quatity Sold</th>        
                                  </tr>
                                ";

                            while($row = $res->fetch_assoc()){
                                echo "<tr>";
                                echo "<td>".$row['name']."</td><td>".$row['f_name']."</td>";
                                echo "<tr>";
                            }

                             echo "</table>";

                      

                            //showing the total value
                            $stmt2 = $conn->prepare("SELECT SUM(price) as price,tr_date FROM emp_orders WHERE DATE(tr_date) = ?");
                            $stmt2->bind_param('s',$ser_date);
                            $stmt2->execute();
                            $result2 = $stmt2->get_result();
                            echo "<table>
                                    <tr>
                                        <th>Amount Sold</th>                                            
                                    </tr>
                                    ";
                            while($row2 = $result2->fetch_assoc()){                          
                                    
                                    echo "<tr>";
                                    echo "<td>".$row2['price']."</td>";
                                    echo "<tr>";                            
                            }
                            echo "</table>";
                     }

                    ?>
                    </fieldset>
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