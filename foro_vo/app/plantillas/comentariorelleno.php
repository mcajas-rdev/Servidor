<div>
<form name='mensaje' method="POST">
Tema<br>
 <input type="text" name="tema" size=30 
   value="<?=(isset($_REQUEST['tema']))?filtrar($_REQUEST['tema']):''?>" ><br>
Comentario: <br>
<textarea name="comentario" rows="4" cols="50">
<?= isset($_REQUEST['comentario']) ? filtrar($_REQUEST['comentario']) : '' ?>
</textarea>
<br><br>
<input type="submit" name="orden" value="Detalles">
<input type="submit" name="orden" value="Nueva opinión">
<input type="submit" name="orden" value="Terminar">
</form>
</div>

<?php

  function filtrar($str){
    $filtered = '';
    $filtered = trim($str ?? '');
    $filtered = strip_tags($filtered ?? '');
    $filtered = htmlspecialchars($filtered, ENT_QUOTES, 'UTF-8');
    return $filtered;
}

?>
