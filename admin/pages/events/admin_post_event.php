<?php
  require "../../../conn.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Event Posting</title>
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
              <h3> Event Posting </h3>
            </div>
        <form class="nice-form-group" action="../../admin_operations/post_event.php" method="post" enctype="multipart/form-data">
            <!-- Fields for Event Information -->
            <label for="title">Event Title:</label>
            <input type="text" name="title" required><br>

            <label for="short_desc">Short Description:</label>
            <input type="text" name="short_desc" required><br>

            <label for="long_desc">Long Description:</label>
            <textarea name="long_desc" rows="4" required></textarea><br>
            
            <label for="location">Event Location:</label>
            <input type="text" name="location" required><br>

            <label for="keyword">Keyword:</label>
            <input type="text" name="keyword" required><br>

            <label for="address">Address:</label>
            <input type="text" name="address" required><br>

            <label for="latitude">Latitude:</label>
            <input type="text" name="latitude" required pattern="^[-+]?([1-8]?\d(\.\d+)?|90(\.0+)?)$"><br>

            <label for="longitude">Longitude:</label>
            <input type="text" name="longitude" required pattern="^[-+]?((180(\.0+)?)|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$"><br>

            <label for="date">Start Date:</label>
            <input type="date" name="start_date" required><br>

            <label for="date">End Date:</label>
            <input type="date" name="end_date" required><br>

            <label for="url">URL:</label>
            <input type="text" name="url" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <label for="phone">Phone:</label>
            <input type="tel" name="phone" required pattern="^(2\d{9}|6\d{9})$"><br>

            <label for="organizer_id">Organizer ID:</label>
            (id - title)
            <select name="organizer_id" id="organizer" required>
            <?php
                $query = "SELECT * FROM organizers";
                $stmt = $conn->prepare($query); 
                // EXECUTING THE QUERY 
                $stmt->execute(); 
                $r = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                // FETCHING DATA FROM DATABASE 
                $result = $stmt->fetchAll();
                // Populate the dropdown with organizer IDs
                foreach ($result as $row){
                    echo "<option value=\"{$row['id']}\">{$row['id']} - {$row['title']}</option>";
                }
            ?>
            </select>
            <br>

            <label for="category_id">Category ID:</label>
            (id - name)
            <select name="category_id" id="category" required>
            <?php
                echo 'Ola pane kala';
                // Fetch existing organizer IDs from the database
                $query = "SELECT * FROM categories";
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
            </select>
            <br>

            <label for="image">Event Image:</label>
            <input type="file" name="image" accept="image/*" required><br>

            <input type="submit" value="Post Event">
        </form>

        <?php
            // Close the database connection
            $conn = null;
        ?>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
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