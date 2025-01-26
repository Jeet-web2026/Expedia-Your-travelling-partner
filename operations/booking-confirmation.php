<?php
session_start();
require('../configaration/config.php');
class fetchRequestData
{
    private $reqDb;
    private $reqId;

    public function __construct($RequestId, $requestDatabase)
    {
        $this->reqDb = $RequestId;
        $this->reqId = $requestDatabase;
    }

    public function insertData()
    {
        if (!empty($this->reqDb) && !empty($this->reqId)) {
            global $connection;
            $fetchData = "SELECT * FROM `{$this->reqDb}` WHERE `id` = {$this->reqId}";
            $runfetchData = mysqli_query($connection, $fetchData);
            if ($runfetchData) {
                foreach ($runfetchData as $dataView) {
                    if (
                        (!empty($dataView['servicecompany']) || !empty($dataView['hotel_name']))
                        &&
                        (!empty($dataView['availfrom']) || !empty($dataView['availabledate_from']))
                        &&
                        (!empty($dataView['availto']) || !empty($dataView['availabledate_to']))
                        &&
                        (!empty($dataView['dprice']) || !empty($dataView['hotels_actual_price']))
                    ) {

                        $name =  ($dataView['servicecompany'] ?? $dataView['hotel_name']);
                        $dateF = ($_SESSION['trip_departs']);
                        $dateT = ($_SESSION['trip_returning']);
                        $startfrom = ($_SESSION['trip_from']);
                        $startto = ($_SESSION['trip_to']);
                        $price = ($dataView['dprice'] ?? $dataView['hotels_actual_price']);
                        $adult_count = $_SESSION['trip_adults'];
                        $children_count = $_SESSION['trip_children'];
                        if (!empty($name) && !empty($dateF) && !empty($dateT) && !empty($price)) {
                            $clientLoginId = $_SESSION['clientTableno'];
                            $insertQ = "INSERT INTO `client_cart`(`login_id`, `fetch_cart_id`, `db_name`, `companyname`, `start_from`,`start_to`,`availablefrom`, `availableto`, `price`, `adult_count`, `chldren_count`) VALUES ('$clientLoginId', '$this->reqId','$this->reqDb','$name','$startfrom','$startto','$dateF','$dateT','$price','$adult_count','$children_count')";
                            $runinsertQ = mysqli_query($connection, $insertQ);
                            if($runinsertQ){
                                header('Location: /Expedia-Your-travelling-partner/operations/cart.php');
                            }else{
                                echo "Something went wrong";
                            }
                        }
                    }
                }
            }
        }
    }
}
$requestDbdetails = $_GET['db'];
$requestIddetails = $_GET['id'];
$callClass = new fetchRequestData($requestDbdetails, $requestIddetails);
$callClass->insertData();
