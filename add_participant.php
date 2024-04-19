<?php
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

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Handle form submission
echo "Applicatation posted successfully!";
?>
<br>
<a href="../index.html">Main page</a>
<?php 
$conn = null;
?>
