<?php

@include 'config.php';

if(isset($_POST['add_book'])){

   $book_name = $_POST['book_name'];
   $book_price = $_POST['book_price'];
   $auther_name = $_POST['auther_name'];
   $description = $_POST['description'];
   $book_image = $_FILES['book_image']['name'];
   $book_image_tmp_name = $_FILES['book_image']['tmp_name'];
   $book_image_folder = 'uploaded_img/'.$book_image;
   $book_pdf = $_FILES['book_pdf']['name'];
   $book_pdf_tmp_name = $_FILES['book_pdf']['tmp_name'];
   $book_pdf_folder = 'pdf/'.$book_pdf;
 
   if(empty($book_name) || empty($book_price) || empty($book_image) || empty($book_pdf) || empty($description) || empty($auther_name)){
      $message[] = 'please fill out all';
   }else{

         $insert = "INSERT INTO books(name, price, author, description, image, pdf) VALUES('$book_name', '$book_price', '$auther_name', '$description' , '$book_image' , '$book_pdf') ";
         $upload = mysqli_query($conn,$insert);
      
      if($upload){
         move_uploaded_file($book_image_tmp_name, $book_image_folder);
         move_uploaded_file($book_pdf_tmp_name, $book_pdf_folder);
         $message[] = 'new product added successfully';
      }else{
         $message[] = 'could not add the product';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM books WHERE id = $id");
   header('location:admin_page.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>
<body>

   
   
   
<div style="padding:50px;"class="container">
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<h1 >'.$message.'</h1>';
   }
}

?>
   <div class="form-group">

      <h3 style="text-align:center;margin:20px;">Add a new book</h3>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <div class="input-group mb-3">
            <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">Book Name</span>
            </div>
            <input type="text" placeholder="enter book name" name="book_name" class="form-control">
         </div>
         <div class="input-group mb-3">
            <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">Book Price</span>
            </div>
            <input type="number" placeholder="enter book price" name="book_price" class="form-control">
         </div>
         <div class="input-group mb-3">
            <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">Auther Name</span>
            </div>
            <input type="text" placeholder="enter auther name" name="auther_name" class="form-control">
         </div>
         <div class="input-group mb-3">
            <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">Description</span>
            </div>
            <input type="text" placeholder="enter book description" name="description" class="form-control">
         </div>
         <div class="input-group mb-3">
            <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">Image</span>
            </div>
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="book_image" class="form-control">
         </div>
         <div class="input-group mb-3">
            <div class="input-group-prepend">
               <span class="input-group-text" id="basic-addon1">Pdf File</span>
            </div>
            <input type="file"  name="book_pdf" class="form-control">
         </div>
         <button type="submit" class="btn btn-outline-primary" name="add_book" value="add_book"> Add Book</button>
      </form>

   </div>


   <?php

   $select = mysqli_query($conn, "SELECT * FROM books");
   
   ?>
   <div  class="product-display">
      <table  style="margin-left:2px;" class="table">
         <thead class="thead-dark">
         <tr> 
            <th>book image</th>
            <th>book name</th>
            <th>book price</th>
            <th>auther name</th>
            <th>description</th>
            <th>pdf</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>$<?php echo $row['price']; ?>/-</td>
            <td><?php echo $row['author']; ?></td>
            <td style="font-size:15px;"><?php echo $row['description']; ?></td>
            <td><?php echo $row['pdf']; ?></td>
            <td>
               <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn btn-outline-primary"> <i class="fas fa-edit"></i> edit </a>
               <a href="admin_page.php?delete=<?php echo $row['id']; ?>" class="btn btn-outline-primary"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>


</body>
</html>