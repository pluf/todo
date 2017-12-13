<?php 

return array(
    array(
        'app' => 'User',
        'regex' => '#^/api/user#',
        'base' => '',
        'sub' => include 'User/urls.php'
    ),
    array(
        'app' => 'Todo',
        'regex' => '#^#',
        'base' => '',
        'sub' => include 'Todo/urls.php'
    )
);