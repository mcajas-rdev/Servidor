<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados del Formulario</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .results-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 30px;
            width: 100%;
            max-width: 800px;
            margin: 20px 0;
        }

        .page-title {
            text-align: center;
            color: #2d3748;
            margin-bottom: 30px;
            font-size: 2em;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }

        .data-item {
            background: #f8fafc;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
        }

        .array-section {
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .array-title {
            color: #2d3748;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 1.2em;
        }

        .array-item {
            background: white;
            padding: 10px;
            margin: 5px 0;
            border-radius: 6px;
        }

        .back-button {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            margin-top: 20px;
            border: none;
            cursor: pointer;
            text-align: center;
        }

        .back-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .button-container {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="results-container">
        <h1 class="page-title">Resultados del Formulario</h1>
        
        <?php
        foreach ($_REQUEST as $eti => $val) {
            if ($eti == 'Ciudades') {
                echo('<div class="array-section">');
                echo('<div class="array-title">Ciudades:</div>');
                foreach ($val as $ciu => $cdp) {
                    switch ($cdp) {
                        case '28':
                            echo('<div class="array-item">');
                            print_r('Madrid ='.$cdp);
                            echo('</div>');
                            break;
                        case '17':
                            echo('<div class="array-item">');
                            print_r('Gerona='.$cdp);
                            echo('</div>');
                            break;
                        case '41':
                            echo('<div class="array-item">');
                            print_r('Sevilla ='.$cdp);
                            echo('</div>');
                            break;
                        
                        default:
                            echo('<div class="array-item">');
                            # code...
                            echo('</div>');
                            break;
                    }
                }
                echo('</div>');
            }else if ($eti == 'Idiomas') {
                echo('<div class="array-section">');
                echo('<div class="array-title">Idiomas:</div>');
                foreach ($val as $key => $idioma) {
                    echo('<div class="array-item">');
                    print_r($idioma);
                    echo('</div>');
                }
                echo('</div>');
            }else{
                echo('<div class="data-item">');
                print_r($eti.': '.$val);
                echo('</div>');
            }
        }
        ?>
    </div>
</body>
</html>