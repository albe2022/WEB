<?php 
 session_start();

 include("connection.php");
 include("functions.php");

 $user_data = check_login($con);
 
	// connect to the database
	$conn = mysqli_connect('localhost', 'root', '', 'login_db');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

	// write query 
	$sql = 'SELECT title, nutrients, calories  id FROM Breakfast';

	// get the result set 
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$Breakfast = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create your meal</title>
    </head>
    <body>
        <div class = "background11"> 
            <div class = "createyourmeal1">
                <h1> Breakfast  </h1> 
                



    <?php foreach($Breakfast as $Breakfast){ ?>

     
          <div class="food">
            <h6><?php echo htmlspecialchars($Breakfast['title']); ?></h6>
            <div><?php echo htmlspecialchars($Breakfast['nutrients']); ?></div>
            <h8><?php echo htmlspecialchars($Breakfast['calories']); ?></h8>
          </div>
          
            <a class="brand-text" href="#">more info</a>
          </div>
       

    <?php } ?>

  
</div>
</div>      
    </body>
    </html>
  
    <style type="text/css">
    *{
        margin: 0;
        padding: 0;
    }
    .background11 {
  width: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%), url(Pics/WEBSITE.jpeg);
    background-position: center;
    background-size: cover;
    height: 300vh;
}

.createyourmeal1 h1{
  color: #f8f8f8;
    font-size: 35px;
    font-family: Arial;
    padding-left: 600px;
    float: left;
    padding-top: 1px;
    margin-top: 0px
}

.food h6{
  padding-left: 10px;
  padding-top: 50px;
  font-size: 20px;
  
}

