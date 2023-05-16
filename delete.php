<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">
   <script src="./index.js" defer></script>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
     <nav class="navbar navbar-expand-lg-body bg-black">
          <div class="container-fluid d-flex justify-content-around align-items-center">
               <div class="title">
                   <h1 class="text-white fs-2">Music Songs Collection</h1>
               </div>
               <div class="menu">
                 <ul class="d-flex list-unstyled col-2 gap-3 m-0">
                    <li><a href="index.php" class="text-decoration-none text-white fs-3 fw-normal" >Home</a></li>
                    <li><a href="#" class="text-decoration-none text-white fs-3 fw-normal">About</a></li>
                    <li><a href="#" class="text-decoration-none text-white fs-3 fw-normal">Contact</a></li>
                 </ul>
               </div>
          </div>
     </nav>

     <?php 

require('connection.php');

 $serialNumber = $_GET['serialNo'];

 $query = "DELETE FROM notes WHERE serialNo = '$serialNumber'";

 $delete = mysqli_query($connection, $query);

   if($delete){
     echo  "<div class='dataInsert mt-3 p-3 bg-success text-white'> <p>Data Deleted Successfully</p> </div>";
   }else{
     die();
   }
?>
</body>