<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "expedia";

$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$_SESSION['search_category'] = htmlspecialchars(trim($_POST['search-category']));
$_SESSION['trip_category'] = htmlspecialchars(trim($_POST['querySearchtour-type']));
$_SESSION['trip_to'] = htmlspecialchars(trim($_POST['querysearchTo']));
$_SESSION['trip_from'] = htmlspecialchars(trim($_POST['querysearchFrom']));
$_SESSION['trip_departs'] = htmlspecialchars(trim($_POST['querysearchDeparts']));
$_SESSION['trip_returning'] = htmlspecialchars(trim($_POST['querysearchReturning']));
$_SESSION['trip_adults'] = htmlspecialchars(trim($_POST['querysearchAdultscount']));
$_SESSION['trip_children'] = htmlspecialchars(trim($_POST['querysearchChildrencount']));

class SearchData
{
    private $search_category;
    private $trip_category;
    private $trip_to;

    public function __construct($cat, $tcat, $to)
    {
        $this->search_category = $cat;
        $this->trip_category = $tcat;
        $this->trip_to = $to;
    }

    public function searchData()
    {
        global $connection;

        $searchQueryforResult = "
        SELECT *, 'hotels-details' AS table_source FROM `hotels-details` 
        WHERE LOWER(`category`) LIKE LOWER('%" . mysqli_real_escape_string($connection, $this->search_category) . "%') 
        AND LOWER(`place`) LIKE LOWER('%" . mysqli_real_escape_string($connection, $this->trip_to) . "%') 
        AND LOWER(`trip_cat`) LIKE LOWER('%" . mysqli_real_escape_string($connection, $this->trip_category) . "%')
        
        UNION 
        
        SELECT *, 'aeroplanes_details' AS table_source FROM `aeroplanes_details` 
        WHERE LOWER(`category`) LIKE LOWER('%" . mysqli_real_escape_string($connection, $this->search_category) . "%') 
        AND LOWER(`locationto`) LIKE LOWER('%" . mysqli_real_escape_string($connection, $this->trip_to) . "%')
        AND LOWER(`type_cat`) LIKE LOWER('%" . mysqli_real_escape_string($connection, $this->trip_category) . "%')
        
        UNION 
        
        SELECT *, 'taxi_details' AS table_source FROM `taxi_details` 
        WHERE LOWER(`category`) LIKE LOWER('%" . mysqli_real_escape_string($connection, $this->search_category) . "%') 
        AND LOWER(`locationto`) LIKE LOWER('%" . mysqli_real_escape_string($connection, $this->trip_to) . "%')
        AND LOWER(`trip_cat`) LIKE LOWER('%" . mysqli_real_escape_string($connection, $this->trip_category) . "%');
    ";

        $runQueryforResult = mysqli_query($connection, $searchQueryforResult);

        if ($runQueryforResult && mysqli_num_rows($runQueryforResult) > 0) {
            $_SESSION['resultofQuerySearch'] = mysqli_fetch_all($runQueryforResult, MYSQLI_ASSOC);
        } else {
            $_SESSION['resultofQuerySearch'] = [];
        }
    }
}
