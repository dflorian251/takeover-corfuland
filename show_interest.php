<?php
session_start();
require "conn.php";
// Retrive the event id from the previous page
if (isset($_GET['id'])) {
    $event_id = $_GET['id'];
    $_SESSION["event_id"] = $event_id;
    session_write_close();
    $query = "SELECT `title` FROM events WHERE events.id = $event_id;";
    $stmt = $conn->prepare($query); 
    $stmt->execute(); 
    $r = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $result = $stmt->fetchAll();
}
foreach ($result as $row) {
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Δήλωσε ενδιαφέρον!</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/participant.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
        </style>
        
        <!-- NICE FORMS -->
        <link rel="stylesheet" href="node_modules/nice-forms.css/dist/nice-forms.css">
    </head>
    <body>
        <div class="form-container">
            <div class="page-header">
                <h2>ΔΗΛΩΣΕ ΕΝΔΙΑΦΕΡΟΝ</h2>
                <h4>ΓΙΑ ΤΗΝ ΕΚΔΗΛΩΣΗ</h4>
                <small>
                <?php
                    echo $row["title"];
                    }
                ?>
                </small>
            </div>
            <form class="nice-form-group" action="add_participant.php" method="post">
                <label for="first_name">Όνομα:</label>
                <input type="text" id="first_name" name="first_name" required><br>
                <br>
                <label for="first_name">Επώνυμο:</label>
                <input type="text" id="second_name" name="second_name" required><br>
                <br>
                <label for="phone">Τηλέφωνο:</label>
                <input type="tel" id="phone" name="phone" required><br>
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>
                <br>
                <label for="desc">Περιγραφή:</label>
                <textarea name="desc" rows="4" required></textarea><br>
                <br>
                <input type="submit" value="Υποβολή">
            </form>
        </div>
    </body>
</html>