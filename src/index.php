<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pueblos Magicos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="recursos/css/pueblos-magicos.css">
</head>
<body>
<nav class="menu-navegacion">
    <ul class="menu-lista">
        <li class="menu-opcion">
            <a href="./index.php">
                <picture class="logo">
                    <img alt="logo de pagina" width="175" height="50" src="recursos/imagenes/pueblos-magico-logo.png">
                </picture>
            </a>
        </li>
        <li class="menu-opcion menu-links-navegacion">
            <ul class="menu-lista">
                <li class="menu-opcion">
                    <ul class="menu-lista menu-en-columna">
                        <li class="opcion-reducida">
                        </li>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<section class="pueblo-magico-imagen">
    <h1 class="typografia pueblo-magico-texto">Bienvenido</h1>
</section>
<section id="lista-de-resenia" class="seccion-de-reviews typografia contentido mostrar">
    <h2 class="margin-top-20">La gente opina:</h2>
    <button id="agregar-resenia" class="agregar-review margin-top-20">Opinar</button>
    <?php
    class Database{
        private $host = 'localhost';
        private $user = 'root';
        private $password = '';
        private $database = "pueblos_magicos";
        public function getConnection(){
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error de conexion: " . $conn->connect_error);
            } else {
                return $conn;
            }
        }
    }

    $db = new Database();
    $db_connection = $db->getConnection();

    $query = 'SELECT * FROM reviews';
    $result = $db_connection->execute_query($query);

    echo "<ul id='lista-de-reviews' class=\"lista-de-reviews\">";
    foreach ($result as $row) {
        printf("<li id='%s'><div class='comentario'><strong>%s</strong> dice: <br />%s: <em>%s</em></div></li>", $row["id"], $row["nombre"], $row["pueblo"], $row["comentarios"]);
    }
    echo "</ul>";
    ?>
</section>
<section id="formulario-de-resenia" class="typografia contentido ocultar">
    <br>
    <h2 class="margin-top-10">Formulario de Reseña</h2>
    <article class="columnas">
        <h3 class="margin-top-20">Danos tu Opinion:</h3>
        <form class="formulario-de-registro margin-top-20">
            <div class="campo-de-forma">
                <label for="nombre">Nombre:</label>
                <input id="nombre" name="nombre" type="text" placeholder="Ingresa tu nombre" required />
            </div>
            <div class="campo-de-forma">
                <label for="pueblo-visitado">Pueblo que Visitaste:</label>
                <select id="pueblo-visitado" name="pueblo-visitado">
                    <option value="">Selecciona un pueblo</option>
                    <option value="San Miguel el Alto">San Miguel el Alto</option>
                    <option value="San Cristobal de las Casas">San Cristobal de las Casas</option>
                    <option value="Atlisco">Atlisco</option>
                    <option value="Dolores Hidalgo">Dolores Hidalgo</option>
                </select>
            </div>
            <div class="campo-de-forma">
                <label for="review">Comentarios:</label>
                <textarea id="review" name="review" placeholder="Comparte tu opinion" cols="32" rows="5"></textarea>
            </div>
            <div class="campo-de-forma">
                <button class="enviar" type="submit">Enviar</button>
            </div>
        </form>
    </article>
    <br>
</section>
<footer>
    <p>¡Gracias por su vista!</p>
</footer>
<script src="recursos/scripts/pueblos-magicos.js" type="application/javascript"></script>
</body>
</html>