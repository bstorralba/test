<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function __autoload($className) {
    $file = "models/".$className.'.php';
    if(file_exists($file)) {
        require_once $file;
    }
}

require_once '../models/memberdb.php';

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define('DB_LOGIN', "logindb");
define('DB_MEMBERS', "trytoinsert");

$member_db = new MemberDatabase($user_manager);
$member_db->setupDb(DB_HOST, DB_USER, DB_PASS, DB_LOGIN, DB_MEMBERS);