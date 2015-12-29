<?php

/*
 * SendPulse REST API PHP Class
 *
 * Documentation
 * https://login.sendpulse.com/manual/rest-api/
 * https://sendpulse.com/api
 *
 */

class SendpulseApi implements SendpulseApi_Interface {

    private $apiUrl = 'https://api.sendpulse.com';

    private $userId = NULL;
    private $secret = NULL;
    private $token = NULL;

    private $refreshToken = 0;

    /*
     *  Define where script will save access token
     *  Types: session, file, memcache
     */
    private $storageType = '';

    private $apiFilesPath = '';


    /**
     * Sendpulse API constructor
     *
     * @param $userId
     * @param $secret
     * @param string $storageType
     *        Define where script will save access token
     *        Types: session, file, memcache
     * @throws Exception
     */
    public function __construct( $userId, $secret, $storageType = 'file' ) {
        if( empty( $userId ) || empty( $secret ) ) {
            throw new Exception( 'Empty ID or SECRET' );
        }

        $this->userId = $userId;
        $this->secret = $secret;
        $this->storageType = $storageType;
        $hashName = md5( $userId . '::' . $secret );

        switch ($this->storageType) {
            case 'session':
                if (isset($_SESSION[$hashName]) && !empty($_SESSION[$hashName])) {
                    $this->token = $_SESSION[$hashName];
                }
                break;
            case 'memcache':
                $memcache = new Memcache();
                $memcache->connect('localhost', 11211) or die('Could not connect to Memcache');
                $token = $memcache->get($hashName);
                if (!empty($token)) {
                    $this->token = $token;
                }
                break;
            default:
                $filePath = $this->apiFilesPath.$hashName;
                if (file_exists($filePath)) {
                    $this->token = file_get_contents($filePath);
                }
        }

        if( empty( $this->token ) ) {
            if( !$this->getToken() ) {
                throw new Exception( 'Could not connect to api, check your ID and SECRET' );
            }
        }
    }

    /**
     * Get token and store it
     *
     * @return bool
     */
    private function getToken() {
        $data = array(
            'grant_type'    => 'client_credentials',
            'client_id'     => $this->userId,
            'client_secret' => $this->secret,
        );

        $requestResult = $this->sendRequest( 'oauth/access_token', 'POST', $data, false );

        if( $requestResult->http_code != 200 ) {
            return false;
        }

        $this->refreshToken = 0;
        $this->token = $requestResult->data->access_token;

        $hashName = md5( $this->userId . '::' . $this->secret );
        switch ($this->storageType) {
            case 'session':
                $_SESSION[$hashName] = $this->token;
                break;
            case 'memcache':
                $memcache = new Memcache();
                $memcache->connect('localhost', 11211) or die('Could not connect to Memcache');
                $memcache->set($hashName, $this->token, false, 3600);
                break;
            default:
                $tokenFile = fopen($this->apiFilesPath.$hashName, "w");
                fwrite($tokenFile, $this->token);
                fclose($tokenFile);
        }

        return true;
    }

    /**
     * Form and send request to API service
     *
     * @param $path
     * @param string $method
     * @param array $data
     * @param bool $useToken
     * @return array|NULL
     */
    private function sendRequest( $path, $method = 'GET', $data = array(), $useToken = true ) {
        $url = $this->apiUrl . '/' . $path;
        $method = strtoupper( $method );
        $curl = curl_init();

        if( $useToken && !empty( $this->token ) ) {
            $headers = array( 'Authorization: Bearer ' . $this->token );
            curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );
        }

