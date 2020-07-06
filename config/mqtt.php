<?php
/**
 * Created by PhpStorm.
 * User: salman
 * Date: 2/22/19
 * Time: 1:29 PM
 */

return [

    'host'     => env('mqtt_host','http://m15.cloudmqtt.com'),
    'password' => env('mqtt_password','vzbr4DnPz1Af'),
    'username' => env('mqtt_username','aqeiblzz'),
    'certfile' => env('mqtt_cert_file',''),
    'port'     => env('mqtt_port','12472'),
    'debug'    => env('mqtt_debug',false), //Optional Parameter to enable debugging set it to True
    'qos'      => env('mqtt_qos', 0), // set quality of service here
    'retain'   => env('mqtt_retain', 0) // it should be 0 or 1 Whether the message should be retained.- Retain Flag
];
