<?php

return (function () {
    /**
     * Libraries
     */
    foreach ([ 'lib', 'services' ] as $dir) {
        foreach (scandir(dirname(__DIR__) . "/app/{$dir}") as $file) {
            if (fnmatch('*.php', $file)) {
                require_once dirname(__DIR__) . "/app/{$dir}/" . $file;
            }
        }
    }

    /**
     * Start a Session
     */
    session(conf('session.path'), 1440);

    /**
     * Get Connection for Database (MySQLi)
     */
    connect(...array_values(conf('database'))) ?: exit;
    register_shutdown_function(function () {
        return close();
    });

    /**
     * Middlewares
     */
    $middlewares = [
        'auth.php',
        'csrfToken.php',
        'require.php'
    ];
    foreach ($middlewares as $file) {
        (require_once dirname(__DIR__) . '/app/middlewares/' . $file) ?: exit;
    }

    /**
     * Routes
     */
    foreach ([ 'web.php', 'api.php' ] as $route) {
        require_once dirname(__DIR__) . '/routes/' . $route;
    }
})();
