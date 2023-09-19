<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/xss.css">
    <title>XSS</title>
</head>

<body>

    <nav style="height: 7.2rem;" class="navbar navbar-expand-lg navbar-dark bg-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

            <a class="navbar-brand">XSS Almacenado:</a>

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
                            <form method="post" id="commentForm">
                                <div class="form-group">
                                    <label for="usuarioname">Nombre de usuario:</label>
                                    <input type="text" class="form-control" id="usuarioname" name="usuario"
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

try {
    // Establecer la conexión a la base de datos
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $dbuser, $dbpassword);

    // Configurar el modo de errores para PDO a excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparar y ejecutar una consulta SELECT para obtener todos los datos de la tabla
    $sql = "SELECT * FROM xss";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Obtener todos los resultados en forma de arreglo asociativo
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Mostrar los resultados
    foreach ($resultados as $fila) {
        echo "ID: " . $fila['id'] . "<br>";
        echo "Comentario: " . $fila['comment'] . "<br>";
        echo "Usuario: " . $fila['usuario'] . "<br>";
        echo "<hr>";
    }

    // Cerrar la conexión a la base de datos
    $conn = null;
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

echo $_POST['comment'];
$comment = $_POST['comment'];
$usuario = $_POST['usuario'];

if (isset($_POST['comment']) && isset($_POST['usuario'])) {
    insertData($comment, $usuario);
} else {
    echo "No se pudo insertar los datos.";
}


function insertData($comment, $usuario): void
{
    $host = "localhost"; // Cambia esto al host de tu base de datos
    $port = "5432"; // Cambia esto al puerto de tu base de datos
    $dbname = "oscar"; // Cambia esto al nombre de tu base de datos
    $dbuser = "postgres"; // Cambia esto a tu nombre de usuario de PostgreSQL
    $dbpassword = "1234"; // Cambia esto a tu contraseña de PostgreSQL

    try {
        // Establecer la conexión a la base de datos
        $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $dbuser, $dbpassword);

        // Configurar el modo de errores para PDO a excepciones
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar la consulta INSERT
        $sql = "INSERT INTO xss (comment, usuario) VALUES (:comment, :usuario)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);

        // Ejecutar la consulta
        $stmt->execute();

        echo "Datos insertados correctamente.";

        // Cerrar la conexión a la base de datos
        $conn = null;
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
}
?>


<!--
    

create table if not exists xss
(
    usuario text,
    comment text,
    id      serial
);

alter table xss
    owner to postgres;
    

-->