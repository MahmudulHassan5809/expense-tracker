<?php

declare(strict_types=1);

use Framework\{TemplateEngine, Database};
use App\Config\Paths;
use App\Services\ValidatorService;

return [
    TemplateEngine::class => fn () => new TemplateEngine(Paths::VIEW),
    ValidatorService::class => fn () => new ValidatorService(),
    Database::class => fn () => new Database("pgsql", [
        "host" => "localhost",
        "dbname" => "expense-tracker",
        "port" => "5432"
    ], "mahmudul", "152155809"),
];
