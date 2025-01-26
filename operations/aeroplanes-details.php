<?php
session_start();
require('../configaration/config.php');
class aeroplanes
{
    private $aeroplaneCatogry;
    private $aeroplanepicture;
    private $aeroplanetypecat;
    private $aeroservicecompany;
    private $aeroexperience;
    private $aeroavlabledatefrom;
    private $aeroavlabledateto;
    private $aerodiscount;
    private $aeroactualprice;
    private $aeroprice;
    private $locationfrom;
    private $locationto;

    public function __construct($cat, $pic, $typecat, $serviceco, $ratings, $from, $to, $discount, $actualpr, $price, $locationfrom, $locationto)
    {
        $this->aeroplaneCatogry = $cat;
        $this->aeroplanepicture = $pic;
        $this->aeroplanetypecat = $typecat;
        $this->aeroservicecompany = $serviceco;
        $this->aeroexperience = $ratings;
        $this->aeroavlabledatefrom = $from;
        $this->aeroavlabledateto = $to;
        $this->aerodiscount = $discount;
        $this->aeroactualprice = $actualpr;
        $this->aeroprice = $price;
        $this->locationfrom = $locationfrom;
        $this->locationto = $locationto;
    }

    public function insertData()
    {
        global $connection;
        $insertQuery = "INSERT INTO `aeroplanes_details`(`category`, `image`, `type_cat`, `servicecompany`, `ratings`, `availfrom`, `availto`, `discount`, `actualprice`, `dprice`, `locationfrom`, `locationto`) 
        VALUES ('$this->aeroplaneCatogry','$this->aeroplanepicture', '$this->aeroplanetypecat','$this->aeroservicecompany','$this->aeroexperience','$this->aeroavlabledatefrom','$this->aeroavlabledateto','$this->aerodiscount','$this->aeroactualprice','$this->aeroprice','$this->locationfrom','$this->locationto')";
        $runthisQuery = mysqli_query($connection, $insertQuery);
        if ($runthisQuery) {
            echo 'Data inserted successfully!';
        } else {
            echo 'Failed to insert!';
        }
    }
}

$aeroplaneCatogry = htmlspecialchars(trim($_POST['aeroplanesCategory']));
$aeroplanepicture = 1;
$aeroplanetypecat = htmlspecialchars(trim($_POST['type_cat']));
$aeroservicecompany = htmlspecialchars(trim($_POST['aeroplanesName']));
$aeroexperience = htmlspecialchars(trim($_POST['experienceValue']));
$aeroavlabledatefrom = htmlspecialchars(trim($_POST['aeroavailDateFrom']));
$aeroavlabledateto = htmlspecialchars(trim($_POST['aeroavailDateTo']));
$aerodiscount = htmlspecialchars(trim($_POST['aerodiscountRate']));
$aeroactualprice = htmlspecialchars(trim($_POST['aeroactualRupees']));
$aeroprice = htmlspecialchars(trim($_POST['aerorupees']));
$locationfrom = htmlspecialchars(trim($_POST['location_from']));
$locationto = htmlspecialchars(trim($_POST['location_to']));

$dataInsert = new aeroplanes($aeroplaneCatogry, $aeroplanepicture, $aeroplanetypecat, $aeroservicecompany, $aeroexperience, $aeroavlabledatefrom, $aeroavlabledateto, $aerodiscount, $aeroactualprice, $aeroprice, $locationfrom, $locationto);
$dataInsert->insertData();
