<?php

    /*
     * SendPulse REST API Usage Example
     *
     * Documentation
     * https://login.sendpulse.com/manual/rest-api/
     * https://sendpulse.com/api
     */

    require_once( 'api/sendpulseInterface.php' );
    require_once( 'api/sendpulse.php' );

    // https://login.sendpulse.com/settings/#api
    define( 'API_USER_ID', '' );
    define( 'API_SECRET', '' );

    define( 'TOKEN_STORAGE', 'file' );

    $SPApiProxy = new SendpulseApi( API_USER_ID, API_SECRET, TOKEN_STORAGE );

    // Get Mailing Lists list example
    var_dump( $SPApiProxy->listAddressBooks() );

    // Send mail using SMTP
    $email = array(
        'html' => '<p>Hello!</p>',
        'text' => 'text',
        'subject' => 'Mail subject',
        'from' => array(
            'name' => 'John',
            'email' => 'John@domain.com'
        ),
        'to' => array(
            array(
                'name' => 'Client',
                'email' => 'client@domain.com'
            )
        ),
        'bcc' => array(
            array(
                'name' => 'Manager',
                'email' => 'manager@domain.com'
            )
        ),
        'attachments' => array(
            'file.txt' => file_get_contents(PATH_TO_ATTACH_FILE)
        )
    );
    var_dump($SPApiProxy->smtpSendMail($email));


    /*
     * Example: create new push
     */

    $task = array(
        'title'      => 'Hello!',
        'body'       => 'This is my first push message',
        'website_id' => 1,
        'ttl'        => 20,
        'stretch_time' => 10
    );
    // This is optional
    $additionalParams = array(
        'link' => 'http://yoursite.com',
        'filter_browsers' => 'Chrome,Safari',
        'filter_lang' => 'en',
        'filter' => '{"variable_name":"some","operator":"or","conditions":[{"condition":"likewith","value":"a"},{"condition":"notequal","value":"b"}]}'
    );
    var_dump($SPApiProxy->createPushTask($task, $additionalParams));