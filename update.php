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
     
     <main>
          <!-- section add notes -->
           <section>
                         <?php 
                         require("connection.php");
                           
                          $serialId = $_GET['serialNo'];
                      
                        
                         $update = "SELECT *FROM notes WHERE serialNo = '$serialId'";

                         $showData = mysqli_query($connection, $update);
                        
                         $fetchData = mysqli_fetch_array($showData);
                              
                      ?>

               <div class="container mt-5">
                     <h2 class="text-black fw-bold fs-3">Music Songs</h2>

                    <div class="crudContainer d-grid">
                      <form method="post" action="<?php $_SERVER['PHP_SELF']?>" >
                          <input type="text" name="title" placeholder="Title" class="p-2 w-50" id="title" value="<?php echo $fetchData['title'] ?>" />
                          <input type="text" name="artist" placeholder="Artist" class="p-2 w-50 mt-5" id="artist" value="<?php echo $fetchData['artist'] ?>" />
                          <input type="text" name="genre" placeholder="Genre" class="p-2 w-50 mt-5" id="genre" value="<?php echo $fetchData['genre'] ?>" />
                          <button class="bg-primary w-50 mt-5 text-white border p-2 fs-4 fw-normal" type="submit" name="submit" id="submit">Update Notes</button>
                      </form>
                    </div>
                    <?php 
                     if(isset($_POST['submit'])){

                        $id = $_GET['serialNo'];
                        $titleUpdate = $_POST['title'];
                        $artistUpdate = $_POST['artist'];
                        $genreUpdate = $_POST['genre'];

                        $update = "UPDATE notes SET  title = '$titleUpdate', artist = '$artistUpdate', genre = '$genreUpdate' WHERE serialNo = '$id'";

                        if(mysqli_query($connection, $update)){
                          echo "Data Updated";
                        }else{
                          mysqli_errno($connection);
                        }
                     }
                    ?>
</body>
</html>