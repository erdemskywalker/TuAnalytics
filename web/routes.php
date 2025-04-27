<?php
include "TemplateEngine.php";
session_start();

$template = new TemplateEngine(__DIR__ . '/views');

$routes = [
    '' => 'index',
    'persons'=>'persons',
    'addperson'=>'addperson',
    'logs'=>'logs'
];


function index() {
    global $template;
    echo $template->render('index');
}
function persons() {
    global $template;
    echo $template->render('persons');
}

function addperson() {
    global $template;
    echo $template->render('addperson');
}


function logs() {
    global $template;
    echo $template->render('logs');
}





