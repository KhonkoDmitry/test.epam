<?php
include 'controllers/FrontController.php';
//print_r($_POST);exit;
switch ($_POST['submit']) {
    case 'edit_worker':
        $controller = new FrontController();
        $controller->save($_POST);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        break;
    case 'create_worker':
        $controller = new FrontController();
        $controller->create($_POST);
//        header('Location: ' . $_SERVER['HTTP_REFERER']);
        header('Location: /?route=home');
        break;
    default :
        break;
}
