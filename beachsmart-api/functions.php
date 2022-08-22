<?php
// File to hold functions - plan is the house the majority of the backend functionality here in relation to data filtering and administrative activities.



//------------------------------ USER FUNCTIONS ----------------------------------------//

// Function returns all points of interest info to be displayed as map data points
// Default state of map when opening app - user search or filters will trigger below methods
function returnMapData()
{

    include("./database/dbconn.php");

    if (isset($_GET['all'])) {

        $sql_all = "SELECT * FROM points_of_interest;";
        $stmt_all = $dbconn->prepare($sql_all);
        $stmt_all->execute();
        $result_all = $stmt_all->get_result();

        $data_all = array();

        while ($row = $result_all->fetch_assoc()) {

            $data_all[] = $row;
        }

        echo json_encode($data_all);
    }
}

// Function handles user inputted search data in searh bar - within filter section of app
function userSearchData()
{

    include("./database/dbconn.php");

    if (isset($_GET['search'])) {

        $filter_term = '%' . $_GET['search'] . '%';

        $sql_search = "SELECT * FROM points_of_interest WHERE name LIKE ? OR type LIKE ?";
        $stmt_search = $dbconn->prepare($sql_search);
        $stmt_search->bind_param("ss", $filter_term, $filter_term);
        $stmt_search->execute();

        $search_result = $stmt_search->get_result();

        $search_data = array();

        while ($row = $search_result->fetch_assoc()) {

            $search_data[] = $row;
        }

        echo json_encode($search_data);
    }
}

// Function handles checkbox filters in map - will link to state of check box and display points of interest by type
function mapFilterData()
{
    include("./database/dbconn.php");

    // 7 types of POI



    
}


//------------------------------ ADMIN FUNCTIONS ----------------------------------------//

function createAdmin()
{
    include("./database/dbconn.php");
}

function addPOI()
{
    include("./database/dbconn.php");
}

function deletePOI()
{
    include("./database/dbconn.php");
}

function editPOI()
{
    include("./database/dbconn.php");
}
