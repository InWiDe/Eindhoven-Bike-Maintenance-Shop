<?php



$host = "studmysql01.fhict.local";
$user = "dbi388250";
$db = "dbi388250";
$pass = "kiashi100";

if(isset($_POST['submit'])) {
    try {
        $odb = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);
    }catch(PDOException $exc)
    {
        echo $exc->getMessage();
        exit();
    }
    $inputEmail = $_POST['inputEmail'];
    $inputPassword = $_POST['inputPassword'];
    $inputPassword2 = $_POST['inputPassword2'];
    if($inputPassword ==$inputPassword2)
    {
        $q = "INSERT INTO accounts(inputEmail, inputPassword) VALUES (:inputEmail,:inputPassword)";
        $query = $odb->prepare($q);
        $results = $query -> execute(array(":inputEmail" => $inputEmail,":inputPassword" => $inputPassword));

    }
    else {
        header('Location:register.php');
    }
}
?>

<?php

$host = "studmysql01.fhict.local";
$user = "dbi388250";
$db = "dbi388250";
$pass = "kiashi100";

if(isset($_POST['save'])) {
    try {
        $db = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);
    }catch(PDOException $exc)
    {
        echo $exc->getMessage();
        exit();
    }
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $address2= $_POST['address2'];
        $s = "INSERT INTO personal(firstName, lastName, username, email, address, address2) VALUES (:firstName, :lastName, :username, :email, :address, :address2)";
        $quer = $db->prepare($s);
        $result = $quer -> execute(array(":firstName" => $firstName,":lastName" => $lastName,":username" => $username,":email" => $email,":address" => $address,":address2" => $address2)) ;
        if($result)
        {
            echo 'Data Not Inserted';
        }
        else {
            header("Location:account.php");
        }


}


?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/spreadsheet.css">
    <title>My Account</title>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOgI1yuT_ZazJVD7rBR2NLSp3Xocye1p8"></script>

    <script type="text/javascript">
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 13,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(51.442327, 5.4827513), // New York

                // How you would like to style the map.
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{
                    "featureType": "all",
                    "elementType": "geometry.fill",
                    "stylers": [{"weight": "2.00"}]
                }, {
                    "featureType": "all",
                    "elementType": "geometry.stroke",
                    "stylers": [{"color": "#9c9c9c"}]
                }, {
                    "featureType": "all",
                    "elementType": "labels.text",
                    "stylers": [{"visibility": "on"}]
                }, {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [{"color": "#f2f2f2"}]
                }, {
                    "featureType": "landscape",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#ffffff"}]
                }, {
                    "featureType": "landscape.man_made",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#ffffff"}]
                }, {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [{"visibility": "off"}]
                }, {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [{"saturation": -100}, {"lightness": 45}]
                }, {
                    "featureType": "road",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#eeeeee"}]
                }, {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [{"color": "#7b7b7b"}]
                }, {
                    "featureType": "road",
                    "elementType": "labels.text.stroke",
                    "stylers": [{"color": "#ffffff"}]
                }, {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [{"visibility": "simplified"}]
                }, {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [{"visibility": "off"}]
                }, {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [{"visibility": "off"}]
                }, {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [{"color": "#46bcec"}, {"visibility": "on"}]
                }, {
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#c8d7d4"}]
                }, {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [{"color": "#070707"}]
                }, {"featureType": "water", "elementType": "labels.text.stroke", "stylers": [{"color": "#ffffff"}]}]
            };

            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.6700, -73.9400),
                map: map,
                title: 'Snazzy!'
            });
        }
    </script>
</head>
<body class="darkslateblueBackground">
<div class="container">
    <div>
        <nav class="navbar navbar-light bg-faded fixed-top navbar-default navbar-fixed-top navbar-shadow">
            <a class="navbar-brand justify-content-start text-white lead" href="index.php">
                <img src="/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top"
                     alt="">
                <b>E</b>indhoven <b>B</b>ike <b>M</b>aintenance
            </a>
            <div class="navbar justify-content-end">
                <a class="nav-item nav-link text-white lead " href="#">ABOUT</a>
                <a class="nav-item nav-link text-white lead" href="#">SERVICES</a>
                <a class="nav-item nav-link text-white lead" href="#">CONTACT</a>
                <a class="nav-item nav-link text-white lead" href="#">CALL US</a>
            </div>
        </nav>
    </div>
