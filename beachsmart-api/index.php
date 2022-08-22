<?php

// Headers
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
// set object to json
// server uses to the header to tell the browser what to expect
header('Content-Type: application/json');

include("./database/dbconn.php");
include("./functions.php");

// Function returns all points of interest info to be displayed as map data points
returnMapData();

// Function handles user inputted search data in searh bar - within filter section of app
userSearchData();

// Function handles checkbox filters in map - will link to state of check box and display points of interest by type
mapFilterData();
