<?php

/*
 * SendPulse REST API Client
 *
 * Documentation
 * https://login.sendpulse.com/manual/rest-api/
 * https://sendpulse.com/api
 *
 */

namespace Sendpulse\RestApi;

use Exception;
use Sendpulse\RestApi\Storage\FileStorage;
use Sendpulse\RestApi\Storage\TokenStorageInterface;
use stdClass;

class ApiClient implements ApiInterface
{

    private $apiUrl = 'https://api.sendpulse.com';

    private $userId;
    private $secret;
    private $token;

    private $refreshToken = 0;

    /**
     * @var null|TokenStorageInterface
     */
    private $tokenStorage;


    /**
     * Sendpulse API constructor
     *
     * @param                       $userId
     * @param                       $secret
     * @param TokenStorageInterface $tokenStorage
     *
     * @throws Exception
     */
    public function __construct($userId, $secret, TokenStorageInterface $tokenStorage = null)
    {
        if ($tokenStorage === null) {
            $tokenStorage = new FileStorage();
        }
        if (empty($userId) || empty($secret)) {
            throw new Exception('Empty ID or SECRET');
        }

        $this->userId = $userId;
        $this->secret = $secret;
        $this->tokenStorage = $tokenStorage;
        $hashName = md5($userId . '::' . $secret);

        /** load token from storage */
        $this->token = $this->tokenStorage->get($hashName);

        if (empty($this->token) && !$this->getToken()) {
            throw new Exception('Could not connect to api, check your ID and SECRET');
        }
    }

    /**
     * Get token and store it
     *
     * @return bool
     */
    private function getToken()
    {
        $data = array(
            'grant_type' => 'client_credentials',
            'client_id' => $this->userId,
            'client_secret' => $this->secret,
        );

        $requestResult = $this->sendRequest('oauth/access_token', 'POST', $data, false);

        if ($requestResult->http_code !== 200) {
            return false;
        }

        $this->refreshToken = 0;
        $this->token = $requestResult->data->access_token;

        $hashName = md5($this->userId . '::' . $this->secret);
        /** Save token to storage */
        $this->tokenStorage->set($hashName, $this->token);

        return true;
    }

    /**
     * Form and send request to API service
     *
     * @param        $path
     * @param string $method
     * @param array $data
     * @param bool $useToken
     *
     * @return stdClass
     */
    private function sendRequest($path, $method = 'GET', $data = array(), $useToken = true)
    {
        $url = $this->apiUrl . '/' . $path;
        $method = strtoupper($method);
        $curl = curl_init();

        if ($useToken && !empty($this->token)) {
            $headers = array('Authorization: Bearer ' . $this->token);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }

        switch ($method) {
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, count($data));
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case 'PUT':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case 'DELETE':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            default:
                if (!empty($data)) {
                    $url .= '?' . http_build_query($data);
                }
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 15);
        curl_setopt($curl, CURLOPT_TIMEOUT, 15);

        $response = curl_exec($curl);
        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $headerCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $responseBody = substr($response, $header_size);

        curl_close($curl);

        if ($headerCode === 401 && $this->refreshToken === 0) {
            ++$this->refreshToken;
            $this->getToken();
            $retval = $this->sendRequest($path, $method, $data);
        } else {
            $retval = new stdClass();
            $retval->data = json_decode($responseBody);
            $retval->http_code = $headerCode;
        }

