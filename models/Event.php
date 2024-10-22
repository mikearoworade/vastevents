<?php
require_once '../config/database.php';

class Event {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllEvents() {
        $stmt = $this->pdo->query("SELECT * FROM events ORDER BY date ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEventById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM events WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createEvent($name, $description, $venue, $date, $tickets, $price) {
        $stmt = $this->pdo->prepare("INSERT INTO events (name, description, venue, date, tickets_available, ticket_price) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$name, $description, $venue, $date, $tickets, $price]);
    }
    
    // Additional methods: updateEvent, deleteEvent, etc.
}
?>