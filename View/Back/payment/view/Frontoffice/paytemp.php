<?php
include '../../controller/payController.php';
$error = "";
$pay = NULL;
$payController = new payController();
$pays = $payController->listpay();

if (
    isset($_POST["typec"], $_POST["cdnumber"], $_POST["drcode"], $_POST["bkcode"], $_POST["securitycode"], $_POST["datee"])
) {
    if (
        !empty($_POST["typec"]) && 
        !empty($_POST["cdnumber"]) && 
        !empty($_POST["drcode"]) && 
        !empty($_POST["bkcode"]) && 
        !empty($_POST["securitycode"]) && 
        !empty($_POST["datee"])
    ) {
        $pay = new pay(
            null,
            $_POST['typec'],
            $_POST['cdnumber'],
            $_POST['drcode'],
            $_POST['bkcode'],
            $_POST['securitycode'],
            new DateTime($_POST['datee'])
        );

        $payController->addpay($pay);
        header('Location: paytemp.php');
        exit();
    } else {
        $error = "Missing information";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/fevicon.png" type="">

  <title>Need for Ride</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <style>
    .card {
      background: #ffffff;
      margin: 10px 20px;
      padding: 15px 20px;
      border-radius: 10px;
      box-shadow: 0 1px 4px rgba(0,0,0,0.1);
      display: flex;
      flex-direction: column;
      position: relative;
    }

    .delete-btn {
      background: #ff6347;
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      margin-left: 20px;
    }
    
    .edit-btn {
      background: rgb(26, 21, 157);
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      margin-left: 20px;
    }

    .card-content {
      flex-grow: 1;
    }

    .card .bank {
      font-weight: bold;
    }

    .card .type {
      color: #777;
      font-size: 0.9em;
    }

    .card-number {
      margin: 10px 0;
      letter-spacing: 2px;
    }

    .expires {
      color: #888;
      font-size: 0.85em;
    }

    .brand-logo {
      position: absolute;
      right: 20px;
      top: 15px;
      height: 20px;
    }

    .delete-icon {
      position: absolute;
      right: 20px;
      top: 50%;
      transform: translateY(-50%);
      background: #ff6347;
      padding: 10px;
      border-radius: 10px 0 0 10px;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }

    .bottom-nav {
      width: 100%;
      height: 60px;
      background: white;
      display: flex;
      justify-content: space-around;
      align-items: center;
      position: fixed;
      bottom: 0;
      box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.1);
    }

    .bottom-nav div {
      font-size: 14px;
      color: #666;
    }
    
    .butt {
      position: right;
      align-items: right;
      width: 60px;
      height: 60px;
      top: 16px;
      left: 11px;
      border-radius: 10px 10 10 10px;
      padding: 5px;
      background: rgb(201, 45, 14);
      color: rgb(0, 0, 0);
    }

    .pay-button {
      background: #00bcd4;
      color: white;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: bold;
      font-size: 14px;
      transform: translateY(-20px);
      box-shadow: 0 4px 12px rgba(0, 188, 212, 0.4);
    }

    ::-webkit-scrollbar {
      width: 8px;
    }
    
    ::-webkit-scrollbar-thumb {
      background: #888; 
    }
    
    ::-webkit-scrollbar-thumb:hover {
      background: #555; 
    }

    body {
      font-family: "Poppins", sans-serif;
      font-weight: 300;
    }

    .container {
      height: 100vh;
    }

    .card {
      border: none;
    }

    .card-header {
      padding: .5rem 1rem;
      margin-bottom: 0;
      background-color: rgba(0,0,0,.03);
      border-bottom: none;
    }

    .btn-light:focus {
      color: #212529;
      background-color: #e2e6ea;
      border-color: #dae0e5;
      box-shadow: 0 0 0 0.2rem rgba(216,217,219,.5);
    }

    .form-control {
      height: 50px;
      border: 2px solid #eee;
      border-radius: 6px;
      font-size: 14px;
    }

    .form-control:focus {
      color: #495057;
      background-color: #fff;
      border-color: #039be5;
      outline: 0;
      box-shadow: none;
    }

    .input {
      position: relative;
    }

    .input i {
      position: absolute;
      top: 16px;
      left: 11px;
      color: #989898;
    }

    .input input {
      text-indent: 25px;
    }

    .card-text {
      font-size: 13px;
      margin-left: 6px;
    }

    .certificate-text {
      font-size: 12px;
    }

    .billing {
      font-size: 11px;
    }

    .super-price {
      top: 0px;
      font-size: 22px;
    }

    .super-month {
      font-size: 11px;
    }

    .line {
      color: #bfbdbd;
    }

    .free-button {
      background: #1565c0;
      height: 52px;
      font-size: 15px;
      border-radius: 8px;
    }

    .payment-card-body {
      flex: 1 1 auto;
      padding: 24px 1rem !important;
    }

    .error-message {
      color: red;
      font-size: 12px;
      margin-top: 5px;
    }
  </style>
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid">
          <div class="contact_nav">
            <a href="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>Call : +216 42339577</span>
            </a>
            <a href="">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>Email : needforride@gmail.com</span>
            </a>
            <a href="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>Location</span>
            </a>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="index.html">
              <span>need for ride</span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="service.html">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact Us</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="payment.html">payment <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fa fa-user" aria-hidden="true"></i> Login</a>
                </li>
                <form class="form-inline">
                  <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </button>
                </form>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <span class="h4">Payment Method</span>
        <div class="card mt-3">
          <div class="accordion" id="accordionExample">
            <div class="card">
              <div class="card-header p-0">
                <h2 class="mb-0">
                  <button class="btn btn-light btn-block text-left p-3 rounded-0">
                    <div class="d-flex align-items-center justify-content-between">
                      <span>Credit card</span>
                      <div class="icons">
                        <img src="https://i.imgur.com/2ISgYja.png" width="30">
                        <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                        <img src="https://i.imgur.com/35tC99g.png" width="30">
                        <img src="https://i.imgur.com/2ISgYja.png" width="30">
                      </div>
                    </div>
                  </button>
                </h2>
              </div>
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body payment-card-body">
                  <form id="payForm" action="" method="POST" onsubmit="return validateForm()">
                    <div class="form-group">
                      <label for="typec">Card Type:</label>
                      <input class="form-control form-control-user" type="text" id="typec" name="typec">
                      <span id="typecError" class="error-message"></span>
                    </div>
                    
                    <div class="form-group">
                      <label class="font-weight-normal card-text" for="cdnumber">Card Number:</label>
                      <input class="form-control" placeholder="0000 0000 0000 0000" type="text" id="cdnumber" name="cdnumber">
                      <span id="cdnumberError" class="error-message"></span>
                    </div>

                    <div class="row mt-3 mb-3">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="font-weight-normal card-text" for="drcode">Expiry Date:</label>
                          <input class="form-control" placeholder="MM/YY" type="text" id="drcode" name="drcode">
                          <span id="drcodeError" class="error-message"></span>
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="font-weight-normal card-text" for="bkcode">CVV:</label>
                          <input class="form-control" placeholder="000" type="text" id="bkcode" name="bkcode">
                          <span id="bkcodeError" class="error-message"></span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="securitycode">Security Code:</label>
                      <input class="form-control form-control-user" type="text" id="securitycode" name="securitycode">
                      <span id="securitycodeError" class="error-message"></span>
                    </div>

                    <input type="hidden" id="datee" name="datee">

                    <button type="submit" class="btn btn-primary btn-user btn-block mt-4">
                      Add Payment
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        
  </div>
    </div>
  </div>

        <!-- Payment Cards List -->
        <div class="mt-4">
          <h4>Saved Payment Methods</h4>
          <?php if (!empty($pays)): ?>
            <div class="payment-cards-list">
              <?php foreach ($pays as $pay): ?>
                <div class="card mb-3">
                  <div class="card-content">
                    <div class="bank"><?php echo htmlspecialchars($pay['typec']); ?></div>
                    <div class="card-number"><?php echo htmlspecialchars($pay['cdnumber']); ?></div>
                    <div class="expires">Expires: <?php echo htmlspecialchars($pay['drcode']); ?></div>
                    <div class="expires">CVV: <?php echo htmlspecialchars($pay['bkcode']); ?></div>
                  </div>
                  <div class="d-flex justify-content-end mt-2">
                    <button class="delete-btn" onclick="window.location.href='deletepay.php?id=<?php echo $pay['id']; ?>'">Delete</button>
                    <button class="edit-btn" data-toggle="modal" data-target="#editpayModal" onclick="openEditModal(<?php echo htmlspecialchars(json_encode($pay)); ?>)">Edit</button>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php else: ?>
            <p>No payment methods saved yet.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Payment Modal -->
  <div class="modal fade" id="editpayModal" tabindex="-1" role="dialog" aria-labelledby="editpayModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editpayModalLabel">Edit Payment Method</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="editpayForm" action="editpay.php" method="POST">
          <div class="modal-body">
            <input type="hidden" id="editpayId" name="id">
            
            <div class="form-group">
              <label for="edittypec">Card Type:</label>
              <input class="form-control" type="text" id="edittypec" name="typec">
            </div>
            
            <div class="form-group">
              <label for="editcdnumber">Card Number:</label>
              <input class="form-control" type="text" id="editcdnumber" name="cdnumber">
            </div>
            
            <div class="form-group">
              <label for="editdrcode">Expiry Date:</label>
              <input class="form-control" type="text" id="editdrcode" name="drcode">
            </div>
            
            <div class="form-group">
              <label for="editbkcode">CVV:</label>
              <input class="form-control" type="text" id="editbkcode" name="bkcode">
            </div>
            
            <div class="form-group">
              <label for="editsecuritycode">Security Code:</label>
              <input class="form-control" type="text" id="editsecuritycode" name="securitycode">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_contact">
            <h4>Address</h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>Location</span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>Call +01 1234567890</span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>demo@gmail.com</span>
              </a>
            </div>
          </div>
          <div class="info_social">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_detail">
            <h4>Info</h4>
            <p>
              necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto info_col">
          <div class="info_link_box">
            <h4>Links</h4>
            <div class="info_links">
              <a class="active" href="index.html">
                <img src="images/nav-bullet.png" alt="">
                Home
              </a>
              <a class="" href="about.html">
                <img src="images/nav-bullet.png" alt="">
                About
              </a>
              <a class="" href="service.html">
                <img src="images/nav-bullet.png" alt="">
                Services
              </a>
              <a class="" href="contact.html">
                <img src="images/nav-bullet.png" alt="">
                Contact Us
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 info_col">
          <h4>Subscribe</h4>
          <form action="#">
            <input type="text" placeholder="Enter email" />
            <button type="submit">Subscribe</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const dateInput = document.getElementById("datee");
        const now = new Date();
        const formatted = now.getFullYear() + "-" +
            String(now.getMonth() + 1).padStart(2, '0') + "-" +
            String(now.getDate()).padStart(2, '0') + " " +
            String(now.getHours()).padStart(2, '0') + ":" +
            String(now.getMinutes()).padStart(2, '0') + ":" +
            String(now.getSeconds()).padStart(2, '0');

        dateInput.value = formatted;
    });

    function openEditModal(pay) {
        document.getElementById("editpayId").value = pay.id;
        document.getElementById("edittypec").value = pay.typec;
        document.getElementById("editcdnumber").value = pay.cdnumber;
        document.getElementById("editdrcode").value = pay.drcode;
        document.getElementById("editbkcode").value = pay.bkcode;
        document.getElementById("editsecuritycode").value = pay.securitycode;
        
        $('#editpayModal').modal('show');
    }

    function validateForm() {
        let isValid = true;
        
        // Validate Card Type
        const typec = document.getElementById("typec").value.trim();
        if (typec === "") {
            document.getElementById("typecError").textContent = "Card type is required";
            isValid = false;
        } else {
            document.getElementById("typecError").textContent = "";
        }
        
        // Validate Card Number
        const cdnumber = document.getElementById("cdnumber").value.trim();
        if (cdnumber === "" || !/^\d{16}$/.test(cdnumber)) {
            document.getElementById("cdnumberError").textContent = "Valid 16-digit card number is required";
            isValid = false;
        } else {
            document.getElementById("cdnumberError").textContent = "";
        }
        
        // Validate Expiry Date
        const drcode = document.getElementById("drcode").value.trim();
        if (drcode === "" || !/^\d{2}\/\d{2}$/.test(drcode)) {
            document.getElementById("drcodeError").textContent = "Valid expiry date (MM/YY) is required";
            isValid = false;
        } else {
            document.getElementById("drcodeError").textContent = "";
        }
        
        // Validate CVV
        const bkcode = document.getElementById("bkcode").value.trim();
        if (bkcode === "" || !/^\d{3,4}$/.test(bkcode)) {
            document.getElementById("bkcodeError").textContent = "Valid CVV (3 or 4 digits) is required";
            isValid = false;
        } else {
            document.getElementById("bkcodeError").textContent = "";
        }
        
        // Validate Security Code
        const securitycode = document.getElementById("securitycode").value.trim();
        if (securitycode === "") {
            document.getElementById("securitycodeError").textContent = "Security code is required";
            isValid = false;
        } else {
            document.getElementById("securitycodeError").textContent = "";
        }
        
        return isValid;
    }
  </script>

  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->
</body>
</html>