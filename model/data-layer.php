<?php
/*
 * This file represents the data layer for my diner app
 * 328/diner/model/data-layer.php
 *
 */
// require DB config
require($_SERVER['DOCUMENT_ROOT'].'/../config.php');
class DataLayer
{

    /**
     * @var PDO The database connection object
     */
    private $_dbh; // data base handel

    /**
     * datalayer constructor
     */

    function __construct()
    {
        try{
            // instantiate a PDO database connection object
            $this-> _dbh = new PDO(DB_DSN,DB_USERNAME,DB_PASSWORD);
        }
        catch (PDOException $e){
                echo  $e->getMessage(); # temporary
        }
    }

    /**
     * View all orders from the Diner
     * @return array The Diner Orders
     */
    function getOrders()
    {
        //1. Define the query
        $sql = "SELECT * FROM orders";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters

        //4. Execute the query
        $statement->execute();

        //5. Process the results, if needed
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        //Return the results
        return $result;
    }
    static function getMeals()
    {
        return array('breakfast', 'brunch', 'lunch', 'dinner');
    }

    static function getCondiments() {
        return array('ketchup', 'mustard', 'mayo', 'sriracha', 'relish');
    }
}