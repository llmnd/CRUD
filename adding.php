<?php
include 'connexion.php';
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
          <div class="title">
            <H2>Adding an user</H2>
          </div>
          <div class="container" style="margin-top: 50px; display: flex; justify-content: right;">
            <button style="border: 3px solid white;" onclick="location.href='liste.php'"><img src="list.png" width="20px" height="20px" alt=""> liste</button>
          </div>
            <div class="container">
                <br>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <form action="adding.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" name="nom" class="form-control" required>
                                <label for="name">prenom</label>
                                <input type="text" name="prenom" class="form-control" required>
                                <label for="name">login</label>
                                <input type="text" name="login" class="form-control" required>
                                <label for="name">password</label>
                                <input type="password" name="password" class="form-control" required>
                                <label for="name">profile</label>
                                <input type="file" name="profile" class="form-control">
                                <input type="submit" value="Add" class="btn btn-primary mt-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>                            
        <?php
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['login']) && isset($_POST['password']) && isset($_FILES['profile'])){
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $login = $_POST['login'];
            $password = md5($_POST['password']);
            $profile = $_FILES['profile']['name'];
            //$conn = mysqli_connect('localhost', 'root', '', 'ml') 
            //or die(  mysqli_error($conn));
            $query = "INSERT INTO utilisateurs(nom, prenom, login, password, profile) VALUES('$nom', '$prenom', '$login', '$password', '$profile')";
            $result = mysqli_query($conn, $query);
            if($result){
                header('Location: liste.php');
            }
            else{
                echo "Error adding user";
            }
        }
        ?>  
</body>
</html>