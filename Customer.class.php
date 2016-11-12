<?php

class Customer implements CustomerInterface
{
    protected $connection;

    protected $info;

    protected $contracts;

    protected $services;

    public function __construct($idOrName = null)
    {
        $this->connection = mysqli_connect("localhost", "root", "1", "test_wnet");

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        if (isset($idOrName)) {
            $this->searchData($idOrName);
        }

    }

    public function searchData($idOrName)
    {
        if (empty($idOrName)) {
            return false;
        }

        $sql = 'SELECT cu.id_customer, co.id_contract, cu.name_customer, cu.company, co.number, co.date_sign '
            . ' FROM obj_customers AS cu '
            . ' JOIN obj_contracts AS co';

        // Check if $idOrName is Name
        if (isset($idOrName) && !is_numeric($idOrName)) {
            $sql .= ' ON cu.id_customer = ( '
                .  ' SELECT id_customer from obj_customers '
                .  " WHERE name_customer  LIKE '%{$idOrName}%' LIMIT 1) AND cu.id_customer = co.id_customer ";
        } else {
            $id = (int) $idOrName;
            $sql .= ' ON cu.id_customer ='. $id .' AND cu.id_customer = co.id_customer';
        }
        echo $sql;
        $res = mysqli_query($this->connection, $sql);
        var_dump($res);
        // Set info (customer info) and contracts
        // $i is iterator
        $i = -1;
        while ($row[++$i] = $res->fetch_assoc()){
            if ($i == 0) {
                $this->info['id_customer'] = $row[$i]['id_customer'];
                $this->info['name_customer'] = $row[$i]['name_customer'];
                $this->info['company'] = $row[$i]['company'];
            }
            // contracts -> [key is contract_id] -> [fields_name]
            $this->contracts[$row[$i]['id_contract']]['id_contract'] = $row[$i]['id_contract'];
            $this->contracts[$row[$i]['id_contract']]['number'] = $row[$i]['number'];
            $this->contracts[$row[$i]['id_contract']]['date_sign'] = $row[$i]['date_sign'];
        }
        // Check if query is empty
        if (empty($this->info['id_customer'])) {
            return false;
        }

        // Prepare contracts id for query, example: " 3,4,5 "
        $contractIds = implode(', ',array_keys($this->contracts));

        // Query for services
        $sql = 'SELECT id_service, title_service, status'
            . ' FROM obj_services '
            . ' WHERE id_service IN('. $contractIds  .') ';
        $res = mysqli_query($this->connection, $sql);

        // Set Services
        while ($row = $res->fetch_assoc()) {
            // services -> [key is id_service] -> [fields_name]
            $this->services[$row['id_service']]['title_service'] = $row['title_service'];
            $this->services[$row['id_service']]['status'] = $row['status'];
        }


        if (!isset($id) && !is_numeric($idOrName)) {
            CustomersFactory::setNameId($this->info['id_customer'], $idOrName);
        }

        CustomersFactory::setCache($this->info['id_customer'], $this);

        return $this;
    }

    // Getters and setters

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param mixed $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * @return mixed
     */
    public function getContracts()
    {
        return $this->contracts;
    }

    /**
     * @param mixed $contracts
     */
    public function setContracts($contracts)
    {
        $this->contracts = $contracts;
    }


    /**
     * @param array $status
     * @return mixed
     */
    public function getServices(array $status = [])
    {
        if (isset($status) && sizeof($status) > 0 & isset($this->services)) {
            $filtredServices = [];
            foreach ($this->services as $id => $service) {
                if (in_array($service['status'], $status) ) {
                    $filtredServices[$id] = $service;
                }
            }
            return $filtredServices;
        }
        return $this->services;
    }

    /**
     * @param mixed $services
     */
    public function setServices($services)
    {
        $this->services = $services;
    }


}