<?php

// Helper functions to find models, views and controllers

function app($path): void
{
    require BASE_DIR . "app/$path";
}

function view($path, $data = []): void
{
    extract($data);
    require BASE_DIR . "views/partials/header.php";
    require BASE_DIR . "views/$path.view.php";
    require BASE_DIR . "views/partials/footer.php";
}

function addModel($model): void
{
    require BASE_DIR . "models/{$model}Model.php";
}

function addRepository($repository): void
{
    require BASE_DIR . "db/{$repository}RepositoryInterface.php";
    require BASE_DIR . "db/{$repository}Repository.php";
}

function controller($path): string
{
    return BASE_DIR . "controllers/$path";
}

function config($path): void
{
    require BASE_DIR . "config/$path";
}

function css($path): string
{
    return "/css/$path";
}