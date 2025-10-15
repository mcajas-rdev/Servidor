<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background: #f4f6f9;
        margin: 0;
        padding: 40px;
    }

    .resultado {
        max-width: 500px;
        margin: 30px auto;
        padding: 20px 25px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        text-align: center;
        font-size: 18px;
        color: #333;
        line-height: 1.6;
    }

    .resultado .dni {
        display: inline-block;
        margin-top: 10px;
        padding: 6px 12px;
        background: #007bff;
        color: #fff;
        border-radius: 6px;
        font-weight: bold;
        font-size: 20px;
    }

    .resultado .letra {
        font-weight: bold;
        color: #28a745;
        font-size: 22px;
    }

    .error {
        max-width: 500px;
        margin: 30px auto;
        padding: 15px;
        background: #f5c2c7;
        border: 1px solid #f5c2c7;
        color: #842029;
        border-radius: 8px;
        text-align: center;
        font-size: 16px;
    }
</style>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni = $_POST['dni'];
    filtrar($dni);

    if (empty($dni)) {
        echo "<div class='error'>El DNI no puede estar vacío</div>";
        exit;
    }
    if (!ctype_digit($dni)) {
        echo "<div class='error'>El DNI solo puede contener caracteres numéricos</div>";
        exit;
    }
    if (strlen($dni) !== 8) {
        echo "<div class='error'>El DNI no puede tener ni más ni menos de 8 Números</div>";
        exit;
    }

    intval($dni);
    $letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
    $nombre = filtrar($_POST['nombre']);
    $apellidos = filtrar($_POST['apellidos']);

    $letra = $letras[resto($dni)];
    
    echo "<div class='resultado'>";
    echo "¡Hola <b>$nombre $apellidos</b>!<br>";
    echo "La letra de tu DNI es: <span class='letra'>$letra</span><br>";
    echo "Tu DNI completo es: <span class='dni'>$dni$letra</span>";
    echo "</div>";
}

function filtrar($str){
    $filtered = '';
    $filtered = trim($str ?? '');
    $filtered = strip_tags($filtered ?? '');
    $filtered = htmlspecialchars($filtered, ENT_QUOTES, 'UTF-8');
    return $filtered;
}

function resto ($numero){
    return $numero%23;
}

?>


