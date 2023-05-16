<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
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
                    <li><a href="#" class="text-decoration-none text-white fs-3 fw-normal" >Home</a></li>
                    <li><a href="#" class="text-decoration-none text-white fs-3 fw-normal">About</a></li>
                    <li><a href="#" class="text-decoration-none text-white fs-3 fw-normal">Contact</a></li>
                 </ul>
               </div>
          </div>
     </nav>
   
      <main>
          <!-- section add notes -->
           <section>
                 
               <div class="container mt-5">
                     <h2 class="text-black fw-bold fs-3">Music Songs</h2>

                    <div class="crudContainer d-grid">
                      <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" >
                          <input type="text" name="title" placeholder="Title" class="p-2 w-50" id="title"/>
                          <input type="text" name="artist" placeholder="Artist" class="p-2 w-50 mt-5" id="artist"/>
                          <input type="text" name="genre" placeholder="Genre" class="p-2 w-50 mt-5" id="genre"/>
                          <button class="bg-primary w-50 mt-5 text-white border p-2 fs-4 fw-normal" type="submit" name="submit" id="submit">Add Notes</button>
                      </form>
                   
                
                    </div>

                    <?php
                         require('connection.php');
                         
                          if(isset($_POST['submit'])){
                            $title = $_POST['title'];
                            $artist = $_POST['artist'];
                            $genre = $_POST['genre'];

                            $insert = "INSERT INTO notes(title, artist, genre)VALUES('$title', '$artist', '$genre')";
                               
                            if(mysqli_query($connection, $insert)){  
                                 echo "<div class='dataInsert mt-3 p-3 bg-success text-white'> <p>Data Inserted Successfully</p> </div>";
                            }else{
                              mysqli_connect_errno($connection);
                            }
                            
                        }
                      ?>
               </div>

           </section>
           <!-- section show data tables -->

           <section>
                   <div class="container mt-5">
                        <table class="table table-striped text-center">
                            <tr>
                               <td scope='col' class="fs-4 fw-normal">S.No</td>
                               <td scope='col' class="fs-4 fw-normal">Title</td>
                               <td scope='col' class="fs-4 fw-normal">Artist</td>
                               <td scope='col' class="fs-4 fw-normal">Genre</td>
                               <td scope='col' class="fs-4 fw-normal">Update</td>
                               <td scope='col' class="fs-4 fw-normal">Delete</td>
                            </tr>
                           <?php 
                              require('connection.php');

                              $sqlData = 'SELECT *FROM notes';
                               $result = $connection->query($sqlData);
                               while($data = $result->fetch_assoc()){
                               $serial = $serial + 1;

                              
                           ?>
                            <tr>
                                   <td scope='col' class="fs-4 fw-normal"><?php echo $serial ?></td>
                                   <td scope='col' class="fs-4 fw-normal"><?php echo $data['title'] ?></td>
                                   <td scope='col' class="fs-4 fw-normal"><?php echo $data['artist'] ?></td>
                                   <td scope='col' class="fs-4 fw-normal"><?php echo $data['genre']?></td>
                                   <td class="p-3"><a href="update.php?serialNo=<?php echo $data['serialNo']?>" class="bg-primary p-2 text-white w-100 text-decoration-none" onclick="Update()">Update</a></td>
                                   <td class="p-3"><a href="delete.php?serialNo=<?php echo $data['serialNo']?>" class="bg-primary p-2 text-white w-100 text-decoration-none" onclick="Delete()" >Delete</a></td>
                           </tr>
                               <?php 
                                 }
                               ?>
                        </table>
                   </div>
           </section>
      </main>    
</body>
</html>