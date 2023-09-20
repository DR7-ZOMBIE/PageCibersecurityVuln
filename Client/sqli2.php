<?php
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


// if (isset($_POST['submit'])) {
//     // Your PHP code here
//     // You can access form data using $_POST
//     $product = $_POST['product'];
//     // echo $product;
//     // echo "HOLAAAAAAAAAAAAAAAAA";
//     // echo "Submit Entered";

//     $sql = "SELECT * FROM products WHERE name = '$product'";
//     $result = mysqli_query($conn, $sql);

//     $row = mysqli_fetch_assoc($result);
//     //print_r($row);
    
   
//     // Perform some actions with the form data
//     // For example, you can validate the data, perform database operations, etc.

//     // Redirect or display a success message
//     // echo $username;
// }
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>Consultar Productos</h3>
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nombre Producto...." value="" name="product" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" name="submit" value="submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <!-- Display the product search results here -->
                        <?php
                        if (isset($_POST['submit'])) {
                            // Check if a product was searched for
                            if (!empty($_POST['product'])) {
                                $product = $_POST['product'];

                                // Sanitize user input to prevent SQL injection
                                #$product = mysqli_real_escape_string($conn, $product);

                                // Query to retrieve product information
                                $sql = "SELECT name,cantidad FROM products WHERE name = '$product'";
                                echo $sql;
                                $result = mysqli_query($conn, $sql);

                                if ($result && mysqli_num_fields($result) > 0) {
                                    // Display product details
                                    $row = mysqli_fetch_assoc($result);
                                    print_r($row);
                                    echo "<h4>Product Details</h4>";
                                    echo "Name: " . $row['name'] . "<br>";
                                    // echo "Description: " . $row['description'] . "<br>";
                                     echo "Cantidad: " . $row['cantidad'] . "<br>";
                                    // You can display other product information as needed
                                } else {
                                    echo "Product not found.";
                                }
                            } else {
                                echo "Please enter a product name to search.";
                            }
                        }
                        ?>
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
<?php

?>
