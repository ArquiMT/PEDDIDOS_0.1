<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "peddidos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_FILES['croppedImage'])) {
    $imageData = file_get_contents($_FILES['croppedImage']['tmp_name']);

    // Insertar la imagen en la base de datos
    $stmt = $conn->prepare("INSERT INTO food (Picture) VALUE (?)");
    $stmt->bind_param("s", $imageData);

    if ($stmt->execute()) {
        echo "Imagen guardada con éxito.";
    } else {
        echo "Error al guardar la imagen.";
    }

    $stmt->close();
} else {
    echo "No se ha recibido ninguna imagen.";
}

$conn->close();
?>

