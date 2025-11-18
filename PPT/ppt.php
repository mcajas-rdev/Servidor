<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piedra papel o tijera</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            font-size: 24px;
        }
        
        th, td {
            padding: 30px;
            text-align: center;
        }
        
        th {
        
            font-size: 28px;
        }
        
        .emoji {
            font-size: 80px;
        }
    </style>
</head>
<body>

    <h2>Piedra, papel o tijera</h2>

   <?php
    define ('PIEDRA1',  "&#x1F91C;");;
    define ('PIEDRA2',  "&#x1F91B;");
    define ('TIJERAS',  "&#x1F596;");
    define ('PAPEL',    "&#x1F91A;" );
    
    $jugador1 = mt_rand(1,3);
    $jugador2 = mt_rand(1,3);

    function ppt($eleccion, $jugador)
    {
        switch ($eleccion) {
        case 1:
            return $jugador === 1 ? PIEDRA1:PIEDRA2;
        
        case 2:
            return PAPEL;
            
        case 3:
            return TIJERAS;
            
        default:
            echo "El jugador no ha elegido nada";
            break;
    }
    }
    $eleccion1 = ppt($jugador1, 1);
    $eleccion2 = ppt($jugador2, 2);
    echo '<table>
        <tr>
        <th>Jugador 1</th> <th> </th> <th> Jugador 2</th>
        </tr>
        <tr>
            <td><div class="emoji">'. $eleccion1.'</div></td>
            <td> VS </td>
            <td><div class="emoji">'.$eleccion2.'</div></td>
        </tr>
    </table>';


    ?>

</body>
</html>