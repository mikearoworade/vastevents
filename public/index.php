<?php
require_once '../config/database.php';
require_once '../controllers/EventController.php';

$controller = new EventController(pdo: $pdo);

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'list':
            $controller->showAllEvents();
            break;
        case 'details':
            if (isset($_GET['id'])) {
                $controller->showEventDetails(id: $_GET['id']);
            }
            break;
        case 'create':
            $controller->createEvent();
            break;
        default:
            $controller->showAllEvents();
            break;
    }
} else {
    $controller->showAllEvents();
}
