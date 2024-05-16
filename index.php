<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Image Cropper</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
    <link rel="stylesheet" href="stylespicture.css">
    <link rel="stylesheet" href="stylemenu.css">
    <link rel="stylesheet" href="menufood.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="menupicture.css">
</head>
<body>
<header><button id="menu-btn">☰</button><button id="agree-btn">+</button></header>
<div id="menu-panel">
</div>

<div id="agree-panel">
  <div id="form-container">
    <form id="imgfood"></form>
    <button id="imgcamera" class="btn btn-secondary"> </button>
  </div>
  <form method="POST">
    <p>NOMBRE DEL PRODUCTO</p>
    <input type="text" name="FoodName" placeholder="Nombre" class="rinput">
    <p>CATEGORIA</p>
    <select name="Categoria" class="rinput">
        <option value="Refrigerador">Refrigerador</option>
        <option value="Dulcería">Dulcería</option>
        <option value="Estanteria">Estanteria</option>
        <option value="Comida">Comida</option>
    </select>
    <p>PRECIO</p>
    <input type="number" name="Precio" placeholder="Precio" class="rinput">
    <button type="submit" name="agree-food" id="agree-food">AGREGAR PRODUCTO</button>
  </form>
</div>
<form method="POST" class="form">
  <div class="input-group">
    <input type="text" name="searcher" placeholder="Buscar producto" class="rounded-input">
    <button type="submit" name="search-tbn" class="button">
      <img src="https://cdn.icon-icons.com/icons2/2024/PNG/512/searcher_magnifyng_glass_search_locate_find_icon_123813.png" id="searchicon">
    </button>
  </div>
</form>

<div id="menu-picture">
<div class="container mt-5">
    <div class="cropper-container">
      <img id="croppedImage" src="" alt="Cropped Image">
    </div>
    <button id="cropButton" class="btn btn-primary">GUARDAR</button>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script src="scriptpicture.js"></script>
    <script src="script.js"></script>
</body>
  <?php
    include("foods.php");
  ?>
</html>