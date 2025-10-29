
<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
        <title>Forma de pago</title> 

        <style>
            img{
                width:50px;
                height:30px;
            }
        </style>
    </head> 
    <body> 
        <center> 
	 <H2> <?php echo $msg; ?> </H2> </br> 
           <?php echo $img; ?>
         <h2>SELECCIONE UNA NUEVA TARJETA DE CREDITO </h2><br> 
         <a href='index.php?nuevatarjeta=cashu'><img  src='../imagenes/cashu.png' /></a>&ensp; 
         <a href='index.php?nuevatarjeta=cirrus'><img  src='../imagenes/cirrus.png' /></a>&ensp; 
         <a href='index.php?nuevatarjeta=DCI'><img  src='../imagenes/DCI.png' /></a>&ensp; 
         <a href='index.php?nuevatarjeta=mastercard'><img  src='../imagenes/mastercard.png'/></a>&ensp; 
         <a href='index.php?nuevatarjeta=paypal'><img  src='../imagenes/paypal.png' /></a>&ensp; 
         <a href='index.php?nuevatarjeta=visa'><img  src='../imagenes/visa.png' /></a>&ensp; 
         <a href='index.php?nuevatarjeta=visaElectron'><img  src='../imagenes/visaElectron.png'/></a>  

        </center> 
    </body> 
</html>