<?php

    /*
     * SendPulse REST API Usage Example
     *
     * Documentation
     * https://login.sendpulse.com/manual/rest-api/
     * https://sendpulse.com/api
     */

    session_start();

    require_once( 'api/sendpulseInterface.php' );
    require_once( 'api/sendpulse.php' );

    // https://login.sendpulse.com/settings/#api
    define( 'API_USER_ID', '' );
    define( 'API_SECRET', '' );

    $SPApiProxy = new SendpulseApi( API_USER_ID, API_SECRET );

    // Get Mailing Lists list example
    var_dump( $SPApiProxy->listAddressBooks() );
