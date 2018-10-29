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
    }
// call the action
    $controller->{$action}();
}

$controllers = [
    'pages' => ['home','error'],
    'posts' => ['index','show','prepare_edit', 'prepare_insert']
];


if (!isset($controller, $controllers) || (!isset($action,$controllers[$controller])) )
    {
        call('pages', 'error');
    }
 else {
    call($controller, $action);
}
