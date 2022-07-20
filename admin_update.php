<?php

@include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['update_book'])){

   $book_name = $_POST['book_name'];
   $book_price = $_POST['book_price'];
   $auther = $_POST['auther'];
   $description = $_POST['description'];
   $book_image = $_FILES['book_image']['name'];
   $book_image_tmp_name = $_FILES['book_image']['tmp_name'];
   $book_image_folder = 'images/'.$book_image;
   $book_pdf = $_FILES['book_pdf']['name'];
   $book_pdf_tmp_name = $_FILES['book_pdf']['tmp_name'];
   $book_pdf_folder = 'pdf/'.$book_pdf;

   if(empty($book_name) || empty($book_price) || empty($book_image) || empty($book_pdf) || empty($auther) || empty($description)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE books SET name='$book_name', price='$book_price', author='$auther' , description='$description' , image='$book_image' , pdf='$book_pdf'  WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($book_image_tmp_name, $book_image_folder);
         move_uploaded_file($book_pdf_tmp_name, $book_pdf_folder);
         header('location:admin_page.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>


<div style="margin:100px;" class="container">


   
   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM books WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){
         
         ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
      <h3 class="title">update the book</h3>
      <label for="exampleInputEmail1">Enter book name</label>
      <input type="text" class="form-control" name="book_name" value="<?php echo $row['name']; ?>" placeholder="enter the book name">
      <label for="exampleInputEmail1">Enter auther name</label>
      <input type="text" class="form-control" name="auther" value="<?php echo $row['author']; ?>" placeholder="enter the book auther">
      <label for="exampleInputEmail1">Enter book description</label>
      <input type="text" class="form-control" name="description" value="<?php echo $row['description']; ?>" placeholder="enter the book description">
      <label for="exampleInputEmail1">Enter book price</label>
      <input type="number" min="0" class="form-control" name="book_price" value="<?php echo $row['price']; ?>" placeholder="enter the book price">
      <label for="exampleInputEmail1">upload image</label>
      <input type="file"  class="form-control-file"  name="book_image"  accept="image/png, image/jpeg, image/jpg">
      <label for="exampleInputEmail1">upload pdf</label>
      <input type="file"  class="form-control-file"  name="book_pdf"  ><br>
      <input type="submit" value="update book" name="update_book" class="btn btn-outline-dark">
      <a href="admin_page.php" class="btn btn-outline-dark">go back!</a>
      </div>
   </form>
   


   <?php }; ?>

   


         <?php
            if(isset($message)){
               foreach($message as $message){
                  echo '<h1 >'.$message.'</h1>';
               }
            }
         ?>
</div>

</body>
</html>