<?php
header('Location:http://i388250.hera.fhict.nl/index.php');
exit;
?>
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
    <title>Welcome to EBM</title>
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
<body>


<div class="bg overlay">


    <nav class="navbar navbar-light bg-faded fixed-top navbar-default navbar-fixed-top">
        <a class="navbar-brand justify-content-start text-white lead" href="#">
            <img src="/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            <b>E</b>indhoven <b>B</b>ike <b>M</b>aintenance
        </a>
        <div class="navbar justify-content-end">
            <a class="nav-item nav-link text-white lead " href="http://i388250.hera.fhict.nl/SignIn.php">LOG IN</a>
            <a class="nav-item nav-link text-white lead " href="#about">ABOUT</a>
            <a class="nav-item nav-link text-white lead" href="#purchase">PLANS</a>
            <a class="nav-item nav-link text-white lead" href="#contact">CONTACT</a>
            <a class="nav-item nav-link text-white lead" href="skype:echo123?call">CALL US</a>
        </div>

    </nav>

    <div id="homepage" class="jumbotron jumbotron-fluid text-white">
        <div class="container text-center">
            <q class="display-4" id="quoteText"></q>
            <em>by <span id="quoteAuthor"></span></em>
            <div id="emptyBox3"></div>

            <hr class="my-4">
            <p class="lead">Your part is to ride the bike, ours is to keep it well maintained and clean</p>
            <p class="lead">That's why we've created a maintenance plan for <strong>EVERYONE</strong>.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#purchase" role="button">Check our services!</a>
            </p>
        </div>

    </div>
</div>

<div id="emptyBox"></div>

<div class="container text-center">
    <h1 class="display-4">Let's start from the problem</h1>
    <h1 class="lead">Maintaining a bike is not a easy job for everyone</h1>
    <h1 class="lead">If you don't believe us, please click the picture below</h1>
    <img id="bikePhoto" src="img/bikeParts.jpg" alt="Parts of the bike">
</div>

<div class="container" id="about">
    <div class="jumbotron jumbotron-fluid" id="transparent">
        <div class="container text-center">
            <h1 class="display-4">How does it work ?</h1>
            <p class="lead">You will be <b>amazed</b> how simple it is!</p>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-sm text-center">
                <h1 CLASS="display-4">STEP 1</h1>
                <div class="headerStepTop"></div>
                <i class="fas fa-mobile fa-5x"></i>
                <div class="headerStepBottom"></div>
                <p>You simply register and choose one of our plans that satisfies your needs</p>

            </div>
            <div class="col-sm text-center">
                <h1 class="display-4">STEP 2</h1>
                <div class="headerStepTop"></div>
                <i class="fas fa-truck fa-5x"></i>
                <div class="headerStepBottom"></div>
                <p>We came to pick up the bike</p>
            </div>
            <div class="col-sm text-center">
                <h1 class="display-4">STEP 3</h1>
                <div class="headerStepTop"></div>
                <i class="fas fa-envelope fa-5x"></i>
                <div class="headerStepBottom"></div>
                <p>We will send you a message with maintenance status and when we will return it back to you</p>
            </div>
            <div class="col-sm text-center">
                <h1 class="display-4">STEP 4</h1>
                <div class="headerStepTop"></div>
                <i class="fas fa-bicycle fa-5x"></i>
                <div class="headerStepBottom"></div>
                <p>You will get your bike ready in front of your door in 2-3 working days</p>
            </div>
        </div>
    </div>

</div>

<div class="container" id="emptyBox2">

</div>

<div class="container fadeThis">
    <h1 class="display-4 text-center">Area</h1>
    <p class="lead text-center">
        Our area of work is in Eindhoven. Are you living not in Eindhoven but near? Contact us to for more information via phone or email.
    </p>
    <div class="row">
        <div class="col-sm text-center ">
            <div id="map"></div>
        </div>
        <div class="col-sm text-center ">
            <ul class="list-group list-group-flush" style="list-style: none;">
                <h1 class="lead">We are delivering the fastest maintenance services by:</h1>
                <li>Picking up the bike</li>
                <li>Delivering back the bike</li>
                <li>We can deliver certain parts to the client if needed</li>
                <li>We can also do some certain services requested by the client at his house</li>
                <li>And much more!</li>
            </ul>
        </div>
    </div>
</div>

<div class="container darkslateblueBackground" id="purchase">
    <div class="text-white">
        <h1 class="display-4 text-center ">PLANS</h1>
        <p class="lead text-center">Our price range is for everyone!</p>
        <hr>
        <p class="lead text-center">We will <strong>check, adjust or repair</strong> based on the plans below: </p>
    </div>

    <div class="card-deck mb-3 center text">
        <div class="card" style="width: 20rem;">
            <!--<img class="card-img-top" src="..." alt="Card image cap">-->
            <div class="card-block text-center">
                <h1 class="card-title">BASIC</h1>
                <div class="card-text">
                    <ul class="list-group list-group-flush" style="list-style-type:none;">
                        <li>Tire pressure</li>
                        <li>Chain lubrication, </li>
                        <li>Quick brake and gears check-up </li>
                        <li>Main nuts/bolts check-up</li>
                    </ul>

                </div>

            </div>
        </div>

        <div class="card" style="width: 20rem;">
            <!--<img class="card-img-top" src="..." alt="Card image cap">-->
            <div class="card-block text-center">
                <h1 class="card-title ">PLUS</h1>
                <ul class="list-group list-group-flush" style="list-style-type:none;">
                    <li>Tire pressure</li>
                    <li>Chain tension and lubrication</li>
                    <li>Brakes (adjustment and lubrication) </li>
                    <li>Gears (quick adjustment and lubrication)</li>
                    <li>Lubrication of nuts and bolts (all)</li>
                </ul>

            </div>
        </div>

        <div class="card" style="width: 20rem;">
            <!--<img class="card-img-top" src="" alt="Card image cap">-->
            <div class="card-block text-center ">
                <h1 class="card-title ">PREMIUM</h1>
                <ul class="list-group list-group-flush" style="list-style-type:none;">
                    <li>Tire pressure</li>
                    <li>Chain tension and lubrication</li>
                    <li>Brakes (complete adjustment and lubrication) </li>
                    <li>Gears (complete adjustment and lubrication)</li>
                    <li>Lubrication of nuts and bolts (all)</li>
                    <li>Cables replacement and housing</li>
                    <li>Complete truing of the wheels</li>
                </ul>

            </div>
        </div>
        <div style="padding-top: 50px; height: 20px;" class="container"></div>
    </div>
