<?php

interface CustomerInterface
{
    public function searchData($idOrName);

    public function getInfo();

    public function getContracts();

    public function getServices();

}