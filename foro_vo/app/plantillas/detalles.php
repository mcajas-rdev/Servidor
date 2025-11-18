<?php 
    function cont_let($comentario){
            if (!empty($comentario)){
                $letra = '';
                $numero_letras = [];
                $letraMasRepetida = '';
                $maxRecuento = 0;
                $length = strlen($comentario);
                for ($i=0; $i < $length; $i++) { 
                    $letra = $comentario[$i];
                    if ($letra !== ' ' && $letra !== "\n" && $letra !== "\t") {
                        if (isset($numero_letras[$letra])) {
                            $numero_letras[$letra]++;
                        } else {
                            $numero_letras[$letra] = 1;
                        }
                    }
                }
            
                foreach ($numero_letras as $letra => $recuento) {
                    if ($recuento > $maxRecuento) {
                        $maxRecuento = $recuento;
                        $letraMasRepetida = $letra;
                    }
                }
                return $letraMasRepetida;
            }else{
                return "No se ha podido detectar letra";
            }
             
    }

    function cont_pal($comentario){

        if (!empty($comentario)){
            $palabra='';
            $num_pal = [];
            $pal_rep = '';
            $max = 0;
            $length = strlen($comentario);


            for ($i=0; $i < $length ; $i++) {

                $palabra = ''; 
                while ( $i < $length && $comentario[$i] !== ' ' && $comentario[$i] !== '.' && $comentario[$i] !== ',' ) {
                    $palabra .= $comentario[$i];
                    $i++;
                }
                if (!empty($palabra)) {
                    
                    if ( isset($num_pal[$palabra]) ) {
                        $num_pal[$palabra] ++;
                    }else{
                        $num_pal[$palabra] = 1;
                    }

                }
            }

            foreach ($num_pal as $word => $times) {

                if ($times > $max){
                    $max = $times;
                    $pal_rep = $word;
                }

            }

            return $pal_rep;
        }

    }
?>

<div>
<b> Detalles:</b><br>
<table>
<tr><td>Longitud:          </td><td><?= strlen($_REQUEST['comentario']) ?></td></tr>
<tr><td>Nº de palabras:    </td><td> <?= str_word_count($_REQUEST['comentario']) ?> </td></tr>
<tr><td>Letra + repetida:  </td><td> <?= cont_let($_REQUEST['comentario'])?> </td></tr> 

<tr><td>Palabra + repetida:</td><td><?= cont_pal($_REQUEST['comentario'])?></td></tr>
</table>
</div>

