<?php

include __DIR__ .  "/src/Framework/Database.php";

use Framework\Database;

$db = new Database("pgsql", [
    "host" => "localhost",
    "dbname" => "expense-tracker",
    "port" => "5432"
], "mahmudul", "152155809");


echo "Connected to database";
