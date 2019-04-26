<?php

    include_once 'conexion.php';

    $leer = 'SELECT * FROM color';//sentencia SQL

    //guardar conexion
    $gsent = $mbd -> prepare($leer);
    $gsent -> execute();
    
    // devolver array 
    $rest = $gsent-> fetchAll();

    //var_dump($rest);

    //agregar
    if($_POST){

        $colores = $_POST['color'];
        $decripcion = $_POST['descripcion'];

        $insertar = 'INSERT INTO color (color,descriccion) VALUES (?,?)';//sentencia sql

        $sentenica_agregar = $mbd -> prepare($insertar);
        $sentenica_agregar -> execute(array($colores,$decripcion));

        //cerrar conexion
        $mbd = null;
        $sentenica_agregar = null;

        //redireccion
        header('location:index.php');
    }

if($_GET){

    $id_unico = $_GET['id'];
    $leer_unico = 'SELECT * FROM color WHERE id=?';//sentencia SQL

    //guardar conexion
    $gsent_unico = $mbd -> prepare($leer_unico);
    $gsent_unico -> execute(array($id_unico));
    $rest_unico = $gsent_unico->fetch();

    //cerrar conecion
    $mbd = null;
    $gsent_unico = null;

    //var_dump($rest_unico);
}


?>

  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>

        <div class="container section">
            <div class="row section container">
            <div class="col s6">
                <div>
                    <?php  
                        // recorer array inicio
                         foreach ($rest as $data):
                    ?>
                <div class="card-panel <?php echo $data['color'] ?>">
                            <!-- agregar id a la url-->
                <a href="index.php?id=<?php echo $data['id'] ?>">            
                    <i class="material-icons">border_color</i>
                </a>
                        
                <a href="eliminar.php?id=<?php echo $data['id'] ?>">
                    <i class="material-icons">delete</i>
                </a>
            
                    <?php echo $data['color'] ?>
                    -
                    <?php echo $data['descriccion'] ?>

                </div>

                <?php endforeach; ?>

                </div>
            </div>

                <div class="col s6">
                <div class="container">
                        <?php if(! $_GET): ?>
                        <form class="container section" method="POST">
                            <h2>Agregar elementos</h2>
                            <input type="text" name="color" placeholder="color">
                            <input type="text" name="descripcion" placeholder="descripcion">
                            <button class="btn">agregar</button>                        
                        </form>
                        <?php endif ?>
                </div>  

                            <!--editar elemento-->
                <div class="container">
                      <?php if( $_GET): ?>
                        <form class="container section" method="GET" action="editar.php">
                            <h2>editar elementos</h2>

                            <input type="text" name="color" value=" <?php echo $rest_unico['color']  ?> ">

                            <input type="text" name="descripcion" placeholder="descripcion" 
                            value=" <?php echo $rest_unico['descriccion']  ?> ">
                            <!--oculto-->
                            <input type="hidden" value="<?php echo $rest_unico['id'] ?>" name="id">
                            <button class="btn">editar</button>                        
                        </form>
                        <?php endif ?>
                </div>               
            </div>

        </div>
        </div>

    </body>
  </html>
        
<?php 

//cerrar conexion
$mbd = null;
$gsent = null;

?>