        return $retval;
    }

    /**
     * Process results
     *
     * @param $data
     *
     * @return stdClass
     */
    private function handleResult($data)
    {
        if (empty($data->data)) {
            $data->data = new stdClass();
        }
        if ($data->http_code !== 200) {
            $data->data->is_error = true;
            $data->data->http_code = $data->http_code;
        }

        return $data->data;
    }

    /**
     * Process errors
     *
     * @param null $customMessage
     *
     * @return stdClass
     */
    private function handleError($customMessage = null)
    {
        $message = new stdClass();
        $message->is_error = true;
        if (null !== $customMessage) {
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
     *
     * @return stdClass
     */
    public function createAddressBook($bookName)
    {
        if (empty($bookName)) {
            return $this->handleError('Empty book name');
        }

        $data = array('bookName' => $bookName);
        $requestResult = $this->sendRequest('addressbooks', 'POST', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Edit address book name
     *
     * @param $id
     * @param $newName
     *
     * @return stdClass
     */
    public function editAddressBook($id, $newName)
    {
        if (empty($newName) || empty($id)) {
            return $this->handleError('Empty new name or book id');
        }

        $data = array('name' => $newName);
        $requestResult = $this->sendRequest('addressbooks/' . $id, 'PUT', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Remove address book
     *
     * @param $id
     *
     * @return stdClass
     */
    public function removeAddressBook($id)
    {
        if (empty($id)) {
            return $this->handleError('Empty book id');
        }

        $requestResult = $this->sendRequest('addressbooks/' . $id, 'DELETE');

        return $this->handleResult($requestResult);
    }

    /**
     * Get list of address books
     *
     * @param null $limit
     * @param null $offset
     *
     * @return mixed
     */
    public function listAddressBooks($limit = null, $offset = null)
    {
        $data = array();
        if (null !== $limit) {
            $data['limit'] = $limit;
        }
        if (null !== $offset) {
            $data['offset'] = $offset;
        }

        $requestResult = $this->sendRequest('addressbooks', 'GET', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Get information about book
     *
     * @param $id
     *
     * @return stdClass
     */
    public function getBookInfo($id)
    {
        if (empty($id)) {
            return $this->handleError('Empty book id');
        }

        $requestResult = $this->sendRequest('addressbooks/' . $id);

        return $this->handleResult($requestResult);
    }

    /**
     * Get variables from book
     *
     * @param $id
     *   Address book id.
     *
     * @return stdClass
     */
    public function getBookVariables($id)
    {
        if (empty($id)) {
            return $this->handleError('Empty book id');
        }

        $requestResult = $this->sendRequest('addressbooks/' . $id . '/variables');

        return $this->handleResult($requestResult);
    }

    /**
     * List email addresses from book
     *
     * @param $id
     * @param $limit
     * @param $offset
     *
     * @return stdClass
     */
    public function getEmailsFromBook($id, $limit = null, $offset = null)
    {
        if (empty($id)) {
            return $this->handleError('Empty book id');
        }

        $data = array();
        if (null !== $limit) {
            $data['limit'] = $limit;
        }
        if (null !== $offset) {
            $data['offset'] = $offset;
        }

        $requestResult = $this->sendRequest('addressbooks/' . $id . '/emails', 'GET', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Add new emails to address book
     *
     * @param $bookID
     * @param $emails
     *
     * @return stdClass
     */
    public function addEmails($bookID, $emails)
    {
        if (empty($bookID) || empty($emails)) {
            return $this->handleError('Empty book id or emails');
        }

        $data = array(
            'emails' => serialize($emails),
        );

        $requestResult = $this->sendRequest('addressbooks/' . $bookID . '/emails', 'POST', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Remove email addresses from book
     *
     * @param $bookID
     * @param $emails
     *
     * @return stdClass
     */
    public function removeEmails($bookID, $emails)
    {
        if (empty($bookID) || empty($emails)) {
            return $this->handleError('Empty book id or emails');
        }

        $data = array(
            'emails' => serialize($emails),
        );

        $requestResult = $this->sendRequest('addressbooks/' . $bookID . '/emails', 'DELETE', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Get information about email address from book
     *
     * @param $bookID
     * @param $email
     *
     * @return stdClass
     */
    public function getEmailInfo($bookID, $email)
    {
        if (empty($bookID) || empty($email)) {
            return $this->handleError('Empty book id or email');
        }

        $requestResult = $this->sendRequest('addressbooks/' . $bookID . '/emails/' . $email);

        return $this->handleResult($requestResult);
    }

    /**
     * Get cost of campaign based on address book
     *
     * @param $bookID
     *
     * @return stdClass
     */
    public function campaignCost($bookID)
    {
        if (empty($bookID)) {
            return $this->handleError('Empty book id');
        }

        $requestResult = $this->sendRequest('addressbooks/' . $bookID . '/cost');

        return $this->handleResult($requestResult);
    }

    /**
     * Get list of campaigns
     *
     * @param null $limit
     * @param null $offset
     *
     * @return mixed
     */
    public function listCampaigns($limit = null, $offset = null)
    {
        $data = array();
        if (!empty($limit)) {
            $data['limit'] = $limit;
        }
        if (!empty($offset)) {
            $data['offset'] = $offset;
        }
        $requestResult = $this->sendRequest('campaigns', 'GET', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Get information about campaign
     *
     * @param $id
     *
     * @return stdClass
     */
    public function getCampaignInfo($id)
    {
        if (empty($id)) {
            return $this->handleError('Empty campaign id');
        }

        $requestResult = $this->sendRequest('campaigns/' . $id);

        return $this->handleResult($requestResult);
    }

    /**
     * Get campaign statistic by countries
     *
     * @param $id
     *
     * @return stdClass
     */
    public function campaignStatByCountries($id)
    {
        if (empty($id)) {
            return $this->handleError('Empty campaign id');
        }

        $requestResult = $this->sendRequest('campaigns/' . $id . '/countries');

        return $this->handleResult($requestResult);
    }

    /**
     * Get campaign statistic by referrals
     *
     * @param $id
     *
     * @return stdClass
     */
    public function campaignStatByReferrals($id)
    {
        if (empty($id)) {
            return $this->handleError('Empty campaign id');
        }

        $requestResult = $this->sendRequest('campaigns/' . $id . '/referrals');

        return $this->handleResult($requestResult);
    }

    /**
     * Create new campaign
     *
     * @param        $senderName
     * @param        $senderEmail
     * @param        $subject
     * @param        $body
     * @param        $bookId
     * @param string $name
     * @param string $attachments
     * @param string $type
     *
     * @return mixed
     */
    public function createCampaign(
        $senderName,
        $senderEmail,
        $subject,
        $body,
        $bookId,
        $name = '',
        $attachments = '',
        $type = ''
    ) {
        if (empty($senderName) || empty($senderEmail) || empty($subject) || empty($body) || empty($bookId)) {
            return $this->handleError('Not all data.');
        }

        if (!empty($attachments)) {
            $attachments = serialize($attachments);
        }
        $data = array(
            'sender_name' => $senderName,
            'sender_email' => $senderEmail,
            'subject' => $subject,
            'body' => base64_encode($body),
            'list_id' => $bookId,
            'name' => $name,
            'attachments' => $attachments,
            'type' => $type,
        );

        $requestResult = $this->sendRequest('campaigns', 'POST', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Cancel campaign
     *
     * @param $id
     *
     * @return stdClass
     */
    public function cancelCampaign($id)
    {
        if (empty($id)) {
            return $this->handleError('Empty campaign id');
        }

        $requestResult = $this->sendRequest('campaigns/' . $id, 'DELETE');

        return $this->handleResult($requestResult);
    }

    /**
     * List all senders
     *
     * @return mixed
     */
    public function listSenders()
    {
        $requestResult = $this->sendRequest('senders');

        return $this->handleResult($requestResult);
    }

    /**
     * Add new sender
     *
     * @param $senderName
     * @param $senderEmail
     *
     * @return stdClass
     */
    public function addSender($senderName, $senderEmail)
    {
        if (empty($senderName) || empty($senderEmail)) {
            return $this->handleError('Empty sender name or email');
        }

        $data = array(
            'email' => $senderEmail,
            'name' => $senderName,
        );

        $requestResult = $this->sendRequest('senders', 'POST', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Remove sender
     *
     * @param $email
     *
     * @return stdClass
     */
    public function removeSender($email)
    {
        if (empty($email)) {
            return $this->handleError('Empty email');
        }

        $data = array(
            'email' => $email,
        );

        $requestResult = $this->sendRequest('senders', 'DELETE', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Activate sender using code
     *
     * @param $email
     * @param $code
     *
     * @return stdClass
     */
    public function activateSender($email, $code)
    {
        if (empty($email) || empty($code)) {
            return $this->handleError('Empty email or activation code');
        }

        $data = array(
            'code' => $code,
        );

        $requestResult = $this->sendRequest('senders/' . $email . '/code', 'POST', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Request mail with activation code
     *
     * @param $email
     *
     * @return stdClass
     */
    public function getSenderActivationMail($email)
    {
        if (empty($email)) {
            return $this->handleError('Empty email');
        }

        $requestResult = $this->sendRequest('senders/' . $email . '/code');

        return $this->handleResult($requestResult);
    }

    /**
     * Get global information about email
     *
     * @param $email
     *
     * @return stdClass
     */
    public function getEmailGlobalInfo($email)
    {
        if (empty($email)) {
            return $this->handleError('Empty email');
        }

        $requestResult = $this->sendRequest('emails/' . $email);

        return $this->handleResult($requestResult);
    }

    /**
     * Remove email from all books
     *
     * @param $email
     *
     * @return stdClass
     */
    public function removeEmailFromAllBooks($email)
    {
        if (empty($email)) {
            return $this->handleError('Empty email');
        }

        $requestResult = $this->sendRequest('emails/' . $email, 'DELETE');

        return $this->handleResult($requestResult);
    }

    /**
     * Get email statistic by all campaigns
     *
     * @param $email
     *
     * @return stdClass
     */
    public function emailStatByCampaigns($email)
    {
        if (empty($email)) {
            return $this->handleError('Empty email');
        }

        $requestResult = $this->sendRequest('emails/' . $email . '/campaigns');

        return $this->handleResult($requestResult);
    }

    /**
     * Get all emails from blacklist
     *
     * @return mixed
     */
    public function getBlackList()
    {
        $requestResult = $this->sendRequest('blacklist');

        return $this->handleResult($requestResult);
    }

    /**
     * Add email to blacklist
     *
     * @param        $emails - string with emails, separator - ,
     * @param string $comment
     *
     * @return stdClass
     */
    public function addToBlackList($emails, $comment = '')
    {
        if (empty($emails)) {
            return $this->handleError('Empty email');
        }

        $data = array(
            'emails' => base64_encode($emails),
            'comment' => $comment,
        );

        $requestResult = $this->sendRequest('blacklist', 'POST', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Remove emails from blacklist
     *
     * @param $emails - string with emails, separator - ,
     *
     * @return stdClass
     */
    public function removeFromBlackList($emails)
    {
        if (empty($emails)) {
            return $this->handleError('Empty email');
        }

        $data = array(
            'emails' => base64_encode($emails),
        );

        $requestResult = $this->sendRequest('blacklist', 'DELETE', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Get balance
     *
     * @param string $currency
     *
     * @return mixed
     */
    public function getBalance($currency = '')
    {
        $currency = strtoupper($currency);
        $url = 'balance';
        if (!empty($currency)) {
            $url .= '/' . strtoupper($currency);
        }

        $requestResult = $this->sendRequest($url);

        return $this->handleResult($requestResult);
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
     *
     * @return mixed
     */
    public function smtpListEmails($limit = 0, $offset = 0, $fromDate = '', $toDate = '', $sender = '', $recipient = '')
    {
        $data = array(
            'limit' => $limit,
            'offset' => $offset,
            'from' => $fromDate,
            'to' => $toDate,
            'sender' => $sender,
            'recipient' => $recipient,
        );

        $requestResult = $this->sendRequest('/smtp/emails', 'GET', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Get information about email by id
     *
     * @param $id
     *
     * @return stdClass
     */
    public function smtpGetEmailInfoById($id)
    {
        if (empty($id)) {
            return $this->handleError('Empty id');
        }

        $requestResult = $this->sendRequest('/smtp/emails/' . $id);

        return $this->handleResult($requestResult);
    }

    /**
     * SMTP: add emails to unsubscribe list
     *
     * @param $emails
     *
     * @return stdClass
     */
    public function smtpUnsubscribeEmails($emails)
    {
        if (empty($emails)) {
            return $this->handleError('Empty emails');
        }

        $data = array(
            'emails' => serialize($emails),
        );

        $requestResult = $this->sendRequest('/smtp/unsubscribe', 'POST', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * SMTP: remove emails from unsubscribe list
     *
     * @param $emails
     *
     * @return stdClass
     */
    public function smtpRemoveFromUnsubscribe($emails)
    {
        if (empty($emails)) {
            return $this->handleError('Empty emails');
        }

        $data = array(
            'emails' => serialize($emails),
        );

        $requestResult = $this->sendRequest('/smtp/unsubscribe', 'DELETE', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Get list of IP
     *
     * @return mixed
     */
    public function smtpListIP()
    {
        $requestResult = $this->sendRequest('smtp/ips');

        return $this->handleResult($requestResult);
    }

    /**
     * SMTP: get list of allowed domains
     *
     * @return mixed
     */
    public function smtpListAllowedDomains()
    {
        $requestResult = $this->sendRequest('smtp/domains');

        return $this->handleResult($requestResult);
    }

    /**
     * SMTP: add new domain
     *
     * @param $email
     *
     * @return stdClass
     */
    public function smtpAddDomain($email)
    {
        if (empty($email)) {
            return $this->handleError('Empty email');
        }

        $data = array(
            'email' => $email,
        );

        $requestResult = $this->sendRequest('smtp/domains', 'POST', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * SMTP: verify domain
     *
     * @param $email
     *
     * @return stdClass
     */
    public function smtpVerifyDomain($email)
    {
        if (empty($email)) {
            return $this->handleError('Empty email');
        }

        $requestResult = $this->sendRequest('smtp/domains/' . $email);

        return $this->handleResult($requestResult);
    }

    /**
     * SMTP: send mail
     *
     * @param $email
     *
     * @return stdClass
     */
    public function smtpSendMail($email)
    {
        if (empty($email)) {
            return $this->handleError('Empty email data');
        }

        $email['html'] = base64_encode($email['html']);
        $data = array(
            'email' => serialize($email),
        );

        $requestResult = $this->sendRequest('smtp/emails', 'POST', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Get list of push campaigns
     *
     * @param null $limit
     * @param null $offset
     *
     * @return mixed
     */
    public function pushListCampaigns($limit = null, $offset = null)
    {
        $data = array();
        if (null !== $limit) {
            $data['limit'] = $limit;
        }
        if (null !== $offset) {
            $data['offset'] = $offset;
        }

        $requestResult = $this->sendRequest('push/tasks', 'GET', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Get list of websites
     *
     * @param null $limit
     * @param null $offset
     *
     * @return mixed
     */
    public function pushListWebsites($limit = null, $offset = null)
    {
        $data = array();
        if (null !== $limit) {
            $data['limit'] = $limit;
        }
        if (null !== $offset) {
            $data['offset'] = $offset;
        }

        $requestResult = $this->sendRequest('push/websites', 'GET', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Get amount of websites
     *
     * @return mixed
     */
    public function pushCountWebsites()
    {
        $requestResult = $this->sendRequest('push/websites/total');

        return $this->handleResult($requestResult);
    }

    /**
     * Get list of all variables for website
     *
     * @param $websiteId
     *
     * @return mixed
     */
    public function pushListWebsiteVariables($websiteId)
    {
        $requestResult = $this->sendRequest('push/websites/' . $websiteId . '/variables');

        return $this->handleResult($requestResult);
    }

    /**
     * Get list of subscriptions for the website
     *
     * @param      $websiteID
     *
     * @param null $limit
     * @param null $offset
     *
     * @return mixed
     */
    public function pushListWebsiteSubscriptions($websiteID, $limit = null, $offset = null)
    {
        $data = array();
        if (null !== $limit) {
            $data['limit'] = $limit;
        }
        if (null !== $offset) {
            $data['offset'] = $offset;
        }

        $requestResult = $this->sendRequest('push/websites/' . $websiteID . '/subscriptions', 'GET', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Get amount of subscriptions for the site
     *
     * @param $websiteID
     *
     * @return mixed
     */
    public function pushCountWebsiteSubscriptions($websiteID)
    {
        $requestResult = $this->sendRequest('push/websites/' . $websiteID . '/subscriptions/total');

        return $this->handleResult($requestResult);
    }

    /**
     * Set state for subscription
     *
     * @param $subscriptionID
     * @param $stateValue
     *
     * @return mixed
     */
    public function pushSetSubscriptionState($subscriptionID, $stateValue)
    {
        $data = array(
            'id' => $subscriptionID,
            'state' => $stateValue,
        );

        $requestResult = $this->sendRequest('push/subscriptions/state', 'POST', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Create new push campaign
     *
     * @param       $taskInfo
     * @param array $additionalParams
     *
     * @return stdClass
     */
    public function createPushTask($taskInfo, array $additionalParams = array())
    {
        $data = $taskInfo;
        if (!isset($data['ttl'])) {
            $data['ttl'] = 0;
        }
        if (empty($data['title']) || empty($data['website_id']) || empty($data['body'])) {
            return $this->handleError('Not all data');
        }
        if ($additionalParams) {
            foreach ($additionalParams as $key => $val) {
                $data[$key] = $val;
            }
        }

        $requestResult = $this->sendRequest('/push/tasks', 'POST', $data);

        return $this->handleResult($requestResult);
    }

    /**
     * Get integration code for Push Notifications.
     *
     * @param $websiteID
     *
     * @return stdClass
     */
    public function getPushIntegrationCode($websiteID)
    {
        if (empty($websiteID)) {
            return $this->handleError('Empty website id');
        }

        $requestResult = $this->sendRequest('/push/websites/' . $websiteID . '/code');

        return $this->handleResult($requestResult);
    }

    /**
     * Get stats for push campaign
     *
     * @param $campaignID
     *
     * @return stdClass
     */
    public function getPushCampaignStat($campaignID)
    {
        $requestResult = $this->sendRequest('push/tasks/' . $campaignID);

        return $this->handleResult($requestResult);
    }

    /**
     * @Author Maksym Dzhym m.jim@sendpulse.com
     * @param $eventName
     * @param array $variables
     * @return stdClass
     */
    public function startEventAutomation360($eventName, array $variables)
    {
        if (!$eventName) {
            return $this->handleError('Event name is empty');
        }
        if (!array_key_exists('email', $variables) && !array_key_exists('phone', $variables)) {
            return $this->handleError('Email and phone is empty');
        }

        $requestResult = $this->sendRequest('events/name/' . $eventName, 'POST', $variables);

        return $this->handleResult($requestResult);
    }
}
