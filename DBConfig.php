<?php

/**
 * This file is part of gruppe4/umfrage-zero-waste.
 *
 * Copyright (c) 2019 Gruppe 4
 *
 * @package   gruppe4/umfrage-zero-waste
 * @author    Wilfried Hehr <hehrwil@uni-hildesheim.de>
 * @author    Vanessa Brinkmann <brink005@uni-hildesheim.de>
 * @author    Ghada Dridi <dridig@uni-hildesheim.de>
 * @author    Richard Henkenjohann <henkenjo@uni-hildesheim.de>
 * @author    Johanan Zellmer <zellmer@uni-hildesheim.de>
 * @copyright 2019 Gruppe 4
 * @license   LICENSE proprietary
 */

/**
 * Class DBConfig
 */
class DBConfig
{
    private   $serverNamePHP;
    private   $userNamePHP;
    private   $passCodePHP;
    private   $dbNamePHP;
    protected $connectionStringPHP;

    public function __construct()
    {
        $this->serverNamePHP = '127.0.0.1:3306';
        $this->userNamePHP   = 'root';
        $this->passCodePHP   = '';
        $this->dbNamePHP     = 'zerowaste';

        $this->dbConnect();
    }

    private function dbConnect(): \mysqli
    {
        $this->connectionStringPHP = mysqli_connect($this->serverNamePHP, $this->userNamePHP, $this->passCodePHP);
        mysqli_select_db($this->connectionStringPHP, $this->dbNamePHP);
        mysqli_set_charset($this->connectionStringPHP, 'utf8');

        if (mysqli_connect_errno()) {
            die('Connect failed: ' . mysqli_connect_error());
        }

        return $this->connectionStringPHP;
    }

    private function dbDisconnect()
    {
        mysqli_close($this->connectionStringPHP);

        $this->serverNamePHP = null;
        $this->userNamePHP   = null;
        $this->passCodePHP   = null;
        $this->dbNamePHP     = null;

        return $this->connectionStringPHP;
    }

    public function __destruct()
    {
        $this->dbDisconnect();
    }
}

