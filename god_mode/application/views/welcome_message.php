<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Content-Type: text/html");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="http://YOUR_IP/dropandrun/backend/god_mode/css/index.css">
    <style>
        #view-source {
            position: fixed;
            display: block;
            right: 0;
            bottom: 0;
            margin-right: 40px;
            margin-bottom: 40px;
            z-index: 900;
        }
    </style>

    <style>
        .video {
            width: 100%;
        }
        .map {
            height: 100%;
        }
    </style>
</head>
<body>
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">Home</span>
            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder" style="display: none;">
                    <input class="mdl-textfield__input" type="text" id="search">
                    <label class="mdl-textfield__label" for="search">Enter your query...</label>
                </div>
            </div>
        </div>
    </header>
    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
            <div class="demo-avatar-dropdown">
                <span>Drop and Run</span>
                <div class="mdl-layout-spacer"></div>
            </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
            <a class="mdl-navigation__link a lin" href="#driver"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">local_shipping</i>Drivers</a>
            <a class="mdl-navigation__link a lin" href="#user"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">person</i>Users</a>
            <a class="mdl-navigation__link a lin" href="#trips"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">navigation</i>Trips</a>
            <a class="mdl-navigation__link a lin" href="#appls"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">note_add</i>Applications</a>
            <a class="mdl-navigation__link a lin" href="#schedule"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">update</i>Schedule</a>
            <div class="mdl-layout-spacer"></div>
            <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
        </nav>
    </div>
    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
            <style>
                .hid {
                    display: none;
                }
            </style>
          <div id="drivers" class="con">
              <div class="con1">
              <h5 align="center">Drivers</h5>
                  <div class="driver_row_con">

                  </div>
              </div>
              <div class="con2">
                  <h5 align="center">Driver Information</h5>
                  <p>Click on a driver-phone to view its detail</p>
                  <div class="map" id="map1" style="width: 100% !important;height: 200px;"></div>
                  <div class="details">
                      <div class="info-box">
                          <h6 class="ib1">Name:</h6>
                          <h6 class="ib2" id="driver_name">...</h6>
                      </div>
                      <div class="clearfix"></div>
                      <div class="info-box">
                          <h6 class="ib1">Status:</h6>
                          <h6 class="ib2" id="driver_status">...</h6>
                      </div>
                      <div class="clearfix"></div>
                      <div class="info-box">
                          <h6 class="ib1">Online ? :</h6>
                          <h6 class="ib2" id="driver_online">...</h6>
                      </div>
                      <div class="clearfix"></div>
                      <div class="info-box">
                          <h6 class="ib1">Truck-Type:</h6>
                          <h6 class="ib2" id="driver_truck_type">...</h6>
                      </div>
                      <div class="clearfix"></div>
                      <div class="info-box">
                          <h6 class="ib1">FCM token lastest:</h6>
                          <h6 class="ib2" id="driver_token">...</h6>
                      </div>
                      <div class="clearfix"></div>
                  </div>
              </div>
          </div>
            <div id="users" class="con" style="display:none;">
                <div class="con1">
                    <h5 align="center">Users</h5>
                    <div class="user_row_con">

                    </div>
                </div>
                <div class="con2">
                    <h5 align="center">User Information</h5>
                    <p>Click on a user's phone to view its detail</p>
                    <div class="details">
                        <div class="info-box">
                            <h6 class="ib1">Name:</h6>
                            <h6 class="ib2" id="user_name">...</h6>
                        </div>
                        <div class="clearfix"></div>
                        <div class="info-box">
                            <h6 class="ib1">Status:</h6>
                            <h6 class="ib2" id="user_status">...</h6>
                        </div>
                        <div class="clearfix"></div>
                        <div class="info-box">
                            <h6 class="ib1">Email: ? :</h6>
                            <h6 class="ib2" id="user_online">...</h6>
                        </div>
                        <div class="clearfix"></div>
                        <div class="info-box">
                            <h6 class="ib1">FCM token lastest:</h6>
                            <h6 class="ib2" id="user_token">...</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div id="trips" class="con" style="display: none;">
                <div class="con1">
                    <h5 align="center">Trips</h5>
                    <div class="trip_row_con">

                    </div>
                </div>
                <div class="con2">
                    <h5 align="center">Trip Information</h5>
                    <p>Click on a Trip to view its detail</p>
                    <div class="map" id="map3" style="width: 100% !important;"></div>
                    <div class="details">

                        <div class="info-box">
                            <h6 class="ib1">Trip ID:</h6>
                            <h6 class="ib2" id="trip_id">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">Users Phone Number:</h6>
                            <h6 class="ib2" id="trip_user_phone">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">Recipient Phone:</h6>
                            <h6 class="ib2" id="trip_recipient_phone">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">Trip Booking Time</h6>
                            <h6 class="ib2" id="trip_booking_time">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">Trip Status:</h6>
                            <h6 class="ib2" id="trip_status">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">Truck Type:</h6>
                            <h6 class="ib2" id="trip_type">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">Weight of Shipment:</h6>
                            <h6 class="ib2" id="trip_weight">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">Trip PIN:</h6>
                            <h6 class="ib2" id="trip_pin">...</h6>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
            <div id="applications" class="con" style="display: none;">
                <div class="con1">
                    <h5 align="center">Driver Applications</h5>
                    <div class="appl_row_con">

                    </div>
                </div>
                <div class="con2">
                    <h5 align="center">Application Information</h5>
                    <p>Click on a Phone Number to view its detail</p>

                    <div class="details">

                        <div class="info-box">
                            <h6 class="ib1">Application ID:</h6>
                            <h6 class="ib2" id="appl_id">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">First Name:</h6>
                            <h6 class="ib2" id="appl_fname">...</h6>
                        </div>
                        <div class="clearfix"></div>
                        <div class="info-box">
                            <h6 class="ib1">Last Name:</h6>
                            <h6 class="ib2" id="appl_lname">...</h6>
                        </div>
                        <div class="clearfix"></div>
                        <div class="info-box">
                            <h6 class="ib1">Password (Chosen by Driver) :</h6>
                            <h6 class="ib2" id="appl_pass">...</h6>
                        </div>
                        <div class="clearfix"></div>
                        <div class="info-box">
                            <h6 class="ib1">Country:</h6>
                            <h6 class="ib2" id="appl_country">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">Postal Code:</h6>
                            <h6 class="ib2" id="appl_postal">...</h6>
                        </div>
                        <div class="clearfix"></div>


                        <div class="info-box">
                            <h6 class="ib1">Date of Birth:</h6>
                            <h6 class="ib2" id="appl_birth">...</h6>
                        </div>
                        <div class="clearfix"></div>


                        <div class="info-box">
                            <h6 class="ib1">Mobile:</h6>
                            <h6 class="ib2" id="appl_mobile">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">Province:</h6>
                            <h6 class="ib2" id="appl_province">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">City:</h6>
                            <h6 class="ib2" id="appl_city">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">Model:</h6>
                            <h6 class="ib2" id="appl_model">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">Make of Truck:</h6>
                            <h6 class="ib2" id="appl_make">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">Year:</h6>
                            <h6 class="ib2" id="appl_year">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">Color:</h6>
                            <h6 class="ib2" id="appl_color">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">Type:</h6>
                            <h6 class="ib2" id="appl_type">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">Driver has a Valid License? :</h6>
                            <h6 class="ib2" id="appl_license">...</h6>
                        </div>
                        <div class="clearfix"></div>


                        <div class="info-box">
                            <h6 class="ib1"> Willing and able to lift and carry at least 50lbs up a flight of stairs? :</h6>
                            <h6 class="ib2" id="appl_lift">...</h6>
                        </div>
                        <div class="clearfix"></div>


                        <div class="info-box">
                            <h6 class="ib1"> Driver is convicted of a DUI in the preceding 7 years? :</h6>
                            <h6 class="ib2" id="appl_dui">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1"> Driver has ever been convicted of a criminal offence for which a Pardon has not been granted? :</h6>
                            <h6 class="ib2" id="appl_crime">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1"> Driver has auto insurance :</h6>
                            <h6 class="ib2" id="appl_insurance">...</h6>
                        </div>
                        <div class="clearfix"></div>
                        <div class="info-box">
                            <h6 class="ib1"> Have iPhone or Android phone? :</h6>
                            <h6 class="ib2" id="appl_phone">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1"> Driver has a valid driver's license? :</h6>
                            <h6 class="ib2" id="appl_license">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1"> Download Vehicle Registation :</h6>
                            <button class="ib2" id="appl_reg">...</button>
                        </div>
                        <div class="clearfix"></div>


                        <div class="info-box">
                            <h6 class="ib1"> Download Insurance Policy :</h6>
                            <button class="ib2" id="appl_in">...</button>
                        </div>
                        <div class="clearfix"></div>


                        <div class="info-box">
                            <h6 class="ib1"> Download Driver's License :</h6>
                            <button class="ib2" id="appl_lic">...</button>
                        </div>
                        <div class="clearfix"></div>


                        <button id="approve">Approve and Activate Driver</button>


                    </div>
                </div>
            </div>


            <div id="schedule" class="con">
                <div class="con1">
                    <h5 align="center">Drivers</h5>
                    <div class="schedule_row_con">

                    </div>
                </div>
                <div class="con2">
                    <h5 align="center">Schedule Trip</h5>
                    <p>Click on an unscheduled trip to view its detail</p>
                    <div class="details">
                        <div class="info-box">
                            <h6 class="ib1">Trip Id:</h6>
                            <h6 class="ib2" id="schedule_id">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">:</h6>
                            <h6 class="ib2" id="schedule_id">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">Trip Id:</h6>
                            <h6 class="ib2" id="schedule_id">...</h6>
                        </div>
                        <div class="clearfix"></div>

                        <div class="info-box">
                            <h6 class="ib1">Trip Id:</h6>
                            <h6 class="ib2" id="schedule_id">...</h6>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" style="position: fixed; left: -1000px; height: -1000px;">
    <defs>
        <mask id="piemask" maskContentUnits="objectBoundingBox">
            <circle cx=0.5 cy=0.5 r=0.49 fill="white" />
            <circle cx=0.5 cy=0.5 r=0.40 fill="black" />
        </mask>
        <g id="piechart">
            <circle cx=0.5 cy=0.5 r=0.5 />
            <path d="M 0.5 0.5 0.5 0 A 0.5 0.5 0 0 1 0.95 0.28 z" stroke="none" fill="rgba(255, 255, 255, 0.75)" />
        </g>
    </defs>
