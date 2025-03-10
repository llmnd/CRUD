<?php
    include('connexion.php');
    if (!$conn) {
        die("Erreur de connexion à la base de données : " . mysqli_connect_error());
    }
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
        .nav-link {
            color: white !important;
        }
        .title {
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
                    <a class="nav-link" href="accueil.php">
                        <button style="border: 3px solid white;"><img src="logout.png" width="20px" height="20px" alt="">logout</button>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div style="display: flex; justify-content: right; margin-top: 20px; margin-right: 20px;">
        <a href="liste.php" style="color: white;"><button style="border: 3px solid white;"><img src="list.png" width="20px" height="20px" alt="">liste</button></a>
    </div>
    <br>
    <div class="title">
        <h2>Update an user</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM utilisateurs WHERE id = $id";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="nom" class="form-control" value="<?php echo $row['nom'] ?>">
                        <label for="name">Prenom</label>
                        <input type="text" name="prenom" class="form-control" value="<?php echo $row['prenom'] ?>">
                        <label for="name">Login</label>
                        <input type="text" name="login" class="form-control" value="<?php echo $row['login'] ?>">
                        <label for="name">Password</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $row['password'] ?>">
                        <label for="name">Profile</label>
                        <input type="file" name="profile" class="form-control">
                        <input type="submit" value="Edit" class="btn btn-primary mt-3">
                    </div>
                </form>
                <?php
                    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['login']) && isset($_POST['password'] ) && isset($_FILES['profile'])) {
                        $nom = $_POST['nom'];
                        $prenom = $_POST['prenom'];
                        $login = $_POST['login'];
                        $password = $_POST['password'];
                        $profile = $_FILES['profile']['name'];
                        $sql = "UPDATE utilisateurs SET nom = '$nom', prenom = '$prenom', login = '$login', password = '$password', profile = '$profile' WHERE id = $id";
                        if ($conn->query($sql) === TRUE) {
                            echo "Record updated successfully";
                            header('Location: liste.php');
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>