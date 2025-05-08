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
  <title>Tienda Belleza "Ponte Bella"</title>
   css  
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
      display: block;
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
      padding: 5px 10px;
      position: relative;
    }
    nav .menu li ul li a {
      color: #fff;
      font-weight: bold;
      line-height: 1.2;
    }

     /* Estilo PRODUCTOS */
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
      transition: transform 0.2s ease-in-out;
    }
    .producto:hover {
      transform: scale(1.03);
    }
    .producto img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
    }
    .producto button {
      background: #f06292;
      border: none;
      color: white;
      padding: 10px;
      border-radius: 5px;
      margin-top: 10px;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    .producto button:hover {
      background: #ec407a;
    }

    .carrito {
      position: fixed;
      right: 0;
      top: 0;
      width: 320px;
      background: #fff;
      height: 100%;
      box-shadow: -2px 0 8px rgba(0,0,0,0.2);
      padding: 20px;
      display: none;
      overflow-y: auto;
      z-index: 999;
    }
    .carrito h3 {
      margin-bottom: 15px;
      color: #f06292;
      text-align: center;
    }
    .carrito-item {
      background: #ffe6ec;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 10px;
      box-shadow: 0 1px 4px rgba(0,0,0,0.1);
    }
    .carrito-item span {
      flex: 1;
      font-size: 14px;
    }
    .carrito-item button {
      background: transparent;
      border: none;
      color: #e91e63;
      font-size: 18px;
      cursor: pointer;
    }
    
    #contadorCarrito {
    position: absolute;
    top: 10px;
    right: 10px;
    background: #e91e63;
    color: white;
    border-radius: 50%;
    padding: 2px 7px;
    font-size: 12px;
    font-weight: bold;
    box-shadow: 0 0 5px rgba(0,0,0,0.2);
    }

    .cerrar-carrito {
    position: absolute;
    top: 10px;
    left: 10px;
    background: #f06292;
    color: white;
    border: none;
    border-radius: 50%;
    width: 32px;
    height: 32px;
    font-size: 20px;
    cursor: pointer;
    z-index: 1001;
}
    #total {
      font-weight: bold;
      text-align: right;
      margin-top: 15px;
      font-size: 16px;
    }
    
    .toggle-carrito {
      position: fixed;
      top: 20px;
      right: 20px;
      background: #ffc0ca;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 50%;
      cursor: pointer;
      z-index: 1000;
      font-size: 23px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    .toast {
  position: fixed;
  bottom: 30px;
  right: 30px;
  background: #f06292;
  color: white;
  padding: 15px 20px;
  border-radius: 8px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.2);
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.4s ease, transform 0.4s ease;
  transform: translateY(20px);
  z-index: 1001;
}
.toast.show {
  opacity: 1;
  transform: translateY(0);
}
.modal {
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background-color: rgba(0,0,0,0.5);
  display: none;
  justify-content: center;
  align-items: center;
  z-index: 1002;
}
.modal-content {
  background: white;
  padding: 20px;
  border-radius: 10px;
  text-align: center;
  max-width: 350px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.3);
  position: relative;
}
.carrito-modal-content {
  background: white;
  padding: 20px;
  border-radius: 10px;
  text-align: center;
  max-width: 350px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.3);
  position: relative;
}
.modal-botones {
  display: flex;
  justify-content: space-around;
  margin-top: 15px;
}
.modal-botones button {
  padding: 8px 16px;
  border: none;
  border-radius: 5px;
  font-weight: bold;
  cursor: pointer;
}
.modal-botones button:first-child {
  background-color: #f06292;
  padding: 10px 10px;
  color: white;
}
.modal-botones button:last-child {
  background-color: #ccc;
  padding: 10px 10px;
}

    @media (max-width: 600px) {
      nav {
        flex-direction: column;
        align-items: start;
      }
      .carrito {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <header>
    <h1>Beautiful Girl</h1>
    <p>Encuentra tus productos de belleza favoritos en tu tienda favorita</p>
  </header>
  <nav>
    <ul class="menu">
      <li><a href="#">Inicio</a></li>
      <li>
        <a href="#">Categorías</a>
        <ul>
          <li><a href="maquillaje.html" target="_blank">Maquillaje</a></li>
          <li><a href="facial.html" target="_blank">Cuidado Facial</a></li>
          <li><a href="fragancias.html" target="_blank">Fragancias</a></li>
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

  <button class="toggle-carrito" onclick="mostrarCarrito()">🛒<span id="contadorCarrito">0</span></button>

  <div class="productos">
    <!-- Productos -->
    <div class="producto">
      <img src="base.jpg" alt="Base">
      <h3>Base L'Oréal</h3>
      <p>S/ 29.90</p>
      <button onclick="agregarProducto('Base L\'Oréal', 29.90)">Agregar</button>
    </div>

    <div class="producto">
      <img src="labial.jpg" alt="Labial">
      <h3>Labial Mate</h3>
      <p>S/ 8.50</p>
      <button onclick="agregarProducto('Labial Mate', 8.50)">Agregar</button>
    </div>
    <div class="producto">
      <img src="polvo.jpg" alt="Polvo Compacto">
      <h3>Polvo Compacto</h3>
      <p>S/ 22.00</p>
      <button onclick="agregarProducto('Polvo Compacto', 22.00)">Agregar</button>
    </div>

    <div class="producto">
      <img src="labial2.jpeg" alt="Labial">
      <h3>Labial mate fucsia</h3>
      <p>S/ 15.00</p>
      <button onclick="agregarProducto('Labial mate fucsia', 15.00)">Agregar</button>
    </div>

    <div class="producto">
      <img src="sombra de ojos.jpeg" alt="Sombras">
      <h3>Sombras de ojos multicolor</h3>
      <p>S/ 13.50</p>
      <button onclick="agregarProducto('Sombras de ojos multicolor', 13.50)">Agregar</button>
    </div>

    <div class="producto">
      <img src="rubor.jpeg" alt="Rubor">
      <h3>Rubor de diferentes tonos</h3>
      <p>S/ 15.00</p>
      <button onclick="agregarProducto('Rubor', 15.00)">Agregar</button>
    </div>
    
    <div class="producto">
      <img src="mascara_pestañas.jpeg" alt="Mascara de pestañas">
      <h3>Mascara a prueba de agua</h3>
      <p>S/ 21.90</p>
      <button onclick="agregarProducto('Mascara a prueba de agua', 21.90)">Agregar</button>
    </div>
  </div>

  <div id="carrito" class="modal">
    <div class="carrito-modal-content">
      <button class="cerrar-carrito" onclick="cerrarCarrito()">✖</button>
      <h3>🛍 Tu carrito</h3>
      <div id="listaCarrito"></div>
      <p id="total">Total: S/ 0.00</p>
    </div>
  </div>

  <div id="toast" class="toast">Producto agregado</div>

  <div id="confirmacionModal" class="modal">
    <div class="modal-content">
      <p>¿Estás seguro que deseas eliminar este producto del carrito?</p>
      <div class="modal-botones">
        <button onclick="confirmarEliminacion()">Eliminar</button>
        <button onclick="cancelarEliminacion()">Cancelar</button>
      </div>
    </div>
  </div>
  

  <script>
    
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
  
  function agregarProducto(nombre, precio) {
  let productoExistente = carrito.find(p => p.nombre === nombre);

  if (productoExistente) {
    productoExistente.cantidad += 1;
    productoExistente.precioTotal = productoExistente.precio * productoExistente.cantidad;
  } else {
    carrito.push({ nombre, precio, cantidad: 1, precioTotal: precio });
  }

  guardarCarrito();
  mostrarToast(`${nombre} agregado al carrito`);

  if (document.getElementById("carrito").style.display === "block") {
    mostrarCarrito(); // actualizar si el carrito está abierto
  }
}
    function mostrarCarrito() {
      const lista = document.getElementById("listaCarrito");
      const totalDiv = document.getElementById("total");
      lista.innerHTML = "";
      let total = 0;

      if (carrito.length === 0) {
    // Si el carrito está vacío, muestra mensaje
    lista.innerHTML = `<p style="text-align:center; color: #666; font-style: italic;">
      Tᴜ ᴄᴀʀʀɪᴛᴏ ᴇsᴛᴀ́ ᴠᴀᴄɪ́ᴏ 😞
    </p>`;
    totalDiv.textContent = ""; // No mostrar total
  } else {
    // Si hay productos, muestra la lista y total
      carrito.forEach((item, i) => {
        total += item.precioTotal;
        lista.innerHTML += `
          <div class="carrito-item">
            <span>${item.nombre} x${item.cantidad}</span>
            <span>S/ ${item.precioTotal.toFixed(2)}</span>
            <button onclick="eliminar(${i})">❌</button>
          </div>
        `;
      });

      totalDiv.textContent = `Total: S/ ${total.toFixed(2)}`;
    }
      document.getElementById("carrito").style.display = "flex";
    }

    function cerrarCarrito() {
      document.getElementById("carrito").style.display = "none";
    }

    function guardarCarrito() {
      localStorage.setItem('carrito', JSON.stringify(carrito));
    }
    function mostrarToast(mensaje) {
  const toast = document.getElementById("toast");
  toast.textContent = mensaje;
  toast.classList.add("show");

  setTimeout(() => {
    toast.classList.remove("show");
  }, 2500);
}
let indiceAEliminar = null;

function eliminar(indice) {
  indiceAEliminar = indice;
  document.getElementById("confirmacionModal").style.display = "flex";
}

function confirmarEliminacion() {
  if (indiceAEliminar !== null) {
    carrito.splice(indiceAEliminar, 1);
    guardarCarrito();
    mostrarCarrito();
    indiceAEliminar = null;
  }
  document.getElementById("confirmacionModal").style.display = "none";
}

function cancelarEliminacion() {
  indiceAEliminar = null;
  document.getElementById("confirmacionModal").style.display = "none";
}

  </script>
</body>
</html>
