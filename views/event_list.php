<!DOCTYPE html>
<html lang="en">
<head>
    <title>Event List</title>
</head>
<body>
    <h1>Upcoming Events</h1>
    <ul>
        <?php foreach ($events as $event): ?>
            <li>
                <a href="event_detail.php?id=<?= $event['id'] ?>"><?= htmlspecialchars(string: $event['name']) ?></a>
                - <?= htmlspecialchars(string: $event['date']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>