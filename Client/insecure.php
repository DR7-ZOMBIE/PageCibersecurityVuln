<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/insecure.css">
    <title>Insecure</title>
</head>

<body>

    <nav style="height: 7.2rem;" class="navbar navbar-expand-lg navbar-dark bg-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

            <a class="navbar-brand">Insecure Deserialization:</a>

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
                                    <input type="text" class="form-control" placeholder="Tu Usuario *" value="" name="username"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Tu Contraseña *"
                                        value="" name="password" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-block" value="Iniciar sesión" />
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

    <?php
    ob_start();
    $loginSuccessful = false;

    if (isset($_COOKIE['user_data'])) {
        // Cookie exists, attempt to deserialize and verify
        $cookieValue = base64_decode($_COOKIE['user_data']);
        $userData = unserialize($cookieValue);
        if ($userData !== false && isset($userData['username']) && isset($userData['password'])) {
            // You can check if the user is an admin here
            if ($userData['admin']) {
                echo '<p>Login successful! User is an admin.</p>';
            } else {
                echo '<p>Login successful! User is not an admin.</p>';
            }
            $loginSuccessful = true;
        } else {
            echo '<p>Invalid cookie data.</p>';
        }
    }

    if (!$loginSuccessful && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $loginUsername = $_POST['username'];
        $loginPassword = $_POST['password']; // Plain text password entered by the user

        // Read user data from the text file (users.txt)
        $lines = file('users.txt', FILE_IGNORE_NEW_LINES);

        foreach ($lines as $line) {
            $userData = unserialize($line);

            if ($userData !== false && isset($userData['username']) && isset($userData['password'])) {
                // Check if the provided username and password match the stored data
                if ($loginUsername === $userData['username'] && password_verify($loginPassword, $userData['password'])) {
                    // Successful login

                    // You can set the admin status here based on your criteria
                    $userData['admin'] = ($userData['username'] === 'admin');

                    // Create a cookie for future logins with base64-encoded user data
                    $cookieValue = base64_encode(serialize($userData));
                    setcookie('user_data', $cookieValue, time() + 3600, '/'); // Cookie expires in 1 hour

                    // Check if the user is an admin
                    if ($userData['admin']) {
                        echo '<p>Login successful! User is an admin.</p>';
                    } else {
                        echo '<p>Login successful! User is not an admin.</p>';
                    }

                    $loginSuccessful = true;
                    break; // Exit the loop
                }
            }
        }

        // If the loop finishes without a successful login, show an error message
        if (!$loginSuccessful) {
            echo '<p>Login failed. Invalid username or password.</p>';
        }
    }
    ob_end_flush();
    ?>
</body>

</html>
