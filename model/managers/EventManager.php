<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class EventManager extends Manager {


    protected $className = "Model\Entities\Event";
    protected $tableName = "event";






    public function __construct() {
        parent::connect();
    }

    
}
