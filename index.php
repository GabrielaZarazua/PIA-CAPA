<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Imagenes/Lux-white.png" type="image/x-icon">
</head>
<body>
    <?php
    //index.php?controlador=?&accion=?
    if(!empty($_GET['controlador'])){
        $controlador = $_GET['controlador'];
    }else{
        $controlador = 'usuarios';
    }
    if(!empty($_GET['accion'])){
        $accion = $_GET['accion'];
    }else{
        $accion = 'login';
    }
    $controlador_path = 'controlador/'.$controlador.'_controlador.php';
    if(is_file($controlador_path)){
        require_once($controlador_path);
        $contrObj = new $controlador();
        $contrObj->$accion();
        require_once('vistas/'.$contrObj->vista.'.php');
    }else{
        throw new Exception('La página no existe');
    }
    ?>
   
</body>
</html>