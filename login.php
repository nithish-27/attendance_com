<?php
    $title = 'User Login'; 

    require_once 'includes/header.php'; 
    require_once 'db/conn.php'; 
    
    //If data was submitted via a form POST request, then...
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        

        $new_password = md5($password.$username);
        $result = $user->getUser($username,$new_password);
        if(!$result){
            echo '<div class="alert alert-danger">Username or Password is incorrect! Please try again. </div>';
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['userid'] = $result['id'];
            header("Location: viewrecords.php");
        }

    }
?>

<br><br><br>
<div style="width:30%; " class="container shadow p-3 mb-5 bg-white rounded" ><br>
<h1 class="text-center"><?php echo $title ?> </h1><br>
    <form   action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        
                <label for="username">Username: * </label>
                <input  type="text" name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">
            
           
               <label for="password">Password: * </label>
                <input type="password" name="password" class="form-control" id="password">
               
       <br/><br/>
       <div  style="display:flex; justify-content:center;">
        <input style="width:20%; text-align:center;" type="submit" value="Login" class="btn btn-primary btn-block"><br/>
        
       </div>   
       <div style="text-align:center;" ><br>
        <a href="#"> Forgot Password </a>
       </div>
    </form><br/>
</div>
<?php include_once 'includes/footer.php'?>