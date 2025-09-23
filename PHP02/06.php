<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $numero = mt_rand(1,10);
    $contador = 0;
        for ($i=1; $i <= $numero ; $i++) { 
            for ($j=0; $j < 2 ; $j++) {
                for ($k=0; $k <4 ; $k++) {
                    if ($numero == 1){
                        if($k == 3){
                            echo "* <br>";
                        }else{
                            echo "*";
                        }
                    }else{
                        if($k==3){
                            echo "* ";
                        }else{
                            echo "*";
                        }   
                    }
                }
                 $contador++;
                if ($contador == $numero && $numero != 1){
                    echo "<br>";
                }
            }   
        }
        
    ?>
</body>
</html>