<?php

Abstract class PersonsFactoryAbstract
{

    public abstract function search($idOrName);

    public abstract function getData(array $status = []);
}