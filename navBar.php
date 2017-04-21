<style>
    button{
        padding:0px;
        margin:0px;
        background:none;
        border:none;
    }
    button:focus {outline:0;}
</style>
<script>
$(document).ready(function(){
    $("#post").click(function(){
        $("#box").load("post.php");
    });
	$("#profile").click(function(){
        $("#box").load("profile.php");
    });
	$("#home").click(function(){
        $("#box").load("feeds.php");
    });
});
</script>

<div class="container-fluid" style="padding: 0px; margin-top: 0px;background: black">
    <nav class="navbar navbar-inverse" style="padding: 0px; margin: 0px" >  
    <div class="container-fluid" id="gg">
        <div class="navbar-header" >
        <a class="navbar-brand" href="default.php" style="color:aliceblue">VESITforum</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a><button id="home">Home</button></a></li>
            
			
			<?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
                {
                    ?>
						<li><a><button id="post">Post</button></a></li>
						<li><a><button id="profile">Profile</button></a></li>
					<?php
                }
            ?>
		</ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
                {
                    ?>
                    <li><a href="logout.php">Log Out</a></li>
                    <?php
                }
                else
                {
                    ?>
                    <li><a href="signUp.php">SignUp</a></li>
                    <li><a href="signUp.php">Login</a></li>
                        
                    <?php
                }
            ?>
        </ul>
       <form class="navbar-form navbar-right">
            <div class="input-group">
            <input type="text" class="form-control" placeholder="Search">
            <div class="input-group-addon">
                
                <button class="glyphicon glyphicon-search" id="sbtn" onclick="ajaxCall();"></button>
                
            </div>
            </div>
        </form>
        
       
        </div>
        </div>  
    </nav>
    </form>
</div>