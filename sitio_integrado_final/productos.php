<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

include("conexion.php");
$resultado = mysqli_query($conn, "SELECT * FROM productos");
?>

<h2>Bienvenido, <?php echo $_SESSION["usuario"]; ?> | <a href="logout.php">Cerrar sesión</a></h2>
<h3>Catálogo de productos</h3>
<div style="display: flex; flex-wrap: wrap;">
    <?php while ($producto = mysqli_fetch_assoc($resultado)): ?>
        <div style="margin: 15px; border: 1px solid #ccc; padding: 10px; width: 200px;">
            <img src="img/<?php echo $producto['imagen']; ?>" width="100%" alt="">
            <h4><?php echo $producto['nombre']; ?></h4>
            <p><?php echo $producto['descripcion']; ?></p>
            <strong>S/ <?php echo $producto['precio']; ?></strong>
        </div>
    <?php endwhile; ?>
</div>