</svg>
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 250" style="position: fixed; left: -1000px; height: -1000px;">
    <defs>
        <g id="chart">
            <g id="Gridlines">
                <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="27.3" x2="468.3" y2="27.3" />
                <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="66.7" x2="468.3" y2="66.7" />
                <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="105.3" x2="468.3" y2="105.3" />
                <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="144.7" x2="468.3" y2="144.7" />
                <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="184.3" x2="468.3" y2="184.3" />
            </g>
            <g id="Numbers">
                <text transform="matrix(1 0 0 1 485 29.3333)" fill="#888888" font-family="'Roboto'" font-size="9">500</text>
                <text transform="matrix(1 0 0 1 485 69)" fill="#888888" font-family="'Roboto'" font-size="9">400</text>
                <text transform="matrix(1 0 0 1 485 109.3333)" fill="#888888" font-family="'Roboto'" font-size="9">300</text>
                <text transform="matrix(1 0 0 1 485 149)" fill="#888888" font-family="'Roboto'" font-size="9">200</text>
                <text transform="matrix(1 0 0 1 485 188.3333)" fill="#888888" font-family="'Roboto'" font-size="9">100</text>
                <text transform="matrix(1 0 0 1 0 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">1</text>
                <text transform="matrix(1 0 0 1 78 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">2</text>
                <text transform="matrix(1 0 0 1 154.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">3</text>
                <text transform="matrix(1 0 0 1 232.1667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">4</text>
                <text transform="matrix(1 0 0 1 309 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">5</text>
                <text transform="matrix(1 0 0 1 386.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">6</text>
                <text transform="matrix(1 0 0 1 464.3333 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">7</text>
            </g>
            <g id="Layer_5">
                <polygon opacity="0.36" stroke-miterlimit="10" points="0,223.3 48,138.5 154.7,169 211,88.5
              294.5,80.5 380,165.2 437,75.5 469.5,223.3 	"/>
            </g>
            <g id="Layer_4">
                <polygon stroke-miterlimit="10" points="469.3,222.7 1,222.7 48.7,166.7 155.7,188.3 212,132.7
              296.7,128 380.7,184.3 436.7,125 	"/>
            </g>
        </g>
    </defs>
</svg>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script src="http://YOUR_IP/dropandrun/backend/god_mode/js/index.js"></script>
<link rel="stylesheet" href="http://YOUR_IP/dropandrun/backend/god_mode/css/main.css"/>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCL9PKnYjfbjpJRmhpL5K1ACpcASB5POq8&callback=initMap"
        async defer></script>
</body>
</html>


