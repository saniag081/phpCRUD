<?php

    include_once 'conexion.php';

    $leer = 'SELECT * FROM color';//sentencia SQL

    //guardar conexion
    $gsent = $mbd -> prepare($leer);
    $gsent -> execute();
    
    // devolver array 
    $rest = $gsent-> fetchAll();

    var_dump($rest);
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

        <div class="container">

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

    </body>
  </html>
        