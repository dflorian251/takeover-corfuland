<?php 
// Connect to your MySQL database using PDO (replace these values with your actual database credentials)
require "../../conn.php" ;

try {
    $conn = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idToDelete = $_REQUEST['advert_id'];
        
        try {
            // Delete the category with the specified ID
            $query = $conn->prepare("DELETE FROM advert WHERE `advert`.`advert_id` = :idToDelete");
            $query->bindParam(':idToDelete', $idToDelete);
            $query->execute();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        
        echo "Advert deleted successfully!";
    }

    ?>
    <br>
    <a href="../index.html">Main page</a>
<?php 
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
