<?php
require_once '../models/Event.php';

class EventController {
    private $eventModel;

    public function __construct($pdo) {
        $this->eventModel = new Event(pdo: $pdo);
    }

    public function showAllEvents(): void {
        $events = $this->eventModel->getAllEvents();
        require '../views/event_list.php';
    }

    public function showEventDetails($id): void {
        $event = $this->eventModel->getEventById($id);
        require '../views/event_detail.php';
    }

    public function createEvent(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $venue = $_POST['venue'];
            $date = $_POST['date'];
            $tickets = $_POST['tickets_available'];
            $price = $_POST['ticket_price'];

            $this->eventModel->createEvent($name, $description, $venue, $date, $tickets, $price);
            header('Location: /public/index.php');
        } else {
            require 'views/create_event.php';
        }
    }
}
?>