        switch( $method ) {
            case 'POST':
                curl_setopt( $curl, CURLOPT_POST, count( $data ) );
                curl_setopt( $curl, CURLOPT_POSTFIELDS, http_build_query( $data ) );
                break;
            case 'PUT':
                curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "PUT" );
                curl_setopt( $curl, CURLOPT_POSTFIELDS, http_build_query( $data ) );
                break;
            case 'DELETE':
                curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, 'DELETE' );
                curl_setopt( $curl, CURLOPT_POSTFIELDS, http_build_query( $data ) );
                break;
            default:
                if( !empty( $data ) ) {
                    $url .= '?' . http_build_query( $data );
                }
        }

        curl_setopt( $curl, CURLOPT_URL, $url );
        curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $curl, CURLOPT_HEADER, 1 );

        $response = curl_exec( $curl );
        $header_size = curl_getinfo( $curl, CURLINFO_HEADER_SIZE );
        $headerCode = curl_getinfo( $curl, CURLINFO_HTTP_CODE );
        $responseBody = substr( $response, $header_size );

        curl_close( $curl );

        if( $headerCode == 401 && $this->refreshToken == 0 ) {
            $this->refreshToken += 1;
            $this->getToken();
            $return = $this->sendRequest( $path, $method, $data );
        } else {
            $return = new stdClass();
            $return->data = json_decode( $responseBody );
            $return->http_code = $headerCode;
        }

        return $return;
    }

    /**
     * Process results
     *
     * @param $data
     * @return mixed
     */
    private function handleResult( $data ) {
        if( empty( $data->data ) ) {
            $data->data = new stdClass();
        }
        if( $data->http_code != 200 ) {
            $data->data->is_error = true;
            $data->data->http_code = $data->http_code;
        }

        return $data->data;
    }

    /**
     * Process errors
     *
     * @param null $customMessage
     * @return stdClass
     */
    private function handleError( $customMessage = NULL ) {
        $message = new stdClass();
        $message->is_error = true;
        if( !is_null( $customMessage ) ) {
            $message->message = $customMessage;
        }

        return $message;
    }


    /*
     * API interface implementation
     */


    /**
     * Create address book
     *
     * @param $bookName
     * @return mixed|stdClass
     */
    public function createAddressBook( $bookName ) {
        if( empty( $bookName ) ) {
            return $this->handleError( 'Empty book name' );
        }

        $data = array( 'bookName' => $bookName );
        $requestResult = $this->sendRequest( 'addressbooks', 'POST', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * Edit address book name
     *
     * @param $id
     * @param $newName
     * @return mixed|stdClass
     */
    public function editAddressBook( $id, $newName ) {
        if( empty( $newName ) || empty( $id ) ) {
            return $this->handleError( 'Empty new name or book id' );
        }

        $data = array( 'name' => $newName );
        $requestResult = $this->sendRequest( 'addressbooks/' . $id, 'PUT', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * Remove address book
     *
     * @param $id
     * @return mixed|stdClass
     */
    public function removeAddressBook( $id ) {
        if( empty( $id ) ) {
            return $this->handleError( 'Empty book id' );
        }

        $requestResult = $this->sendRequest( 'addressbooks/' . $id, 'DELETE' );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get list of address books
     *
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function listAddressBooks( $limit = NULL, $offset = NULL ) {
        $data = array();
        if( !is_null( $limit ) ) {
            $data['limit'] = $limit;
        }
        if( !is_null( $offset ) ) {
            $data['offset'] = $offset;
        }

        $requestResult = $this->sendRequest( 'addressbooks', 'GET', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get information about book
     *
     * @param $id
     * @return mixed|stdClass
     */
    public function getBookInfo( $id ) {
        if( empty( $id ) ) {
            return $this->handleError( 'Empty book id' );
        }

        $requestResult = $this->sendRequest( 'addressbooks/' . $id );

        return $this->handleResult( $requestResult );
    }

    /**
     * List email addresses from book
     *
     * @param $id
     * @return mixed|stdClass
     */
    public function getEmailsFromBook( $id ) {
        if( empty( $id ) ) {
            return $this->handleError( 'Empty book id' );
        }

        $requestResult = $this->sendRequest( 'addressbooks/' . $id . '/emails' );

        return $this->handleResult( $requestResult );
    }

    /**
     * Add new emails to address book
     *
     * @param $bookId
     * @param $emails
     * @return mixed|stdClass
     */
    public function addEmails( $bookId, $emails ) {
        if( empty( $bookId ) || empty( $emails ) ) {
            return $this->handleError( 'Empty book id or emails' );
        }

        $data = array(
            'emails' => serialize( $emails )
        );

        $requestResult = $this->sendRequest( 'addressbooks/' . $bookId . '/emails', 'POST', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * Remove email addresses from book
     *
     * @param $bookId
     * @param $emails
     * @return mixed|stdClass
     */
    public function removeEmails( $bookId, $emails ) {
        if( empty( $bookId ) || empty( $emails ) ) {
            return $this->handleError( 'Empty book id or emails' );
        }

        $data = array(
            'emails' => serialize( $emails )
        );

        $requestResult = $this->sendRequest( 'addressbooks/' . $bookId . '/emails', 'DELETE', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get information about email address from book
     *
     * @param $bookId
     * @param $email
     * @return mixed|stdClass
     */
    public function getEmailInfo( $bookId, $email ) {
        if( empty( $bookId ) || empty( $email ) ) {
            return $this->handleError( 'Empty book id or email' );
        }

        $requestResult = $this->sendRequest( 'addressbooks/' . $bookId . '/emails/' . $email );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get cost of campaign based on address book
     *
     * @param $bookId
     * @return mixed|stdClass
     */
    public function campaignCost( $bookId ) {
        if( empty( $bookId ) ) {
            return $this->handleError( 'Empty book id' );
        }

        $requestResult = $this->sendRequest( 'addressbooks/' . $bookId . '/cost' );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get list of campaigns
     *
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function listCampaigns( $limit = NULL, $offset = NULL ) {
        $data = array();
        if( !empty( $limit ) ) {
            $data['limit'] = $limit;
        }
        if( !empty( $offset ) ) {
            $data['offset'] = $offset;
        }
        $requestResult = $this->sendRequest( 'campaigns', 'GET', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get information about campaign
     *
     * @param $id
     * @return mixed|stdClass
     */
    public function getCampaignInfo( $id ) {
        if( empty( $id ) ) {
            return $this->handleError( 'Empty campaign id' );
        }

        $requestResult = $this->sendRequest( 'campaigns/' . $id );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get campaign statistic by countries
     *
     * @param $id
     * @return mixed|stdClass
     */
    public function campaignStatByCountries( $id ) {
        if( empty( $id ) ) {
            return $this->handleError( 'Empty campaign id' );
        }

        $requestResult = $this->sendRequest( 'campaigns/' . $id . '/countries' );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get campaign statistic by referrals
     *
     * @param $id
     * @return mixed|stdClass
     */
    public function campaignStatByReferrals( $id ) {
        if( empty( $id ) ) {
            return $this->handleError( 'Empty campaign id' );
        }

        $requestResult = $this->sendRequest( 'campaigns/' . $id . '/referrals' );

        return $this->handleResult( $requestResult );
    }

    /**
     * Create new campaign
     *
     * @param $senderName
     * @param $senderEmail
     * @param $subject
     * @param $body
     * @param $bookId
     * @param string $name
     * @param string $attachments
     * @return mixed
     */
    public function createCampaign( $senderName, $senderEmail, $subject, $body, $bookId, $name = '', $attachments = '' ) {
        if( empty( $senderName ) || empty( $senderEmail ) || empty( $subject ) || empty( $body ) || empty( $bookId ) ) {
            return $this->handleError( 'Not all data.' );
        }

        if( !empty( $attachments ) ) {
            $attachments = serialize( $attachments );
        }
        $data = array(
            'sender_name'  => $senderName,
            'sender_email' => $senderEmail,
            'subject'      => $subject,
            'body'         => base64_encode( $body ),
            'list_id'      => $bookId,
            'name'         => $name,
            'attachments'  => $attachments
        );

        $requestResult = $this->sendRequest( 'campaigns', 'POST', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * Cancel campaign
     *
     * @param $id
     * @return mixed|stdClass
     */
    public function cancelCampaign( $id ) {
        if( empty( $id ) ) {
            return $this->handleError( 'Empty campaign id' );
        }

        $requestResult = $this->sendRequest( 'campaigns/' . $id, 'DELETE' );

        return $this->handleResult( $requestResult );
    }

    /**
     * List all senders
     *
     * @return mixed
     */
    public function listSenders() {
        $requestResult = $this->sendRequest( 'senders' );

        return $this->handleResult( $requestResult );
    }

    /**
     * Add new sender
     *
     * @param $senderName
     * @param $senderEmail
     * @return mixed|stdClass
     */
    public function addSender( $senderName, $senderEmail ) {
        if( empty( $senderName ) || empty( $senderEmail ) ) {
            return $this->handleError( 'Empty sender name or email' );
        }

        $data = array(
            'email' => $senderEmail,
            'name'  => $senderName
        );

        $requestResult = $this->sendRequest( 'senders', 'POST', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * Remove sender
     *
     * @param $email
     * @return mixed|stdClass
     */
    public function removeSender( $email ) {
        if( empty( $email ) ) {
            return $this->handleError( 'Empty email' );
        }

        $data = array(
            'email' => $email
        );

        $requestResult = $this->sendRequest( 'senders', 'DELETE', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * Activate sender using code
     *
     * @param $email
     * @param $code
     * @return mixed|stdClass
     */
    public function activateSender( $email, $code ) {
        if( empty( $email ) || empty( $code ) ) {
            return $this->handleError( 'Empty email or activation code' );
        }

        $data = array(
            'code' => $code
        );

        $requestResult = $this->sendRequest( 'senders/' . $email . '/code', 'POST', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * Request mail with activation code
     *
     * @param $email
     * @return mixed|stdClass
     */
    public function getSenderActivationMail( $email ) {
        if( empty( $email ) ) {
            return $this->handleError( 'Empty email' );
        }

        $requestResult = $this->sendRequest( 'senders/' . $email . '/code' );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get global information about email
     *
     * @param $email
     * @return mixed|stdClass
     */
    public function getEmailGlobalInfo( $email ) {
        if( empty( $email ) ) {
            return $this->handleError( 'Empty email' );
        }

        $requestResult = $this->sendRequest( 'emails/' . $email );

        return $this->handleResult( $requestResult );
    }

    /**
     * Remove email from all books
     *
     * @param $email
     * @return mixed|stdClass
     */
    public function removeEmailFromAllBooks( $email ) {
        if( empty( $email ) ) {
            return $this->handleError( 'Empty email' );
        }

        $requestResult = $this->sendRequest( 'emails/' . $email, 'DELETE' );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get email statistic by all campaigns
     *
     * @param $email
     * @return mixed|stdClass
     */
    public function emailStatByCampaigns( $email ) {
        if( empty( $email ) ) {
            return $this->handleError( 'Empty email' );
        }

        $requestResult = $this->sendRequest( 'emails/' . $email . '/campaigns' );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get all emails from blacklist
     *
     * @return mixed
     */
    public function getBlackList() {
        $requestResult = $this->sendRequest( 'blacklist' );

        return $this->handleResult( $requestResult );
    }

    /**
     * Add email to blacklist
     *
     * @param $emails - string with emails, separator - ,
     * @param string $comment
     * @return mixed|stdClass
     */
    public function addToBlackList( $emails, $comment = '' ) {
        if( empty( $emails ) ) {
            return $this->handleError( 'Empty email' );
        }

        $data = array(
            'emails'  => base64_encode( $emails ),
            'comment' => $comment
        );

        $requestResult = $this->sendRequest( 'blacklist', 'POST', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * Remove emails from blacklist
     *
     * @param $emails - string with emails, separator - ,
     * @return mixed|stdClass
     */
    public function removeFromBlackList( $emails ) {
        if( empty( $emails ) ) {
            return $this->handleError( 'Empty email' );
        }

        $data = array(
            'emails' => base64_encode( $emails )
        );

        $requestResult = $this->sendRequest( 'blacklist', 'DELETE', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get balance
     *
     * @param string $currency
     * @return mixed
     */
    public function getBalance( $currency = '' ) {
        $currency = strtoupper( $currency );
        $url = 'balance';
        if( !empty( $currency ) ) {
            $url .= '/' . strtoupper( $currency );
        }

        $requestResult = $this->sendRequest( $url );

        return $this->handleResult( $requestResult );
    }

    /**
     * SMTP: get list of emails
     *
     * @param int $limit
     * @param int $offset
     * @param string $fromDate
     * @param string $toDate
     * @param string $sender
     * @param string $recipient
     * @return mixed
     */
    public function smtpListEmails( $limit = 0, $offset = 0, $fromDate = '', $toDate = '', $sender = '', $recipient = '' ) {
        $data = array(
            'limit'     => $limit,
            'offset'    => $offset,
            'from'      => $fromDate,
            'to'        => $toDate,
            'sender'    => $sender,
            'recipient' => $recipient
        );

        $requestResult = $this->sendRequest( '/smtp/emails', 'GET', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get information about email by id
     *
     * @param $id
     * @return mixed|stdClass
     */
    public function smtpGetEmailInfoById( $id ) {
        if( empty( $id ) ) {
            return $this->handleError( 'Empty id' );
        }

        $requestResult = $this->sendRequest( '/smtp/emails/' . $id );

        return $this->handleResult( $requestResult );
    }

    /**
     * SMTP: add emails to unsubscribe list
     *
     * @param $emails
     * @return mixed|stdClass
     */
    public function smtpUnsubscribeEmails( $emails ) {
        if( empty( $emails ) ) {
            return $this->handleError( 'Empty emails' );
        }

        $data = array(
            'emails' => serialize( $emails )
        );

        $requestResult = $this->sendRequest( '/smtp/unsubscribe', 'POST', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * SMTP: remove emails from unsubscribe list
     *
     * @param $emails
     * @return mixed|stdClass
     */
    public function smtpRemoveFromUnsubscribe( $emails ) {
        if( empty( $emails ) ) {
            return $this->handleError( 'Empty emails' );
        }

        $data = array(
            'emails' => serialize( $emails )
        );

        $requestResult = $this->sendRequest( '/smtp/unsubscribe', 'DELETE', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get list of IP
     *
     * @return mixed
     */
    public function smtpListIP() {
        $requestResult = $this->sendRequest( 'smtp/ips' );

        return $this->handleResult( $requestResult );
    }

    /**
     * SMTP: get list of allowed domains
     *
     * @return mixed
     */
    public function smtpListAllowedDomains() {
        $requestResult = $this->sendRequest( 'smtp/domains' );

        return $this->handleResult( $requestResult );
    }

    /**
     * SMTP: add new domain
     *
     * @param $email
     * @return mixed|stdClass
     */
    public function smtpAddDomain( $email ) {
        if( empty( $email ) ) {
            return $this->handleError( 'Empty email' );
        }

        $data = array(
            'email' => $email
        );

        $requestResult = $this->sendRequest( 'smtp/domains', 'POST', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * SMTP: verify domain
     *
     * @param $email
     * @return mixed|stdClass
     */
    public function smtpVerifyDomain( $email ) {
        if( empty( $email ) ) {
            return $this->handleError( 'Empty email' );
        }

        $requestResult = $this->sendRequest( 'smtp/domains/' . $email );

        return $this->handleResult( $requestResult );
    }

    /**
     * SMTP: send mail
     *
     * @param $email
     * @return mixed|stdClass
     */
    public function smtpSendMail( $email ) {
        if( empty( $email ) ) {
            return $this->handleError( 'Empty email data' );
        }

        $email['html'] = base64_encode( $email['html'] );
        $data = array(
            'email' => serialize( $email )
        );

        $requestResult = $this->sendRequest( 'smtp/emails', 'POST', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get list of push campaigns
     *
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function pushListCampaigns($limit = NULL, $offset = NULL) {
        $data = array();
        if( !is_null( $limit ) ) {
            $data['limit'] = $limit;
        }
        if( !is_null( $offset ) ) {
            $data['offset'] = $offset;
        }

        $requestResult = $this->sendRequest( 'push/tasks', 'GET', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get list of websites
     *
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function pushListWebsites( $limit = NULL, $offset = NULL ) {
        $data = array();
        if( !is_null( $limit ) ) {
            $data['limit'] = $limit;
        }
        if( !is_null( $offset ) ) {
            $data['offset'] = $offset;
        }

        $requestResult = $this->sendRequest( 'push/websites', 'GET', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get amount of websites
     *
     * @return mixed
     */
    public function pushCountWebsites() {
        $requestResult = $this->sendRequest( 'push/websites/total', 'GET' );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get list of all variables for website
     *
     * @param $websiteId
     * @return mixed
     */
    public function pushListWebsiteVariables( $websiteId ) {
        $requestResult = $this->sendRequest( 'push/websites/'.$websiteId.'/variables', 'GET' );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get list of subscriptions for the website
     *
     * @param $websiteId
     * @return mixed
     */
    public function pushListWebsiteSubscriptions( $websiteId, $limit = NULL, $offset = NULL ) {
        $data = array();
        if( !is_null( $limit ) ) {
            $data['limit'] = $limit;
        }
        if( !is_null( $offset ) ) {
            $data['offset'] = $offset;
        }

        $requestResult = $this->sendRequest( 'push/websites/'.$websiteId.'/subscriptions', 'GET', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * Get amount of subscriptions for the site
     *
     * @param $websiteId
     * @return mixed
     */
    public function pushCountWebsiteSubscriptions( $websiteId ) {
        $requestResult = $this->sendRequest( 'push/websites/'.$websiteId.'/subscriptions/total', 'GET' );

        return $this->handleResult( $requestResult );
    }

    /**
     * Set state for subscription
     *
     * @param $subscriptionId
     * @param $stateValue
     * @return mixed
     */
    public function pushSetSubscriptionState( $subscriptionId, $stateValue ) {
        $data = array(
            'id' => $subscriptionId,
            'state' => $stateValue
        );

        $requestResult = $this->sendRequest( 'push/subscriptions/state', 'POST', $data );

        return $this->handleResult( $requestResult );
    }

    /**
     * Create new push campaign
     *
     * @param $taskInfo
     * @param array $additionalParams
     * @return mixed|stdClass
     */
    public function createPushTask( $taskInfo, $additionalParams = array() ) {
        $data = $taskInfo;
        if (!isset($data['ttl'])) {
            $data['ttl'] = 0;
        }
        if( empty($data['title']) || empty($data['website_id']) || empty($data['body']) ) {
            return $this->handleError( 'Not all data' );
        }
        if ($additionalParams) {
            foreach($additionalParams as $key=>$val) {
                $data[$key] = $val;
            }
        }

        $requestResult = $this->sendRequest( '/push/tasks', 'POST', $data );

        return $this->handleResult( $requestResult );
    }
}