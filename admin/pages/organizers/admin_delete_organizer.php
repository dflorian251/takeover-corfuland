<?php
  require "../../../conn.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Delete Organizer</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />

    <!-- NICE FORMS -->
    <link rel="stylesheet" href="../../../node_modules/nice-forms.css/dist/nice-forms.css">
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <?php
        include "../../navbar.html"
      ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <?php
          include("../../sidebar.html");
        ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3> Delete Organizer </h3>
            </div>
            <form class="nice-form-group" action="../../admin_operations/delete_organizer.php" method="post">
              <label for="organizer_id">Organizers:</label>
              (id - title - contact name - contact surname)
              <select name="organizer_id" id="organizers" required>
              <?php
              try {
                  $query = "SELECT * FROM organizers;";
                  $stmt = $conn->prepare($query); 
                  // EXECUTING THE QUERY 
                  $stmt->execute(); 
                  $r = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                  // FETCHING DATA FROM DATABASE 
                  $result = $stmt->fetchAll();
                  // Populate the dropdown with organizer IDs
                  foreach ($result as $row){
                      echo "<option value=\"{$row['id']}\">{$row['id']} - {$row['title']} - {$row['contactName']} - {$row['contactSurname']}</option>";
                  }
              ?>
                </select>
                <br>
                <input type="hidden" name="_method" value="delete">
                <button type="submit">Delete Organizer</button>
            </form>
            <?php
            } catch(PDOException $e) {
                echo $e->getMessage();
            } 

            $conn = null;
            ?>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <?php
            include "../../footer.html";          
          ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>