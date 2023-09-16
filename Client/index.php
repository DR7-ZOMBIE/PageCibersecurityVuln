<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/index.css">
    <title>Pagina Principal</title>
</head>

<body>

    <nav style="height: 7.2rem;" class="navbar navbar-expand-lg navbar-dark bg-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

            <a class="navbar-brand">Vulnerabilidades:</a>

            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="../Client/xss.php">XSS Almacenado <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Client/insecure.php">Insecure Deserialization</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Client/xxe.php" tabindex="-1" aria-disabled="true">XXE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Client/sqli.php" tabindex="-1" aria-disabled="true">SQLi to RCE</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>

        </div>

    </nav>

    <section id="section">

        <div class="card" style="width: 20rem;">
            <img class="imagenes" src="../img/foca.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Foca</h5>
                <p class="card-text">¿Qué pasaría si pudieras desentrañar los secretos más oscuros de una organización
                    sin siquiera entrar en su red? FOCA (Fingerprinting Organizations with Collected Archives) es el
                    detective digital que necesita tu arsenal de seguridad. Con solo unos pocos clics, puedes descubrir
                    información sensible oculta en metadatos de archivos públicos.
                    FOCA es como tener a Sherlock Holmes en tu equipo, analizando datos para revelar más de lo que el
                    ojo puede ver.</p>
                <a href="https://www.dragonjar.org/foca-herramienta-para-analisis-meta-datos.xhtml"
                    class="btn btn-primary">....</a>
            </div>
        </div>

        <div class="card" style="width: 20rem;">
            <img class="imagenes" src="../img/metasploit.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Metasploit</h5>
                <p class="card-text">¿Y si tuvieras un centro de comando desde donde pudieras lanzar, coordinar y
                    administrar ataques y
                    defensas en una red? Esa es precisamente la esencia de msfconsole, el corazón palpitante del
                    framework de Metasploit. Con una línea de comando interactiva y una gran variedad
                    de plugins y bibliotecas, esta herramienta pone al alcance de tu mano el poder de la penetración
                    ética. Ademas de permitir incorporar Scripts para explotacion.</p>
                <a href="https://www.metasploit.com/" class="btn btn-primary">....</a>
            </div>
        </div>

        <div class="card" style="width: 20rem;">
            <img class="imagenes" src="../img/nmap.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Nmap</h5>
                <p class="card-text">Si Internet es una galaxia, entonces Nmap es tu cartógrafo. Esta herramienta de
                    escaneo de red traza mapas de sistemas y redes con una precisión asombrosa. ¿Necesitas saber qué
                    dispositivos están conectados en tu red? ¿Qué puertos están abiertos? ¿Qué servicios están
                    ejecutándose? Nmap te ofrece todo eso
                    en una elegante línea de comando o en una interfaz gráfica intuitiva. Es como tener un GPS para la
                    infinita carretera de la información.</p>
                <a href="https://nmap.org/" class="btn btn-primary">....</a>
            </div>
        </div>

        <div class="card" style="width: 20rem;">
            <img class="imagenes" src="../img/netcat.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Netcat</h5>
                <p class="card-text">Imagina un instrumento tan versátil que te permite abrir puertos TCP y UDP,
                    escanear redes y hasta crear backdoors.
                    Conocido como la "navaja suiza" en el mundo del networking, Netcat hace precisamente eso. Es el
                    comodín que nunca sabías que necesitabas, permitiéndote interactuar con
                    sistemas y servicios de red como nunca antes. Netcat no es solo una herramienta; es una llave
                    maestra al universo interconectado. ! Pruebala Ya ...!</p>
                <a href="https://nmap.org/ncat/" class="btn btn-primary">....</a>
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