<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <title>Nutrina | </title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'><link rel="stylesheet" href="style/estiloSidebar.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="jquery/jquery-3.7.1.min.js"></script>

</head>
<body>
    <div id="nav-bar">
        <input id="nav-toggle" type="checkbox"/>
        <div id="nav-header"><a id="nav-title" href="inicio.php"><i class="fab fa-codepen"></i>NUTRINA</a>
            <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
            <hr/>
        </div>
        <div id="nav-content">
            <div class="nav-button" onclick="window.location.href='productos.php'"><i class="fas fa-barcode"></i><span>Productos</span></div>

            <div class="nav-button"><i class="fas fa-steak"></i><span>Dieta</span></div>
            <div class="nav-button"><i class="fas fa-dumbbell"></i><span>Ejercicio</span></div>
            <hr/>
            <div class="nav-button" onclick="window.location.href='usuario.php'"><i class="fas fa-heart"></i><span>Perfil</span></div>
            <div class="nav-button" onclick="window.location.href='carrito.php'"><i class="fas fa-shopping-cart"></i><span>Carrito</span></div>

            <div class="nav-button" onclick="window.location.href='scriptsPHP/logout.php'"><i class="fas fa-user"></i><span>Salir</span></div>
            <hr/>
            <!-- <div class="nav-button"><i class="fas fa-gem"></i><span>Codepen Pro</span></div> -->
            <div id="nav-content-highlight"></div>
        </div>	
        <input id="nav-footer-toggle" type="checkbox"/>
        <div id="nav-footer">
            <div id="nav-footer-heading">
                <div id="nav-footer-avatar"><img src="https://gravatar.com/avatar/4474ca42d303761c2901fa819c4f2547"/></div>
                <div id="nav-footer-titlebox"><a id="nav-footer-title" href="https://codepen.io/uahnbu/pens/public" target="_blank"> <?php echo $_SESSION['nombre']; ?> </a><span id="nav-footer-subtitle"></span></div>
                <label for="nav-footer-toggle"><i class="fas fa-caret-up"></i></label>
            </div>
            <div id="nav-footer-content">
                <Lorem></Lorem>
            </div>
        </div>
    </div>

