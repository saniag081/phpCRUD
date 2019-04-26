<?php

include_once 'conexion.php';

$id = $_GET['id'];

//query
$eliminar = 'DELETE FROM color WHERE ID = ?';

$sentencia_eliminar = $mbd -> prepare($eliminar);

$sentencia_eliminar->execute(array($id));

//cerrar conexion
$mbd = null;
$sentencia_eliminar = null;

header('location:index.php');