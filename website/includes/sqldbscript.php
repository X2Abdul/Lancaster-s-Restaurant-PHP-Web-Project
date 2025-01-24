<?php
require_once(__DIR__ . '/dbconnect.php');

function execute_sql_file($filename)
{
    // Read the SQL file
    $sql = file_get_contents($filename);
    if ($sql === false) {
        throw new Exception("Could not read file: $filename");
    }

    // Connect to the database
    $connection = db_connect_for_db_setup();
    $connection->begin_transaction();

    try {
        // Split and execute individual SQL statements
        $statements = array_filter(array_map('trim', explode(';', $sql)));
        foreach ($statements as $statement) {
            if (!empty($statement) && !$connection->query($statement)) {
                throw new Exception("Error executing SQL statement: " . $connection->error);
            }
        }
        $connection->commit();
    } catch (Exception $e) {
        $connection->rollback();
        throw $e;
    }


    // Close the connection
    $connection->close();
}

try {
    $demoFilePath = __DIR__ . '/../private/schemaSetup.sql';
    $secureFilePath = __DIR__ . '/../../../private/schemaSetup.sql';

    // Validate file paths
    if ($demoFilePath === false || $secureFilePath === false) {
        throw new Exception("Schema file not found or inaccessible.");
    }

    $sqlFilePath = $demoFilePath;
    execute_sql_file($sqlFilePath);

    echo "Database setup completed successfully.";
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
?>