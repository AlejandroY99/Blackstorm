<?php
// Datos de conexión a la BD
$host = "44.33.14.14";  // Cambia esto según sea necesario
$usuario = "root";
$contraseña = "E9Qc6vrE9y8F9iL";  // Nunca expongas contraseñas en código público
$base_datos = "tienda";

// Crear la conexión
$conn = new mysqli($host, $usuario, $contraseña, $base_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$ordenCompra = $_POST["ordenCompra"];
$seccion = $_POST["seccion"];
$modelo = $_POST["modelo"];
$descripcion = $_POST["descripcion"];
$fechaInicio = $_POST["fechaInicio"];
$fechaCancelacion = $_POST["fechaCancelacion"];
$piezas = $_POST["piezas"];
$montoPedido = $_POST["montoPedido"];
$cantidadEntregada = $_POST["cantidadEntregada"];
$cantidadFaltante = $_POST["cantidadFaltante"];
$proveedor = $_POST["proveedor"];
$estatus = $_POST["estatus"];
$fechaCitar = $_POST["fechaCitar"];
$fechaCita = $_POST["fechaCita"];
$numCita = $_POST["numCita"];
$horaCita = $_POST["horaCita"];

// Preparar consulta SQL
$sql = "INSERT INTO ordenes_compra (ordenCompra, seccion, modelo, descripcion, fechaInicio, fechaCancelacion, piezas, montoPedido, cantidadEntregada, cantidadFaltante, proveedor, estatus, fechaCitar, fechaCita, numCita, horaCita) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssidiissssss", 
    $ordenCompra, $seccion, $modelo, $descripcion, $fechaInicio, $fechaCancelacion, 
    $piezas, $montoPedido, $cantidadEntregada, $cantidadFaltante, $proveedor, 
    $estatus, $fechaCitar, $fechaCita, $numCita, $horaCita
);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Registro guardado correctamente.";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
