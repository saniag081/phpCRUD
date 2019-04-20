<?php 

    $link = 'mysql:host=localhost;dbname=colores';
    $usuario = 'root';
    $pass = '';

    try{
        //conectarse a la base de datos
        $mbd = new PDO ($link,$usuario,$pass);
        
       /* foreach($mbd->query('SELECT * FROM  `color` ') as $fila) {
            print_r($fila);
        }*/
    } catch (PDOException $e) { //funcion de PDO error en pantalla
        print "¡Error!: " . $e->getMessage() . "<br/>";
        die();
    }
