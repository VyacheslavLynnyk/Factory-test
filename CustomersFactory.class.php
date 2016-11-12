<?php

class CustomersFactory extends PersonsFactoryAbstract
{
    protected static $personsCache = [];

    protected static $personsNameId = [];

    protected $currentCustomer;


    public static function setCache($id, $obj)
    {
        self::$personsCache[$id] = $obj;
    }

    public static function setNameId($name, $id)
    {
        self::$personsNameId[$name] = $id;
    }

    public static function getCache()
    {
        return self::$personsCache;
    }

    public static function checkInCache($idOrName)
    {
        // Check if $idOrName is Name
        if (isset($idOrName) && !is_numeric($idOrName)) {
            if (isset(self::$personsNameId[$idOrName])) {
                $idOrName = self::$personsNameId[$idOrName];
            } else {
                return false;
            }
        }
        // $idOrName is ID
        $id = $idOrName;
        if ((int) $id > 0 && isset(self::$personsCache[$id])) {
            return self::$personsCache[$id];
        }
        return false;
    }


    public function search($idOrName)
    {
        $customer = self::checkInCache($idOrName);
        if ($customer !== false) {
            $this->currentCustomer = $customer;
            return $this->currentCustomer;
        }
        $this->currentCustomer = new Customer($idOrName);
        return $this->currentCustomer;
    }

    public function getData(array $status = [])
    {
        if (!is_object($this->currentCustomer)) {
            return false;
        }
        $info = $this->currentCustomer->getInfo();
        $contracts = $this->currentCustomer->getContracts();
        $status = $this->currentCustomer->getServices($status);

        return compact('info', 'contracts', 'status');
    }
}