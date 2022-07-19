<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    
    <a style="padding:2px 10px;" class="navbar-brand" href="#">BOOK STORE</a>
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div style="font-size:25px;padding:10px; " class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a style="padding:2px 10px;" class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
      </div>
      <div style="margin-left:1000px;margin-top:10px;">
        <?php session_start(); ?>
        <p style="font-family:italic;"class="text-primary" >Hello <?php echo $_SESSION['username'] ?> </p>
      </div>
      <div style="margin-left:50px;">
        <a style="font-family:italic;"href="/onlinebookstore/index.php">log out</a>
      </div>
      
    </div>
  </nav>
  <div>
    <h1 style="text-align:center;padding:25px;font-size:40px;" class="primary" > Books For You </h1>
  </div>
<?php
@include 'config.php';
   $select = mysqli_query($conn, "SELECT * FROM books");
   
?>
<div class="container">
    <div class="row">
        <?php while($row = mysqli_fetch_assoc($select)){ ?>
        <div class="card" style="width: 18rem;padding:20px;margin:10px;">
        <img class="card-img-top"style="width: 150px;height:200px;text-align:center;" src="uploaded_img/<?php echo $row['image']; ?>" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['name']; ?></h5>
          <h5 class="card-title">$<?php echo $row['price']; ?>/-</h5>
          <p class="card-text"><?php echo $row['description']; ?></p>
        </div>
        <ul class="list-group list-group-flush">
          <h5 class="card-title">Author: <?php echo $row['author']; ?></h5>
          <a style="font-size:15px;"href="download.php?pdf=<?php echo $row['pdf']?>" >download</a>
        </ul>
        
        </div>
      <?php } ?>
    </div>
</div>
</body>
</html>
