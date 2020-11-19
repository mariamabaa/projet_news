<?php

    require_once ('./nusoap-0/lib/nusoap.php');

    // Webservice server WSDL URL address
    $wsdl = "http://localhost/tp_al/mvc/avec_mvc/soap-ws/soap-ws/server.php?wsdl";

    // Create client object
    $client = new nusoap_client($wsdl, 'wsdl');
    // $err = $client -> getError ();
    // // if ($err) {
    // //     echo '<h2> Constructor error </h2>' . $err;
    // //     exit();
    // // }

    // Call the hello method

    // $result1 = $client->call('get_users', array("u" => "ok"));
    $result2 = $client->call('hello', array("username" => "ok"));
    // echo $result1;
    echo $result2;
?>