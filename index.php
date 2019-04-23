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

        //redireccion
        header('location:index.php');
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
                <divc class="card-panel <?php echo $data['color'] ?>">
            
                    <?php echo $data['color'] ?>
                    -
                    <?php echo $data['descriccion'] ?>

                </div>

                <?php endforeach; ?>

                </div>
            </div>

                <div class="col s6">
                <div class="container">
                        <form class="container section" method="POST">
                            <h2>Agregar elementos</h2>
                            <input type="text" name="color" placeholder="color">
                            <input type="text" name="descripcion" placeholder="descripcion">
                            <button class="btn">agregar</button>                        
                        </form>
                </div>                
                </div>

            </div>
        </div>

    </body>
  </html>
        