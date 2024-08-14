<?php 
function getConnexion()
{
  $mysqli = new Mysqli('localhost:3307', 'root', '', 'tienda3');
  if($mysqli->connect_errno) exit('Error en la conexión: ' . $mysqli->connect_errno);
  $mysqli->set_charset('utf8');
  return $mysqli;
}

function getConnexionRecargas()
{
  $mysqli = new Mysqli('localhost:3307', 'root', '', 'recargas');
  if($mysqli->connect_errno) exit('Error en la conexión: ' . $mysqli->connect_errno);
  $mysqli->set_charset('utf8');
  return $mysqli;
}