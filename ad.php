<?php
    require 'conn.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM advert WHERE advert_id  = $id;";
        $stmt = $conn->prepare($query); 
        // EXECUTING THE QUERY 
        $stmt->execute(); 
        $r = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        // FETCHING DATA FROM DATABASE 
        $result = $stmt->fetchAll(); 
    }
?>
<?php
    foreach ($result as $row){ 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Αγγελίες - <?php echo $row['advert_title']; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  

        <link rel="stylesheet" href="css/responsive_menu.css">
        <link rel="stylesheet" href="css/responsive_header.css">
        <link rel="stylesheet" href="css/ad.css">

        <script src="https://kit.fontawesome.com/c4f6644410.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header class="header">
            <ul type="none">
                <input type="checkbox" id="menu-check">
                <li class="logo"><a href="main.html">www.corfu.gr</a></li>
                <li class="language_container">
                    <div>
                        <i class="fa-solid fa-earth-europe"></i>
                        <select id="languageSelector">
                            <option value="en">Ελληνικά</option>
                            <option value="fr">English</option>
                            <option value="es">Spanish</option>
                        </select>
                    </div>
                </li>
                
                <li class="dummy-list-item"> </li>
                <li class="menu-btn">
                    <label for="menu-check" id="menu-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </label>
                </li>

                <div class="header-menu-container" id="header-menu-container">
                    <ul id="header-menu-container-list">
                        <!-- AGGELIES -->
                        <li class="menu-1 expanded dropdown">
                            <a href="adverts.html" class="dropbtn">ΑΓΓΕΛΙΕΣ</a>
                            <div class="dropdown-content">
                                <p>Ανεβάστε τις δικές σας αγγελίες και μοιραστείτε τις ευκαιρίες, τις υπηρεσίες και τα προϊόντα σας με την κοινότητα!</p>
                            </div>
                        </li>
                        <!-- EKDHLWSEIS -->
                        <li class="menu-2 expanded dropdown">
                            <a href="curtural-events.html">ΕΚΔΗΛΩΣΕΙΣ</a>
                            <div class="dropdown-content">
                                <p>Ανακαλύψτε τις πιο hot εκδηλώσεις του νησιού - Από μουσικά events μέχρι πολιτιστικά φεστιβάλ! Ενημερωθείτε και συμμετέχετε στον παλμό της τοπικής ζωής.</p>
                            </div>
                        </li>
                        <li class="menu-3 expanded dropdown">
                            <a href="/en/what-to-do-in-cfu">What to do in cfu</a>
                            <div class="dropdown-content">
                                <p>Ανακαλύψτε τις καλύτερες εμπειρίες και δραστηριότητες στο νησί - Συνδεθείτε με την τοπική κουλτούρα και ανακαλύψτε μοναδικά μέρη για να εξερευνήσετε!</p>
                            </div>
                        </li>
                        <li class="menu-4 expanded dropdown">
                            <a href="/en/discovercfu">Discover cfu</a>
                            <div class="dropdown-content">
                                <p>Ανακαλύψτε τα μυστικά και τις ομορφιές του νησιού - Μια πύλη για να εξερευνήσετε τα πάντα γύρω από την Κέρκυρα!</p>
                            </div>
                        </li>
                        <li class="menu-5 expanded dropdown">
                            <a href="/en/getinvolved">Get involved</a>
                            <div class="dropdown-content">
                                <p>Ανακαλύψτε τα μυστικά και τις ομορφιές του νησιού - Μια πύλη για να εξερευνήσετε τα πάντα γύρω από την Κέρκυρα!</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </ul>
        </header>

        <div class="menu-container" id="largeMenu" style="margin-bottom: 4rem;">
            <ul>
                <!-- AGGELIES -->
                <li class="menu-1 expanded dropdown">
                    <a href="adverts.php" class="dropbtn">ΑΓΓΕΛΙΕΣ</a>
                    <div class="dropdown-content">
                        <p>Ανεβάστε τις δικές σας αγγελίες και μοιραστείτε τις ευκαιρίες, τις υπηρεσίες και τα προϊόντα σας με την κοινότητα!</p>
                    </div>
                </li>
                <!-- EKDHLWSEIS -->
                <li class="menu-2 expanded dropdown">
                    <a href="curtural-events.php">ΕΚΔΗΛΩΣΕΙΣ</a>
                    <div class="dropdown-content">
                        <p>Ανακαλύψτε τις πιο hot εκδηλώσεις του νησιού - Από μουσικά events μέχρι πολιτιστικά φεστιβάλ! Ενημερωθείτε και συμμετέχετε στον παλμό της τοπικής ζωής.</p>
                    </div>
                </li>
                <li class="menu-3 expanded dropdown">
                    <a href="/en/what-to-do-in-cfu">What to do in cfu</a>
                    <div class="dropdown-content">
                        <p>Ανακαλύψτε τις καλύτερες εμπειρίες και δραστηριότητες στο νησί - Συνδεθείτε με την τοπική κουλτούρα και ανακαλύψτε μοναδικά μέρη για να εξερευνήσετε!</p>
                    </div>
                </li>
                <li class="menu-4 expanded dropdown">
                    <a href="/en/discovercfu">Discover cfu</a>
                    <div class="dropdown-content">
                        <p>Ανακαλύψτε τα μυστικά και τις ομορφιές του νησιού - Μια πύλη για να εξερευνήσετε τα πάντα γύρω από την Κέρκυρα!</p>
                    </div>
                </li>
                <li class="menu-5 expanded dropdown">
                    <a href="/en/getinvolved">Get involved</a>
                    <div class="dropdown-content">
                        <p>Ανακαλύψτε τα μυστικά και τις ομορφιές του νησιού - Μια πύλη για να εξερευνήσετε τα πάντα γύρω από την Κέρκυρα!</p>
                    </div>
                </li>
            </ul>
        </div>


        <div class="advert-container">
            <article>
                <div class="advert-header">
                    <div class="advert-date"><span class="fa-solid fa-calendar fa-icon"></span> <?php echo $row['registrationDate']; ?></div>
                    <h2 class="advert-title"><?php echo $row['advert_title']; ?></h2>
                    <div class="advert-tags">
                        <!-- MUST DISPLAY THE TAGS AND HERE -->
                        <a>ΔΙΑΜΕΡΙΣΜΑΤΑ</a>
                        <a>ΣΕΖΟΝ</a>
                    </div>
                </div>
                <div class="advert-content">
                    <div class="advert-description">
                    <?php
                        echo $row["advert_desc"];
                    ?>
                    </div>
                    <div class="advert-images">
                        <div class="advert-image">
                            <img src="data:image/png;charset=utf8;base64,<?php echo base64_encode($row['advert_image']); ?>">
                        </div>
                    </div>
                    <!-- CONTACT INFO SECTION MUST BE ADDED -->
                    <?php 
                        if ($row["show_contact_info"] == 1) {
                    ?>
                    Phone:
                    <?php
                        echo $row["phone"];
                    } elseif ($row["show_contact_info"] == 2) {
                    ?>
                    Email:
                    <?php
                        echo $row["email"];
                    } else {
                    ?>
                    Phone:
                    <?php
                        echo $row["phone"];
                    ?>
                    <br>
                    Email:
                    <?php
                        echo $row["email"];
                    }
                    ?>
                </div>
            </article>
        </div>
<?php
    }
    $conn = null;
