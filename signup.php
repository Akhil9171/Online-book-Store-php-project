<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>signup</title>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<?php
@include 'config.php';
if(isset($_POST['add_user'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    if(empty($username)||empty($password)||empty($email) )
    {
        $message[] = 'please fill out all';
    }
    else{
        $insert="insert into users(username,email,password) values('$username','$email','$password')";
        if(mysqli_query($conn,$insert))
        {$message[] = 'Sign up successful';
        header("Location:login.php");
        exit();}
        else
        {$message[] = 'Sign up failed';}
    }
};
?>
<div  style="padding:150px 10px;"class="container">
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<h1>'.$message.'</h1>';
   }
}

?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Enter Username</label>
    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-outline-primary" name="add_user" value="add_user">Submit</button>
</form>
</div>
</body>
</html>
