<?php
session_start();

// Manejo de la sesión con dos valores
// 'cliente' => nombre del cliente
// 'pedidos' => array asociativo fruta => cantidad
if (!isset($_SESSION['pedidos'])) {
    $_SESSION['pedidos'] = [];
}

// Nuevo cliente: anoto en la sesión su nombre y creo su tabla de pedidos vacía
if (isset($_GET['cliente'])) {
    // Solo si el cliente es nuevo o ha cambiado, reinicio los pedidos
    if (!isset($_SESSION['cliente']) || $_SESSION['cliente'] !== $_GET['cliente']) {
        $_SESSION['cliente'] = $_GET['cliente'];
        $_SESSION['pedidos'] = [];
    }
}

// No hay definido un cliente todavía en la sesión 
if (!isset($_SESSION['cliente'])) {
    require_once 'bienvenida.php';
    exit(); // esto se coloca para que no muestre nada más, solo la bienvenida
}

// Proceso las acciones 
if (isset($_POST["accion"])) {
    $fruta = $_POST["fruta"];
    $cantidad = (int) $_POST["cantidad"];

    switch (trim($_POST["accion"])) {
        case "Anotar":
            // Actualizo la tabla de pedidos en la sesión
            if (isset($_SESSION['pedidos'][$fruta])) {
                $_SESSION['pedidos'][$fruta] += $cantidad;
            } else {
                $_SESSION['pedidos'][$fruta] = $cantidad;
            }
            break;

        case "Anular":
            // Elimino una fruta específica del pedido
            unset($_SESSION['pedidos'][$fruta]);
            break;

        case "Terminar":
            // Destruyo la sesión y vuelvo a la página de despedida
            $compraRealizada = htmlTablaPedidos();
            require 'despedida.php';
            session_write_close();
            session_destroy();
            exit();
    }
}

$compraRealizada = htmlTablaPedidos();
require_once 'compra.php';


// Función auxiliar que genera una tabla HTML a partir de la tabla de pedidos
function htmlTablaPedidos(): string
{
    if (empty($_SESSION['pedidos'])) {
        return '<p>No se ha registrado ningún pedido todavía.</p>';
    }

    $msg = '<table border="1" cellpadding="5">';
    $msg .= '<tr><th>Fruta</th><th>Cantidad</th></tr>'; 
    foreach ($_SESSION['pedidos'] as $fruta => $cantidad) {
        $msg .= '<tr><td>' . htmlspecialchars($fruta) . '</td><td>' . htmlspecialchars($cantidad) . '</td></tr>';
    }
    $msg .= '</table>';
    return $msg;
}
?>
