<?php
session_start();
// sync date
date_default_timezone_set('Europe/Athens');
// Connect to your MySQL database using PDO (replace these values with your actual database credentials)
require 'conn.php';

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $name = $_POST["first_name"];
    $surname = $_POST["second_name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $description = $_POST["desc"];

    try {
        // Count the number of rows in the participant table
        $query = "SELECT MAX(id ) FROM participant ";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $count_participant_id = $stmt->fetchColumn();

        // Insert a new participant
        $query = $conn->prepare("INSERT INTO `participant`(`id`, `surname`, `name`, `phone`, `email`, `description`) VALUES (:id, :surname, :name, :phone, :email, :description)");
        $count_participant_id = $count_participant_id + 1;
        $query->bindParam(':id', $count_participant_id);
        $query->bindParam(':surname', $surname);
        $query->bindParam(':name', $name);
        $query->bindParam(':phone', $phone);
        $query->bindParam(':email', $email);
        $query->bindParam(':description', $description);
        $query->execute();

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    try {
        // Relate the participant with the event that he/she will participate
        $event_id = $_SESSION["event_id"];
        $date = date('Y-m-d');
        $query = $conn->prepare("INSERT INTO `participating_events`(`participantID`, `eventID`, `date`) VALUES (:participant_id, :event_id, :date);");
        $query->bindParam(':participant_id', $count_participant_id);
        $query->bindParam(':event_id', $event_id);
        $query->bindParam(':date', $date);
        $query->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Handle form submission
include "redirect.html"
?>
<br>
<a href="/takeover-corfuland/curtural-events.php">Events page</a>
<?php 
$conn = null;
?>
