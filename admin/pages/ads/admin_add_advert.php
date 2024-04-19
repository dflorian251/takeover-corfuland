<?php
  require "../../../conn.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Advert</title>
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
    <link rel="stylesheet" href="../../../adverts_operations/style.css">

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
              <h3> Add Advert </h3>
            </div>
            <form class="nice-form-group" action="../../admin_operations/add_advert.php" method="post" enctype="multipart/form-data">
                <label for="advert_title">Advert Title:</label>
                <input type="text" id="advert_title" name="advert_title" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required pattern="^(2\d{9}|6\d{9})$"><br>

                <label for="show_contact_info">Show Contact Info:</label>
                <select name="show_contact_info" id="show_contact_info" required>
                  <option value="1">Phone</option>
                  <option value="2">Email</option>
                  <option value="3">Email & Phone</option>
                </select><br>

                <label for="advert_desc">Advert Description:</label>
                <textarea type="text" id="advert_desc" name="advert_desc"  style="height: 200px; width: 350px;" required></textarea><br>

                <label for="tag_id">Tag ID:</label>
                <select name="tag_id" id="tag_id" required>
                  <?php
                      $query = "SELECT * FROM tag";
                      $stmt = $conn->prepare($query); 
                      // EXECUTING THE QUERY 
                      $stmt->execute(); 
                      $r = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                      // FETCHING DATA FROM DATABASE 
                      $result = $stmt->fetchAll();
                      // Populate the dropdown with organizer IDs
                      foreach ($result as $row){
                          echo "<option value=\"{$row['id']}\">{$row['id']} - {$row['name']}</option>";
                      }
                  ?>
                  </select><br>

                
                  <label for="image">Advert Image:</label>
                  <input type="file" name="image" accept="image/*"><br>

                <input type="submit" value="Add Advert">
            </form>


            <?php
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