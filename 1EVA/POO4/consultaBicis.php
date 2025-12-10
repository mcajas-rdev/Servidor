<?php
    include_once 'BiciElectrica.php';

    $tabla = cargarbicis();

   $biciRecomendada = null;
    if (!empty($_GET['coordx']) && !empty($_GET['coordy'])) {
        $biciRecomendada = bicimascercana($_GET['coordx'], $_GET['coordy'], $tabla);
    }

    function cargarbicis() {
        // Primero tenemos que abrir el archivo y almacenarlo en una variable
        $file = fopen("Bicis.csv", "r");

        $bicis = [];// creeamos el array donde se almcenaran todas las bicis

        // hacemos bucle while para leer linea a linea el csv
        while (($linea = fgetcsv($file)) !== false) {
            
            $bici = new Bicicleta(); // creamos objeto bici

            $bici->id = (int)$linea[0];
            $bici->coordx = (int)$linea[1];
            $bici->coordy = (int)$linea[2];
            $bici->bateria = (int)$linea[3];
            $bici->operativa = ($linea[4]==1); // metemos todas las propiedades de la bici en el objeto bici

            $bicis[] = $bici; // todas las bicis las metemos en el array de bicis
            
            
        }
        fclose($file); //cerramos el archivo

        return $bicis; // devolvemos el array de todas las bicis
    }

    function mostrartablabicis($bicis) {
        $msg = "<table> <tr> <th> ID </th> <th> CoordX </th> <th> CoordY </th> <th> Bateria </th> </tr>";
        foreach ($bicis as $obj => $value) {
            if ($value->operativa) {
                $msg .= "<tr> <td>". $value->id. "</td> <td>". $value->coordx. "</td> <td>". $value->coordy. "</td> <td>". $value->bateria. "% </td> </tr>";
            } 
        }
        $msg .= "</table>";

        return $msg;

    }
    /**
     * función para calcular la bicicleta mas cercana a las coordenadas introducidas por el usuario
     */
    function bicimascercana($x, $y, $bicis) {
        $distancia_min = 99999; // variable que almacena la distancia minima que ha obtenido de una bici a las coordenadas del usuario
        $bicimascercana = null; // el objeto bici que este mas cercano al usuario

        foreach ($bicis as $obj => $value) { // foreach para poder acceder a los objetos bici del array que los almacena
            if($value->operativa) { // si la value->operastiva === true (si esa bici esta operativa) pues se procede a calcular la distancia
                $distancia = $value->distancia($x, $y); // se almacena el calculo de la distancia en la variable distancia
                if ($distancia < $distancia_min) { // si la distancia obtenida de esa bici es menos a la distancia minima que tenemos se actualizan los valores
                    $distancia_min = $distancia; // distancia minima actualizada a la de la nueva bici
                    $bicimascercana = $value; // y ahora la bici mas cercana es esta misma bici
                }
            }
        }
        return $bicimascercana; // se devuelve la bici mas cercana obtenida
    }


?>
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>MOSTRAR BICIS OPERATIVAS</title>
<style>
table, th, td {
border: 1px solid black;
}
</style>

</head>

<body>
<h1> Listado de bicicletas operativas </h1>
<?= mostrartablabicis($tabla); ?>
<?php if (isset($biciRecomendada)) : ?>
<h2> Bicicleta disponible más cercana es <?= $biciRecomendada ?> </h2>
<button onclick="history.back()"> Volver </button>
<?php else : ?>
<h2> Indicar su ubicación: <h2>
<form>
Coordenada X: <input type="number" name="coordx"><br>
Coordenada Y: <input type="number" name="coordy"><br>
<input type="submit" value=" Consultar ">
</form>
<?php endif ?>
</body>

</html>
