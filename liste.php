<?php
    include('connexion.php');
 ?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="liste.css">
    <style>
        .nav-link{
            color: white !important;
        }
        .title{
            text-align: center !important;
            align-items: center !important;
            margin-top: 50px;
        }
    </style>
</head>
<body>
          <nav class="navbar navbar-expand-sm navbar-light bg-dark">
              <div class="container-fluid">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
                      aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarID">
                      <div class="navbar-nav">
                          <button style="border: 3px solid white;" onclick="location.href='accueil.php'"><img src="logout.png" width="20px" height="20px" alt=""> logout</button>
                      </div>
                  </div>
              </div>
          </nav>
          <div class="contain" style="display:flex; justify-content: center; margin-top: 30px;" ><h1>LISTE DES UTILISATEURS</h1></div>
            <div class="container" style="margin-top: 50px; display: flex; justify-content: right;">
                <a href="adding.php" style="color: white; "><button style="border: 3px solid white ;"><img src="add1.png" width="20px" height="20px" alt="">add</button></a>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <table  style="color: white;"class="table">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>nom</th>
                                    <th>prenom</th>
                                    <th>login</th>
                                    <th>password</th>
                                    <th>profile</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM utilisateurs";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>".$row['id']."</td>";
                                            echo "<td>".$row['nom']."</td>";
                                            echo "<td>".$row['prenom']."</td>";
                                            echo "<td>".$row['login']."</td>";
                                            echo "<td>".$row['password']."</td>";
                                            echo "<td>".$row['profile']."</td>";
                                            echo "<td>
                                            <div style='display: flex; justify-content: space-around;'>
                                                <a href='edit.php?id=".$row['id']."'>
                                                    <div style='width: 30px; height: 30px; background-color:yellow; display: flex; align-items: center; justify-content: center;'>
                                                        <img src='edit2.png' style='width: 20px; height: 20px;'>
                                                    </div>                  
                                                </a> 
                                                <a href='#' onclick='confirmDelete(".$row['id'].")'>    
                                                    <div style='width: 30px; height: 30px; background-color:red; display: flex; align-items: center; justify-content: center;'>
                                                        <img src='supp.png' style='width: 20px; height: 20px;'>
                                                    </div>
                                                </a>
                                                <a href='liste.php'>
                                                    <div style='width: 30px; height: 30px; background-color:green; display: flex; align-items: center; justify-content: center;'>
                                                        <img src='read.png' style='width: 20px; height: 20px;'>
                                                    </div>
                                                </a>
                                            </div>
                                            </td>";
                                            echo "</tr>";
                                        }
                                    }
                                     else {
                                        echo "0 results";
                                        }
                                    ?>
                                         <script>
                                            function confirmDelete(id) {
                                            var r = confirm("Do you want to delete this record?");
                                            if (r == true) {
                                                window.location.href = "liste.php?id="+id;
                                             } else {
                                                window.location.href = "liste.php";
                                             }
                                            } 
                                        </script>
                                        <?php
                                    if(isset($_GET['id'])){
                                        $id = $_GET['id'];
                                        ?>
                                        <?php
                                        $sql = "DELETE FROM utilisateurs WHERE id=$id";
                                        if ($conn->query($sql) === TRUE) {
                                            echo "Record deleted successfully"; 
                                            echo "<script>window.location.href = 'liste.php';</script>";
                                        } else {
                                            echo "Error deleting record: " . $conn->error;
                                        }
                                    }
                                    $conn->close();
                                ?>
                            </tbody>
                     </table>
                </div>
            </div>
        </div>
</body>
</html>