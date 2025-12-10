<?php
function usuarioOk($usuario, $contraseña) :bool {
   
   $length = strlen($usuario);
   
   if ($length < 8) {
      return false;
   }
   
   $pswd = "";
   for ($i=$length-1 ; $i >= 0 ; $i--) { 
      $pswd .= $usuario[$i]; 
   }
   return $contraseña === $pswd; 
}
