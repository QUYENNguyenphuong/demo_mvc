<?php
function call($controller, $action)
{
    require_once('controllers/' . $controller . '_controller.php');

    switch ($controller) {
        case 'pages':
            $controller = new PageController();
            break;
        case 'posts':
            $controller = new PostsController();
            break;
        case 'register':
            $controller = new RegisterController();
            break;
    }
// call the action
    $controller->{$action}();
}
$controllers = [
    'pages' => ['home','error'],
    'posts' => ['index','show','prepare_edit', 'prepare_insert', 'prepare_delete'],
    'register' => ['index','sign_up','login','user','admin','pre_change_pass', 'change_password']
];

if (!isset($controller, $controllers) || (!isset($action,$controllers[$controller])) )
    {
        call('pages', 'error');
    }
 else {
    call($controller, $action);
}
