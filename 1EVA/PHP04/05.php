<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
    <style>
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 20px;
    background-color: #f5f5f5;
}

form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Grupos de formulario */
.form-group {
    margin-bottom: 15px;
}
.form-group #Edad{
    margin-top: 30px;
}

/* Estilos para etiquetas */
label {
    display: inline-block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
}

/* Estilos para inputs de texto */
input[type="text"] {
    width: 200px;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
}

/* Estilos para select */
select {
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    background-color: white;
}

/* Estilos para radio buttons */
.radio-group {
    margin-bottom: 15px;
}

.radio-group label {
    font-weight: normal;
    margin-right: 15px;
}

.radio-group input[type="radio"] {
    margin-right: 5px;
}

/* Estilos para checkboxes */
.checkbox-group {
    margin-bottom: 20px;
}

.checkbox-item {
    margin-bottom: 8px;
}

.checkbox-item input[type="checkbox"] {
    margin-right: 8px;
}

.checkbox-item label {
    font-weight: normal;
    cursor: pointer;
}

/* Estilos para botones */
input[type="reset"],
input[type="submit"] {
    padding: 10px 20px;
    margin-right: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

input[type="reset"] {
    background-color: #f44336;
    color: white;
}

input[type="reset"]:hover {
    background-color: #da190b;
}

/* Estilos para br (espaciado) */
br {
    margin-bottom: 10px;
}

/* Estilos para focus */
input:focus,
select:focus {
    outline: none;
    border-color: #4CAF50;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.3);
}

/* Estilos específicos para los divs de nombre y apellidos */
.nombre,
.apellidos {
    display: inline-block;
    margin-right: 0px;
}

    </style>
</head>
<body>
    <form method="post">
        <div class="form-group">
            <div class="nombre">
                <label for="Nombre">Nombre: </label>
                <input type="text" name="Nombre" id="Nombre">
            </div> <br> 
            <div class="apellidos">
                    <label for="Apellidos">Apellidos: </label>
                    <input type="text" name="Apellidos" id="Apellidos">
            </div> 
        </div>
        <br>
        <div class="form-group">
            <label for="Edad">Edad: </label>
            <select name="Edad" id="Edad">
                <option value="1">Menor de 18</option>
                <option value="2">Entre 18 y 30</option>
                <option value="3">Entre 30 y 55</option>
                <option value="4">Mayor de 55</option>
            </select>
        </div>
        <br>
        <div class="radio-group">
            <label for="sexo">Sexo: 
                <input type="radio" name="sexo" id="hombre" value="Hombre">
                <label for="hombre">Hombre</label>
                <input type="radio" name="sexo" id="mujer" value="Mujer">
                <label for="mujer">Mujer</label>
            </label>
        </div>
            <br>
        <div class="checkbox-group">
            <div class="checkbox-item">
                <input type="checkbox" name="hobbies[]" id="lectura" value="Leer">
                <label for="lectura">Leer</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="hobbies[]" id="tv" value="ver la tele">
                <label for="tv">Ver la tele</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="hobbies[]" id="deporte" value="hacer deporte">
                <label for="deporte">Hacer deporte</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="hobbies[]" id="salir" value="salir de marcha">
                <label for="salir">Salir de marcha</label>
            </div>
        </div>
            <input type="reset" value="reset">
            <input type="submit" value="submit">
    </form>

    <?php
    $aficiones = [];
    $cadena = '';
        foreach ($_POST as $k => $v) {
            switch ($k) {
                case 'Nombre':
                        $nombre = filtrar($v);
                    break;
                case 'Apellidos':
                        $apellidos = filtrar($v);
                    break;
                case 'Edad':
                        $edad = $v;
                    break;
                case 'sexo':
                        $sexo = $v;
                    break;
                case 'hobbies':
                        if (is_array($v)) {
                            foreach ($v as $key => $h) {
                                $aficiones[] = $h;
                            }
                        }
                    break;
                default:

                    break;
            }
        }

        print_r(mensaje($nombre, $apellidos, $edad, $sexo, $aficiones));
        

        function mensaje($nombre, $apellidos, $edad, $sexo, $aficiones){
            
            if ($sexo === 'Hombre' && $edad == 4) {
                    $cadena .= 'Bienvenido Don '.$nombre.' '.$apellidos;
            }else if ($sexo === 'Mujer' && $edad == 4) {
                    $cadena .= 'Bienvenida Doña '.$nombre.' '.$apellidos;
            }else if ($sexo === 'Mujer' && $edad < 4) {
                $cadena .= 'Bienvenida '.$nombre.' '.$apellidos;
            }else{
                $cadena .= 'Bienvenido '.$nombre.' '.$apellidos;
            }

            if (count($aficiones) > 1) {
                $cadena .= ', sus aficiones son ';    
            }else if (count($aficiones) === 1) {
                $cadena .= ', su unica afición es ';
            }else{
                $cadena .= ', no tiene aficiones en nuestra lista';
            }
            for ($i=0; $i < count($aficiones); $i++) { 
                if (count($aficiones) === 2) {
                    if ( $i === 0) {
                        $cadena .= $aficiones[$i].' y '; 
                    }else{
                        $cadena .= $aficiones[$i].'.';
                    }
                }else if (count($aficiones) > 2) {
                    if ( $i+1 === count($aficiones) - 1) {
                        $cadena .= $aficiones[$i].' y '; 
                    }else{
                        $cadena .= $aficiones[$i].', ';
                    }
                }else{
                    $cadena .= $aficiones[$i].'.';
                }
            }
                return $cadena;
    }
            
    function filtrar($str){
        $filtered = '';

        $filtered = trim($str ?? '');
        $filtered = strip_tags($filtered ?? '');
        $filtered = htmlspecialchars($filtered, ENT_QUOTES, 'UTF-8');
        
        return $filtered;
    }       
        
    ?>
</body>
</html>