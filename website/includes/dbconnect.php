<?php
function db_connect()
{
  // Define static connection variable, avoids connecting more than once 
  static $connection;

  // Check is database connection exists, if not connected
  if (!isset($connection)) {
    $demoPath = parse_ini_file('private/credentials.ini');
    $securePath = parse_ini_file('../../private/credentials.ini');
    // Load configuration as an array from .ini file
    $config = $demoPath;

    if ($config === false) {
      throw new Exception("credentials.ini file not found.");
    }
    $connection = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
  }

  // If connection was not successful, throw exception error
  if ($connection->connect_errno) {
    throw new RuntimeException('mysqli connection error: ' . $connection->connect_error);
  }
  return $connection;
}

function db_connect_for_db_setup()
{
  // Define static connection variable, avoids connecting more than once 
  static $connection;

  // Check is database connection exists, if not connected
  if (!isset($connection)) {
    $demoPath = parse_ini_file('private/credentials.ini');
    $securePath = parse_ini_file('../../private/credentials.ini');
    // Load configuration as an array from .ini file
    $config = $demoPath;

    if ($config === false) {
      throw new Exception("credentials.ini file not found.");
    }
    $connection = new mysqli($config['servername'], $config['username'], $config['password']);
  }

  // If connection was not successful, throw exception error
  if ($connection->connect_errno) {
    throw new RuntimeException('mysqli connection error: ' . $connection->connect_error);
  }
  return $connection;
}
?>