?>

        <script>
            const menuBtn = document.getElementById("menu-btn");
            const responMenu = document.getElementById("header-menu-container");
            const responMenuList = document.getElementById("header-menu-container-list");
            var isClicked = false;

            
            menuBtn.addEventListener("click", function () {
                if (!isClicked) {
                    menuBtn.style.position = "fixed";

                    //Responsive Menu
                    responMenu.style.backgroundColor = "whitesmoke";

                    responMenu.style.display = "flex";
                    responMenu.style.transition = "opacity 250ms ease-in-out";
                    responMenu.style.position = "fixed";
                    responMenu.style.top = "0";
                    responMenu.style.bottom = "0";
                    responMenu.style.right = "0";
                    responMenu.style.left = "0";
                    responMenu.style.zIndex = "100";
                    responMenu.style.transition = "transform 250ms cubic-bezier(.5, 0, .5, 1)"

                    responMenuList.style.marginTop = "1rem";
                    responMenuList.style.display = "flex";
                    responMenuList.style.flexDirection = "column";
                    responMenuList.style.alignItems = "center";
                    responMenuList.style.justifyContent = "start";
                    responMenuList.style.height = "100%";
                    // Show the menu with transition
                    setTimeout(function () {
                        responMenu.style.opacity = "1";
                    }, 10); // Delay for transition
                } else {
                    // Hide the menu with transition
                    responMenu.style.opacity = "0";
                    setTimeout(function () {
                        responMenu.style.display = "none";
                    }, 250); // Transition duration
                }
                isClicked = !isClicked;
            });
        </script>
    </body>
</html>