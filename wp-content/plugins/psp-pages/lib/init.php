<?php
$deps = array(
    'controllers/pages',
    'models/pages',
    'views/admin',
    'views/projects'
);

foreach( $deps as $dep ) include_once( $dep . '.php' );
