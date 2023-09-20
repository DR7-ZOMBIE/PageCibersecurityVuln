<?php
// //postgress connection
// $host = "localhost";   // Cambia esto al host de tu base de datos
// $port = "5432";        // Cambia esto al puerto de tu base de datos
// $dbname = "oscar";     // Cambia esto al nombre de tu base de datos
// $dbuser = "postgres";  // Cambia esto a tu nombre de usuario de PostgreSQL
// $dbpassword = "1234";  // Cambia esto a tu contraseña de PostgreSQL

// $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $dbuser, $dbpassword);







//MYSQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sqli";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";


if (isset($_POST['submit'])) {
    // Your PHP code here
    // You can access form data using $_POST
     $username = $_POST['username'];
     $password = $_POST['password'];
    
    // echo "Submit Entered";
//--------------------------------

$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Check if a row was returned
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password'];
        // echo "Sotredpassword>>>>>>>";
        // echo $storedPassword;
        // echo "password>>>>>>>";
        // echo $password;

        // Compare the stored password with the input password
        if ($password === $storedPassword) {
            // Passwords match, user is authenticated
            echo "Login successful!";
            header("Location: sqli2.php"); // Change 'welcome.php' to the desired page
            exit();
        } else {
            // Passwords do not match
            echo "Incorrect password.";
        }
    } else {
        // No user found with the provided username
        echo "User not found.";
    }
} else {
    // Query execution error
    echo "Error: " . mysqli_error($conn);
}

//-------------------------------
   
    // Perform some actions with the form data
    // For example, you can validate the data, perform database operations, etc.

    // Redirect or display a success message
    // echo $username;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/sqli.css">
    <title>SQLi</title>
</head>

<body>

    <nav style="height: 7.2rem;" class="navbar navbar-expand-lg navbar-dark bg-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

            <a class="navbar-brand">SQLi to RCE:</a>

            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../Client/index.php"> Regresar <span class="sr-only">(current)</span></a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>

        </div>

    </nav>

    <section>
        <div style="margin-top: 13rem; margin-bottom:12rem" class="container login-container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card login-form-1">
                        <div class="card-body">
                            <h3>Iniciar sesión</h3>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Tu Usuario *" value="" name="username" />
                                </div>
                                <div class="form-group">
                                <input type="password" class="form-control" placeholder="Tu Contraseña *" name="password" value="" />
                                </div>
                                <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" name="submit" value="Iniciar sesión" /> 
                                    <!-- <input type="submit" class="btn btn-primary btn-block" name="submit" value="Iniciar sesión" /> -->

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white mt-0">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-4">
                    <h5>Sobre nosotros</h5>
                    <p>Somos estudiantes de la EIA, con un alto enfoque en ciberseguridad.</p>
                </div>
                <div class="col-md-4">
                    <h5>Nombres</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Rafael</a></li>
                        <li><a href="#" class="text-white">Lorenzo</a></li>
                        <li><a href="#" class="text-white">Samuel</a></li>
                        <li><a href="#" class="text-white">Dennis</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contacto</h5>
                    <address>
                        Calle Ejemplo, 123<br>
                        Ciudad, País<br>
                        Tel: 012-345-6789
                    </address>
                </div>
            </div>
        </div>
        <div class="text-center py-3 bg-secondary">
            <small>&copy; 2023 EIA. Todos los derechos reservados.</small>
        </div>
    </footer>

</body>

</html>

<!--Aca pueden trabajar todo el codigo PHP seria mas facil-->

