<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/xxe.css">
    <title>XXE</title>
</head>

<body>

    <nav style="height: 7.2rem;" class="navbar navbar-expand-lg navbar-dark bg-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

            <a class="navbar-brand">XXE:</a>

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

    <section id="section" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div style="background-color: green;" class="card-header text-white">
                            Deja tu comentario
                        </div>
                        <div class="card-body">
                            <form id="commentForm">
                                <div class="form-group">
                                    <label for="username">Nombre de usuario:</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Tu nombre de usuario">
                                </div>
                                <div class="form-group">
                                    <label for="comment">Comentario:</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="4"
                                        placeholder="Tu comentario aquí"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="commentsSection" class="mt-5">
                <!-- Comentarios Almacenados -->
            </div>
        </div>

    </section>

    <br><br><br><br><br><br>

    <footer class="bg-dark text-white mt-4">
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

$host = "localhost"; // Cambia esto al host de tu base de datos
$port = "5432"; // Cambia esto al puerto de tu base de datos
$dbname = "oscar"; // Cambia esto al nombre de tu base de datos
$dbuser = "postgres"; // Cambia esto a tu nombre de usuario de PostgreSQL
$dbpassword = "1234"; // Cambia esto a tu contraseña de PostgreSQL

$conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $dbuser, $dbpassword);

$sql = 'INSERT INTO comments (username, comment) VALUES (?, ?)';

$stmt = $database->prepare($sql);

$stmt->bindParam(1, $_POST['username']);
$stmt->bindParam(2, $_POST['comment']);

$sql = 'SELECT * FROM comments';

$stmt = $database->prepare($sql);

$stmt->execute();

$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

$xmlString = <<<XML
        <?xml version="1.0" encoding="UTF-8"?>
        <!DOCTYPE foo [ <!ENTITY xxe SYSTEM "file:///etc/passwd"> ]>
        <stockCheck><productId>&xxe;</productId></stockCheck>
    XML;

$xml = simplexml_load_string($xmlString);

$response = $app->processRequest($xml);

// Verifica el contenido de la respuesta
if (strpos($response, "root") !== false) {
    // La aplicación es vulnerable
}

?>
