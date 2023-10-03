<?php

// Helper functions to find models, views and controllers

function app($path): string
{
    return BASE_DIR . "app/$path";
}

function view($path): string
{
    return BASE_DIR . "views/$path";
}

function model($path): string
{
    return BASE_DIR . "models/$path";
}

function controller($path): string
{
    return BASE_DIR . "controllers/$path";
}

function config($path): string
{
    return BASE_DIR . "config/$path";
}