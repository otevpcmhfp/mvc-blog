<?php

interface BaseRepositoryInterface
{
    function prepare(string $queryString, array $bindings = []): false|PDOStatement;
    function queryAll(string $queryString, array $bindings = []): false|array;
    function querySingle(string $queryString, array $bindings = []);
    function execute(string $queryString, array $bindings = []): bool;
}
