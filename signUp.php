<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login Form</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="form">
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          
          <form action="signUp.php" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                User Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="uname"/>
            </div>
            
            <div class="field-wrap">
                <!--<label>
                  Department<span class="req">*</span>
                </label>
                <input type="text"required autocomplete="off" name="class"/>-->
                <select name="class" required autocomplete="off" style="background:none;border:1px solid #bdbdbd;padding:7px;width:100%;font-size:17px;color:white">
                  <option value="Not Specified">Department</option>
                  <option value="INFT">INFT</option>
                  <option value="COMPS">COMPS</option>
                  <option value="EXTC">EXTC</option>
                  <option value="ETRX">ETRX</option>
                  <option value="INST">INST</option>
                </select>



            </div>
            
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="email"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="pass"/>
          </div>
          
          <button type="submit" class="button button-block" name="signUp"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="signUp.php" method="post">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="lemail"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="lpass"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button class="button button-block" name="login"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
<?php
  // echo "ff";
    if(isset($_POST["signUp"]) && isset($_POST["class"]))
    {
        require("dbCon.php"); 
        $class = $_POST["class"];e
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $name = $_POST["uname"];
        $level = 1;
        $date = date("Y-m-d h:i:sa");
        $sql = "insert into users (user_name,user_dept,user_pass,user_email, user_date, user_level) values('$name','$class', '$pass','$email','$date','$level')";
        if($conn->query($sql))
        {
        ?>
        <script>
            <?php 
              $_SESSION["name"]=$name;
              $_SESSION["loggedin"]=true;
              echo("location.href = 'default.php'");
            ?>
        </script>
        <?php
        }
        else
        {
            echo "Error";
        }
    }

    if(isset($_POST["login"]))
    {
        require("dbCon.php");
        $pass= $_POST["lpass"];
        $email = $_POST["lemail"];
        $sql = "select * from users where user_email = '$email'";
        $result = $conn->query($sql);
        // $book=0;
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) 
            {
                if($row["user_pass"]==$pass)
                {
                  $_SESSION["name"]=$row["user_name"];
                  $_SESSION["loggedin"]=true;
                  $_SESSION["id"]=$row["user_id"];
                  header("location: default.php");
                }   
            }
        }
        else 
        {
            ?>
                <script>
                    alert("Wrong Password or Email");
                </script>
            <?php
        }
    }

?>
</html>