</div>

<div class="container" id="contact">
    <div class="text-center">
        <h1 class="display-4">Have any question ?</h1>
        <p>Contact us via</p>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-3 text-center ">
            <i class="far fa-envelope fa-5x"></i>


        </div>
        <div class="col-3 text-center display-4 ">OR</div>
        <div class="col-3 text-center ">
            <i class="fas fa-phone fa-5x"></i>

        </div>
    </div>
    <div class="row justify-content-center" style="padding-top: 20px">
        <div class="col-3 text-center">
            <button class="btn btn-primary" type="submit">
                EBM@gmail.com
            </button>
        </div>
        <div class="col-3 text-center "></div>
        <div class="col-3 text-center ">
            <button class="btn btn-primary">0490 54 84 49</button>
        </div>

    </div>



    <div class="jumbotron jumbotron-fluid" id="stayUpdated">
        <div class=" text-center">
            <h1 class="display-3">Stay updated!</h1>
            <p class="lead">Sign up to receive news, tips, and more. </p>
            <p class="lead">We promise to only send 1-2 emails per month :) </p>
            <form action="">
                <div class="form-group">
                    <!--<label for="exampleInputEmail1">Email address</label> -->
                    <input type="email"
                           class="form-control justify-content-center"
                           id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
                    </small>
                </div>
            </form>
        </div>
    </div>


</div>

<div  id="stayConnected" class="jumbotron-fluid">
    <div class="container text-center text-white" >
        <div class="row text-white" >

        </div>
        <div class="container">
            <p class="lead">Stay connected with us via</p>
        </div>
        <div class="row text-white">

            <div class="col"></div>
            <div class="col"></div>
            <div class="col">
                <i class="fab fa-facebook fa-5x"></i>
            </div>

            <div class="col">
                <i class="fab fa-twitter-square fa-5x"></i>
            </div>

            <div class="col">
                <i class="fab fa-pinterest-square fa-5x"></i>
            </div>

            <div class="col">
                <i class="fab fa-youtube-square fa-5x"></i>
            </div>
            <div class="col"></div>
            <div class="col"></div>
        </div>



        <div id="footerStyle">
            <hr class="my-4">
            <div class="row muted-text">
                <div class="col"><a href="" >Blog</a></div>
                <div class="col"><a href="" >About</a></div>
                <div class="col"><a href="" >Support</a></div>
                <div class="col"><a href="" >Jobs</a></div>
                <div class="col"><a href="" onclick="window.print();">Print this page</a></div>
            </div>
        </div>

    </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
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

<!-- Script 1. Navigation bar purple color to transparent-->
<script>
    $(window).scroll(function(){
        $('nav').toggleClass('scrolled', $(this).scrollTop() > 50);
    });
</script>
<!-- Script 2. Printing the page script -->

<!-- Printing option at the bottom of the page -->

<!-- Script 3 It will change background from day to night mode depending on the time of the day-->

<script type="text/javascript">
    var now = new Date();
    var hours = now.getHours();
    //Place this script in your HTML heading section

    document.bgColor="white";

    //19-07 night
    if (hours > 19 ||  hours < 7){
        document.write ('<body style="background-color: white">');
    }
    //08-18 day
    else {
        document.write ('<body style="background-color: white">');
    }

</script>
<!-- Script 4 Scrolling effect on the title tab text -->

<script>
    (function titleNameScroll(text) {
        document.title = text;
        setTimeout(function () {
            titleNameScroll(text.substr(1) + text.substr(0, 1));
        }, 500);
    }(" Welcome to EBM "));
</script>

<!-- Script 5 Random quote -->

<script>
    var quotes = ['Life is a beautifull ride',
        'Life is like riding a bicycle. In order to keep your balance, you must keep moving.',
        'Nothing compares to the simple pleasure of riding a bike.',
        'Whoever invented the bicycle deserves the thanks of humanity',
        'Ride as much or as little, as long or as short as you feel. But ride'
    ];
    var author = [
        'EBM Team',
        'Albert Einstein',
        'John F. Kennedy',
        'Lord Charles Beresford',
        'Eddy Merckx'];

    var randomNumber = Math.floor((Math.random() * 4) + 1);
    document.getElementById('quoteText').innerHTML = quotes[randomNumber];
    document.getElementById('quoteAuthor').innerHTML = author[randomNumber];
</script>
<!-- Script 6 Modal picture of bike parts-->

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('bikePhoto');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    };

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";}
</script>


</body>
</html>
