<?php

class CustomersFactory implements PersonsFactoryInterface
{
    protected static $personsCache = [];

    protected static $personsNameId = [];

    protected $currentCustomer;


    public static function setCache($id, $obj)
    {
        self::$personsCache[$id] = $obj;
    }

    public static function setNameId(string $name, int $id)
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
        if (!isset($info) || !is_array($info) || sizeof($info) == 0) {
            return false;
        }
        $contracts = $this->currentCustomer->getContracts();
        $services = $this->currentCustomer->getServices($status);

        return compact('info', 'contracts', 'services');
    }
}