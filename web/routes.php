<?php
include "TemplateEngine.php";
session_start();

$template = new TemplateEngine(__DIR__ . '/views');

$routes = [
    ''=>'persons',
    'addperson'=>'addperson',
    'logs'=>'logs',
    'person/{id}'=>'person',
    'person'=>'a'
];

function a() {
    header("location:../");
}

function persons() {
    global $template;
    echo $template->render('persons');
}

function person($id) {
    global $template;
    echo $template->render('person',$data=[$id]);
}

function addperson() {
    global $template;
    echo $template->render('addperson');
}


function logs() {
    global $template;
    echo $template->render('logs');
}





