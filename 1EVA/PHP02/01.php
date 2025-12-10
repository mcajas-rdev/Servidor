<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>
<body>
    <?php
    function maxmin(int $A, int $B, int &$C){
        if ($A > $B){
            $C = $A;
        }else if($A < $B){
            $C = $B;
        }else{
            $C = 0;
        }
    }
        $A = mt_rand(1,50);
        $B = mt_rand(1,50);
        $C = 0;
        echo "$A, $B <br>";
        maxmin($A,$B,$C);
        echo "$C";
    ?>

</body>
</html>