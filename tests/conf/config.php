<?php

// -------------------------------------------------------------------------
// Database Configurations
// -------------------------------------------------------------------------
$cfg = include 'sqlite.conf.php';

$cfg['test'] = true;
$cfg['debug'] = true;
$cfg['timezone'] = 'Europe/Berlin';
$cfg['installed_apps'] = array(
    'Pluf',
    'Todo'
);
$cfg['mimetype'] = 'text/html';
$cfg['app_base'] = '/testapp';
$cfg['url_format'] = 'simple';
$cfg['tmp_folder'] = '/tmp';
$cfg['middleware_classes'] = array(
    'Pluf_Middleware_Session',
    'User_Middleware_Session'
);
$cfg['secret_key'] = '5a8d7e0f2aad8bdab8f6eef725412850';

// -------------------------------------------------------------------------
// Template manager and compiler
// -------------------------------------------------------------------------
$cfg['templates_folder'] = array(
    dirname(__FILE__) . '/../templates'
);
$cfg['template_tags'] = array(
    'mytag' => 'Pluf_Template_Tag_Mytag'
);
$cfg['template_modifiers'] = array();

// -------------------------------------------------------------------------
// Logger
// -------------------------------------------------------------------------
$cfg['log_level'] = 'error';
$cfg['log_delayed'] = false;
$cfg['log_formater'] = '\Pluf\LoggerFormatter\Plain';
$cfg['log_appender'] = '\Pluf\LoggerAppender\Console';


// -------------------------------------------------------------------------
// Tenants
// -------------------------------------------------------------------------

// multitenant

// -------------------------------------------------------------------------
// user
// -------------------------------------------------------------------------

return $cfg;
