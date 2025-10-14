<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    echo '<style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            color: white;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 2em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        .content {
            padding: 30px;
        }
        .player-card {
            background: #f8f9fa;
            border-left: 5px solid #3498db;
            padding: 20px;
            margin-bottom: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .player-card h4 {
            color: #2c3e50;
            margin-top: 0;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
            font-size: 1.4em;
        }
        .player-info {
            font-size: 1.1em;
            line-height: 1.6;
            color: #34495e;
        }
        .player-info strong {
            color: #2c3e50;
            font-weight: 600;
        }
        .image-section {
            text-align: center;
            margin: 25px 0;
            padding: 20px;
            background: #ecf0f1;
            border-radius: 10px;
        }
        .image-section img {
            max-width: 300px;
            max-height: 300px;
            border: 3px solid #bdc3c7;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .error-message {
            background: #e74c3c;
            color: white;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin: 15px 0;
            font-weight: bold;
        }
        .success-message {
            background: #27ae60;
            color: white;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin: 15px 0;
            font-weight: bold;
        }
        .weapons-list {
            display: inline-block;
            background: #3498db;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            margin: 2px;
            font-size: 0.9em;
        }
    </style>';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include('captura.html');
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo '<div class="container">';
        echo '<div class="header"><h1>🎮 Datos del Jugador Registrado</h1></div>';
        echo '<div class="content">';
        
        $cadena='';
        $nombre = '';
        $alias='';
        $edad = 0;
        $armas = [];
        $artes = '';
        foreach ($_POST as $k => $v) {
            switch ($k) {
                case 'nombre':
                        $nombre = filtrar($v);
                    break;
                case 'alias':
                        $alias = filtrar($v);
                    break;
                case 'edad':
                        $edad = $v;
                    break;
                case 'armas':
                        foreach ($v as $key => $gun) {
                            $armas[] = $gun;
                        }
                    break;
                case 'artes':
                        $artes = $v;
                    break;
                default:
                
                    break;
            }
        }

        
        echo '<div class="player-card">';
        mostrarFormulario($nombre, $alias, $edad, $armas, $artes);
        echo '</div>';

        
        echo '<div class="image-section">';
        echo '<h3>🖼️ Imagen del Jugador</h3>';
        
        if ($_FILES['img']['error'] === UPLOAD_ERR_NO_FILE) {
            echo "<img src='calavera.png' alt='Calavera' style='max-width: 200px;'>";
            echo '<p style="color: #7f8c8d; font-style: italic;">No se subió ninguna imagen</p>';
        }else if ($_FILES['img']['error'] !== UPLOAD_ERR_OK) {
            echo '<div class="error-message">⚠️ Se produjo un error en la subida de archivos</div>';
        }else{

            $mime = mime_content_type($_FILES ['img'] ['tmp_name']);
            if ($mime !== 'image/png' ) {
                echo '<div class="error-message">❌ El archivo no es un PNG válido</div>';
            } 
            
            else if ($_FILES['img']['size'] > 10240) {
                echo '<div class="error-message">📏 El archivo es demasiado grande (máximo 10KB)</div>';
            }
            
            else {
                $nombre_unico = uniqid() . '.png';
                if (move_uploaded_file($_FILES['img']['tmp_name'], 'uploads/' . $nombre_unico)) {
                    echo '<div class="success-message">✅ Imagen subida correctamente</div>';
                    echo "<img src='uploads/$nombre_unico' alt='Imagen del jugador'>";
                } else {
                    echo '<div class="error-message">❌ Error al guardar la imagen en el servidor</div>';
                }
            }
        }
        echo '</div>';
        echo '</div>';
        echo '</div>'; 

    }

     function filtrar($str){
            $filtered = '';

            $filtered = trim($str ?? '');
            $filtered = strip_tags($filtered ?? '');
            $filtered = htmlspecialchars($filtered, ENT_QUOTES, 'UTF-8');
            
            return $filtered;
        }

        function mostrarFormulario($nombre, $alias, $edad, $armas, $artes){
            echo '<h4>👤 Datos del Jugador</h4>';
            echo '<div class="player-info">';
            echo "<strong>Nombre:</strong> ".$nombre."<br>";
            echo "<strong>Alias:</strong> ".$alias."<br>";
            echo "<strong>Edad:</strong> ".$edad." años<br>";
            echo "<strong>Armas seleccionadas:</strong> ";
            if (empty($armas)) {
                echo "Ninguna<br>";
            } else {
                for ($i = 0; $i < count($armas); $i++) { 
                    if (count($armas) === 1) {
                        echo '<span class="weapons-list">' . $armas[$i] . '</span>';
                    } else if (count($armas) === 2) {
                        if ($i === 0) {
                            echo '<span class="weapons-list">' . $armas[$i] . '</span> y '; 
                        } else {
                            echo '<span class="weapons-list">' . $armas[$i] . '</span>';
                        }
                    } else {
                        if ($i === count($armas) - 1) {
                            echo '<span class="weapons-list">' . $armas[$i] . '</span>';
                        } else if ($i === count($armas) - 2) {
                            echo '<span class="weapons-list">' . $armas[$i] . '</span> y ';
                        } else {
                            echo '<span class="weapons-list">' . $armas[$i] . '</span>, ';
                        }
                    }
                }
                echo '<br>';
            }
            echo "<strong>¿Practica artes mágicas?:</strong> ". ($artes === "si" ? "✅ Sí" : "❌ No") . "<br>";
            echo '</div>';
        }

?>