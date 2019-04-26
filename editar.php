<?php

include_once 'conexion.php';

$id = $_GET ['id'];
$color = $_GET['color'];
$descripcion = $_GET['descripcion'];

echo $id;
echo '<br>';
echo $color;
echo '<br>';
echo $descripcion;

//query sql
$editar = 'UPDATE color SET color=?,descriccion=? WHERE id=?';

$sentencia_editar = $mbd ->prepare($editar);
                            
$sentencia_editar -> execute(array($color,$descripcion,$id));

header('location:index.php');