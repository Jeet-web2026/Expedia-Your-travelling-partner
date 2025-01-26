<?php
require('../configaration/config.php');
class fetchOperation
{
    private $id;
    private $fetch_cart_id;

    public function __construct($id, $fci)
    {
        $this->id = $id;
        $this->fetch_cart_id = $fci;
    }

    public function fetchData()
    {
        global $connection;
        global $fetchRID;
        global $fetchRDB;
        $fetQuery = "SELECT * FROM `client_cart`";
        $executeQuery = mysqli_query($connection, $fetQuery);
        if ($executeQuery && mysqli_num_rows($executeQuery) > 0) {
            $_SESSION['CustomerOrder_details'] = mysqli_fetch_all($executeQuery, MYSQLI_ASSOC);
        }
    }
}
