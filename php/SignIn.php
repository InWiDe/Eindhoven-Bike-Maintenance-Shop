<?php
;



$host = "studmysql01.fhict.local";
$user = "dbi388250";
$db = "dbi388250";
$pass = "kiashi100";



if(isset($_POST['login'])) {
    try {
        $connect = new PDO("mysql:host=" . $host . ";dbname=" . $db, $user, $pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_POST["login"])) {
            if (empty($_POST["inputEmail"]) || empty($_POST["inputPassword"])) {
                $message = '<label>All fields are required</label>';
            } else {
                $hash = password_hash(   $_POST["inputPassword"],PASSWORD_BCRYPT);
                $query = "SELECT * FROM accounts WHERE inputEmail = :inputEmail AND inputPassword = :inputPassword";
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                        'inputEmail' => $_POST["inputEmail"],
                        'inputPassword' => $_POST["inputPassword"]
                    )
                );
                $count = $statement->rowCount();
                if ($count > 0) {
                    $_SESSION["username"] = $_POST["inputEmail"];
                    header("location:account.php");
                    echo "Session started";
                } else {
                    $message = '<label>Wrong Data</label>';
                }
                if(isset($_POST['remember-me'])){
                    setcookie('inputEmail',$inputemail,time()+(60*60*24*7));
                    session_start();
                    
                    $_SESSION['inputEmail']=$_POST["inputEmail"];
                    header("Location:account.php");
                }
            }
        }
    } catch (PDOException $error) {
        $message = $error->getMessage();
    }

}

?>﻿



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in</title>
</head>
<body>
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
    <title>Sign in</title>


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
<body>


<div class="bg overlay">
    <nav class="navbar navbar-light bg-faded fixed-top navbar-default navbar-fixed-top">
        <a class="navbar-brand justify-content-start text-white lead" href="index.php">
            <img src="/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            <b>E</b>indhoven <b>B</b>ike <b>M</b>aintenance
        </a>
        <div class="navbar justify-content-end">
            <a class="nav-item nav-link text-white lead " href="#">ABOUT</a>
            <a class="nav-item nav-link text-white lead" href="#">SERVICES</a>
            <a class="nav-item nav-link text-white lead" href="#">CONTACT</a>
            <a class="nav-item nav-link text-white lead" href="#">CALL US</a>
        </div>

    </nav>

    <div class="row padTop">
        <div class="col"></div>
        <div class="col">
            <div class="container" >
                <div class="signInForm">
                    <form action="" class="container" method ="post">
                        <div>
                            <h1 class="h3 mb-3 font-weight-normal text-white">Please log in</h1>
                            <label for="inputEmail" class="sr-only">Email address</label>
                            <input type="email" id="inputEmail" name = "inputEmail" class="form-control marginBot"
                                   placeholder="Email address" required autofocus>
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" id="inputPassword" name = "inputPassword" class="form-control" placeholder="Password" required>
                            <div class="checkbox mb-3 text-white">
                                <label>
                                    <input type="checkbox" value="remember-me" name="remember-me"> Remember me
                                </label>
                            </div>
                            <button onclick="location.href= 'account.php'" class="btn btn-lg btn-primary btn-block text-white marginBot"  type="submit" name = "login">
                                Log in
                            </button>
                            <p class="p text-white text-center">OR</p>
                        </div>
                    </form>
                    <div class="container marginBot">
                        <button onclick="location.href= 'register.php'" class="btn btn-lg btn-primary btn-block" type="submit" name = "btn">
                            Register
                        </button>
                    </div>
                </div></div>
        </div>
        <div class="col"></div>
    </div>





</div>

</div>
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
</body>
</html>