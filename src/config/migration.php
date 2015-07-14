<?php
$dbconfig = require __DIR__.'/database.php';

return array(
  'colors' => true,
  'databases' => array(
    'dbserver1' => array(
      // PDO Connection settings.
      'database_dsn'      => "mysql:dbname={$dbconfig['database']};host={$dbconfig['host']}",
      'database_user'     => $dbconfig['username'],
      'database_password' => $dbconfig['password'],

      // schema version table
      'schema_version_table'    => 'schema_version',

      // directory contains migration task files.
      'migration_dir'           => '../migrations/'
    ),
  ),
);
