<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fragancias </title>
</head>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fragancias - Beautiful Girl</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #fef2f4;
      color: #333;
    }
    header {
      background: #f06292;
      padding: 20px;
      color: #fff;
      text-align: center;
    }
    nav {
      background: #ffb6c1;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      padding: 10px 20px;
    }
    nav .menu {
      display: flex;
      gap: 15px;
    }
    nav .menu li {
      list-style: none;
      position: relative;
    }
    nav .menu li a {
      text-decoration: none;
      color: #fff;
      font-weight: bold;
      padding: 10px;
    }
    nav .menu li ul {
      position: absolute;
      display: none;
      background: #ffc0cb;
      border-radius: 5px;
      top: 40px;
      left: 0;
    }
    nav .menu li:hover ul {
      display: block;
    }
    nav .menu li ul li {
      padding: 10px;
    }
    .productos {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      padding: 20px;
    }
    .producto {
      background: #fff;
      border-radius: 10px;
      padding: 15px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      text-align: center;
    }
    .producto button {
      background: #f06292;
      border: none;
      color: white;
      padding: 10px;
      border-radius: 5px;
      margin-top: 10px;
      cursor: pointer;
    }
    .producto img {
      width: 14%;
      height: 150px;
      object-fit: cover;
      border-radius:10 px;
    }
  </style>
</head>
<body>
  <header>
    <h1>Beautiful Girl</h1>
    <p>Encuentra tus productos de belleza favoritos en la sección de Fragancias</p>
  </header>
  <nav>
    <ul class="menu">
      <li><a href="index.html">Inicio</a></li>
      <li>
        <a href="#">Categorías</a>
        <ul>
          <li><a href="#">Maquillaje</a></li>
          <li><a href="#">Cuidado Facial</a></li>
          <li><a href="fragancias.html">Fragancias</a></li>
        </ul>
      </li>
      <li><a href="#">Ofertas</a>
        <ul>
          <li><a href="#">Promociones</a></li>
          <li><a href="#">Descuentos</a></li>
        </ul>
      </li>
      <li><a href="https://wa.me/qr/BT4ELWJXAJHSI1">Contacto</a></li>
    </ul>
  </nav>

  <div class="productos">
    <div class="producto">
      <img src="o.32695.jpg.crdownload" alt="Perfume Victoria Secret">
      <h3>Perfume Victoria Secret</h3>
      <p>S/ 69.90</p>
      <button onclick="agregarProducto('perefume victoria secret', 35.30)">Agregar</button>

      <div class="producto">
        <img src="26801lf_1.webp" alt="Festival Vibes for Her Eau de Parfum 100 ml">
        <h3>Perfume Victoria Secret</h3>
        <p>S/ 57.90</p>
        <button onclick="agregarProducto('perfume victoria secret', 48.90)">Agregar</button>

    </div>
  </div>

</body>
</html>
