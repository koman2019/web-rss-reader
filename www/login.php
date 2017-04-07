<?php
   require_once '/includes/db.php'; // The mysql database connection script
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($mysqli,$_POST['username']);
      $mypassword = mysqli_real_escape_string($mysqli,$_POST['password']); 
      echo $myusername;
      $sql = "SELECT userid FROM users WHERE username = '$myusername' and password = '$mypassword'";
	  echo $sql;
	  
      $result = mysqli_query($mysqli,$sql);
	  //echo $result;
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
	  $error = "";		
      if($count == 1) {
		  
         $_SESSION['login_user'] = $myusername;
         header("location: main.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
    <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/taskman.css"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700" rel="stylesheet" type="text/css">

    </head>
   <div class="container" style="margin-top: 5%;">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
            <div class="widget-header header-color-blue">Login</div>
            <div class="widget-body">
            
            <!-- Login Form -->
            <form action="" method = "post">
            
            <!-- Username Field -->
                <div class="row">
                    <div class="form-group col-xs-12">
                    <label for="username"><span class="text-danger" style="margin-right:5px;">*</span>Username:</label>
                    <input class="form-control" id="username" type="text" name="username" placeholder="Username" required/>
                    </div>
                </div>
                
                <!-- Content Field -->
                <div class="row">
                    <div class="form-group col-xs-12">
                        <label for="password"><span class="text-danger" style="margin-right:5px;">*</span>Password:</label>
                        <input class="form-control" id="password" type="password" name="password" placeholder="Password" required/>
                    </div>
                </div>
				
				<div style = "font-size:11px; color:#cc0000; margin:10px"><?php echo (isset($error) ? $error : "" ); ?></div>
                
                <!-- Login Button -->
                <div class="row">
                    <div class="form-group col-xs-4">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
                
            </form>
            <!-- End of Login Form -->
            
        </div>
    </div>
</div>
</html>