</div>

<div class="container">
    <div class="jumbotron jumbotron-fluid text-white" style="margin-top: 10%;background-color: rgba(0,0,0,0.27)">
        <div class="container">


            <p class="display-4" style="padding-bottom: 20px;">Personal details</p>


            <form class="needs-validation" novalidate="" method ="post" action="account.php">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input class="form-control" id="firstName" placeholder="" value="" required="" type="text">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input class="form-control" id="lastName" placeholder="" value="" required="" type="text">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input class="form-control" id="username" placeholder="Username" required="" type="text">
                        <div class="invalid-feedback" style="width: 100%;">
                            Your username is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input class="form-control" id="email" placeholder="you@example.com" type="email">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input class="form-control" id="address" placeholder="1234 Main St" required="" type="text">
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                    <input class="form-control" id="address2" placeholder="Apartment or suite" type="text">
                </div>

                <div class="row">

                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="save">Save Changes</button>
            </form>

        </div>
    </div>
</div>

<div class="container">
    <div class="jumbotron jumbotron-fluid" style="margin-top: 10%;background-color: rgba(0,0,0,0.26)">
        <div class="container">
            <div class="text-white">
                <p class="display-4">Change Subscription</p>
                <p class="lead">You can change you subscription starting within the next month.</p>
            </div>
            <div class="card-deck mb-3 center text">
                <div class="card" style="width: 20rem;">
                    <!--<img class="card-img-top" src="..." alt="Card image cap">-->
                    <div class="card-block text-center">
                        <h1 class="card-title">BASIC</h1>
                        <p class="card-text">Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen.
                            Lorem
                            Ipsum is de standaard proeftekst in deze bedrijfstak sinds de 16e eeuw, toen een onbekende
                            drukker
                            een zethaak met letters nam en ze door elkaar husselde om een font-catalogus te maken. Het
                            heeft
                            niet alleen vijf eeuwen overleefd maar is ook, vrijwel onveranderd, overgenomen in
                            elektronische
                            letterzetting</p>
                        <a href="#" class="btn btn-primary">Change to this subscription</a>
                    </div>
                </div>

                <div class="card" style="width: 20rem;">
                    <!--<img class="card-img-top" src="..." alt="Card image cap">-->
                    <div class="card-block text-center">
                        <h1 class="card-title ">PLUS</h1>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Current Subscription</a>
                    </div>
                </div>

                <div class="card" style="width: 20rem;">
                    <!--<img class="card-img-top" src="" alt="Card image cap">-->
                    <div class="card-block text-center ">
                        <h1 class="card-title ">PREMIUM</h1>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Change to this subscription</a>


                    </div>
                </div>



                <div id="emptyBox3" class="container"></div>
            </div>
            <div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Cancel Subscription</button>
            </div>
        </div>
    </div>
</div>


<div class="container text-white " id="paymentHistory">
    <div>
        <p class="display-4">Payment history</p>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Method of Payment</th>
            <th scope="col">Date</th>
            <th scope="col">Type of subscription</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>VISA</td>
            <td>21/05/2017</td>
            <td>Basic</td>
        </tr>
        <tr>
            <th scope="row">1</th>
            <td>MASTER</td>
            <td>21/06/2017</td>
            <td>PLUS</td>
        </tr>
        <tr>
            <th scope="row">1</th>
            <td>PAY PAL</td>
            <td>21/07/2017</td>
            <td>PREMIUM</td>
        </tr>
        </tbody>
    </table>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script>
    $(window).scroll(function () {
        $('nav').toggleClass('scrolled', $(this).scrollTop() > 50);
    });
</script>
</body>
</html>