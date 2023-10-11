<?php

/*
 * SendPulse REST API Client
 *
 * Documentation
 * https://sendpulse.com/api
 */

namespace Sendpulse\RestApi;

use Sendpulse\RestApi\Contracts\ApiInterface;
use Sendpulse\RestApi\Contracts\TokenStorageInterface;
use Sendpulse\RestApi\Storage\FileStorage;

/**
 * @link https://sendpulse.com/api
 */
class ApiClient implements ApiInterface
{

    /**
     * @var string
     */
    private $apiUrl = 'https://api.sendpulse.com';

    /**
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $secret;

    /**
     * @var string|null
     */
    private $token;

    /**
     * @var bool
     */
    private $refreshToken = false;

    /**
     * @var TokenStorageInterface|FileStorage|null
     */
    private $tokenStorage;


    /**
     * ApiClient constructor
     * @param string $userId
     * @param string $secret
     * @param TokenStorageInterface|null $tokenStorage
     * @throws ApiClientException
     */
    public function __construct(string $userId, string $secret, TokenStorageInterface $tokenStorage = null)
    {
        if ($tokenStorage === null) {
            $tokenStorage = new FileStorage();
        }
        if (empty($userId) || empty($secret)) {
            throw new ApiClientException('Empty ID or SECRET');
        }

        $this->userId = $userId;
        $this->secret = $secret;
        $this->tokenStorage = $tokenStorage;
        $hashName = md5($userId . '::' . $secret);

        /** load token from storage */
        $this->token = $this->tokenStorage->get($hashName);
        if (empty($this->token) && !$this->getToken()) {
            throw new ApiClientException('Could not connect to api, check your ID and SECRET');
        }
    }

    /**
     * Get token and store it
     * @link https://sendpulse.com/integrations/api#auth
     * @return bool
     * @throws ApiClientException
     */
    private function getToken(): bool
    {
        $tokenResponse = $this->sendRequest('oauth/access_token', self::METHOD_POST, [
            'grant_type' => 'client_credentials',
            'client_id' => $this->userId,
            'client_secret' => $this->secret,
        ], false);

        if (empty($tokenResponse['access_token'])) {
            return false;
        }

        $this->refreshToken = false;
        $this->token = $tokenResponse['access_token'];

        $hashName = md5($this->userId . '::' . $this->secret);

        return $this->tokenStorage->set($hashName, $this->token);
    }

    /**
     * Form and send request to API service
     * @param string $path
     * @param string $method
     * @param array $data
     * @param bool $useToken
     * @return array|null
     * @throws ApiClientException
     */
    protected function sendRequest(string $path, string $method = self::METHOD_GET, array $data = [], bool $useToken = true): ?array
    {
        $url = $this->apiUrl . '/' . $path;
        $curl = curl_init();

        $headers = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Expect:'
        ];

        if ($useToken && !empty($this->token)) {
            $headers[] = 'Authorization: ' . self::TOKEN_TYPE_BEARER . ' ' . $this->token;
        }

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        switch ($method) {
            case self::METHOD_POST:
                curl_setopt($curl, CURLOPT_POST, count($data));
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                break;
            case self::METHOD_PUT:
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, self::METHOD_PUT);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                break;
            case self::METHOD_PATCH:
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, self::METHOD_PATCH);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                break;
            case self::METHOD_DELETE:
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, self::METHOD_DELETE);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
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
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 300);
        curl_setopt($curl, CURLOPT_TIMEOUT, 300);

        $response = curl_exec($curl);
        $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $responseBody = json_decode(substr($response, $headerSize), true);
        $responseHeaders = substr($response, 0, $headerSize);
        $curlErrors = curl_error($curl);

        curl_close($curl);

        if ($httpCode >= 400) {
            if ($httpCode === 401 && !$this->refreshToken) {
                $this->refreshToken = true;
                $this->getToken();
                $responseBody = $this->sendRequest($path, $method, $data);
            } else {
                throw new ApiClientException(
                    'Request ' . $method . ' ' . $url . ' failed!',
                    $httpCode,
                    null,
                    $responseBody,
                    $responseHeaders,
                    $curlErrors
                );
            }
        }

        return empty($responseBody) ? null : $responseBody;
    }

    /**
     * Send GET request
     * @param string $path
     * @param array $data
     * @param bool $useToken
     * @return array|null
     * @throws ApiClientException
     */
    public function get(string $path, array $data = [], bool $useToken = true): ?array
    {
        return $this->sendRequest($path, self::METHOD_GET, $data, $useToken);
    }

    /**
     * Send POST request
     * @param string $path
     * @param array $data
     * @param bool $useToken
     * @return array|null
     * @throws ApiClientException
     */
    public function post(string $path, array $data = [], bool $useToken = true): ?array
    {
        return $this->sendRequest($path, self::METHOD_POST, $data, $useToken);
    }

    /**
     * Send PUT request
     * @param string $path
     * @param array $data
     * @param bool $useToken
     * @return array|null
     * @throws ApiClientException
     */
    public function put(string $path, array $data = [], bool $useToken = true): ?array
    {
        return $this->sendRequest($path, self::METHOD_PUT, $data, $useToken);
    }

    /**
     * Send PATCH request
     * @param string $path
     * @param array $data
     * @param bool $useToken
     * @return array|null
     * @throws ApiClientException
     */
    public function patch(string $path, array $data = [], bool $useToken = true): ?array
    {
        return $this->sendRequest($path, self::METHOD_PATCH, $data, $useToken);
    }

    /**
     * Send DELETE request
     * @param string $path
     * @param array $data
     * @param bool $useToken
     * @return array|null
     * @throws ApiClientException
     */
    public function delete(string $path, array $data = [], bool $useToken = true): ?array
    {
        return $this->sendRequest($path, self::METHOD_DELETE, $data, $useToken);
    }

    /**
     * Create address book
     * @link https://sendpulse.com/integrations/api/bulk-email#create-list
     * @param string $bookName
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::post()
     */
    public function createAddressBook(string $bookName): ?array
    {
        return $this->post('addressbooks', ['bookName' => $bookName]);
    }

    /**
     * Edit address book name
     * @link https://sendpulse.com/integrations/api/bulk-email#edit-list
     * @param int $id
     * @param string $newName
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::put()
     */
    public function editAddressBook(int $id, string $newName): ?array
    {
        return $this->put('addressbooks/' . $id, ['name' => $newName]);
    }

    /**
     * Remove address book
     * @link https://sendpulse.com/integrations/api/bulk-email#delete-list
     * @param int $id
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function removeAddressBook(int $id): ?array
    {
        return $this->delete('addressbooks/' . $id);
    }

    /**
     * Get list of address books
     * @link https://sendpulse.com/integrations/api/bulk-email#lists-list
     * @param int|null $limit
     * @param int|null $offset
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function listAddressBooks(int $limit = null, int $offset = null): ?array
    {
        $data = array();
        if (null !== $limit) {
            $data['limit'] = $limit;
        }
        if (null !== $offset) {
            $data['offset'] = $offset;
        }

        return $this->get('addressbooks', $data);
    }

    /**
     * Get information about book
     * @link https://sendpulse.com/integrations/api/bulk-email#list-info
     * @param int $id
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function getBookInfo(int $id): ?array
    {
        return $this->get('addressbooks/' . $id);
    }

    /**
     * Get variables from book
     * @link https://sendpulse.com/integrations/api/bulk-email#variables
     * @param int $id
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function getBookVariables(int $id): ?array
    {
        return $this->get('addressbooks/' . $id . '/variables');
    }

    /**
     * Change variable by user email
     * @link https://sendpulse.com/integrations/api/bulk-email#email-change-variable
     * @param int $bookID
     * @param string $email User email
     * @param array $vars User vars in [key=>value] format
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::post()
     */
    public function updateEmailVariables(int $bookID, string $email, array $vars): ?array
    {
        $data = ['email' => $email, 'variables' => []];
        foreach ($vars as $name => $val) {
            $data['variables'][] = ['name' => $name, 'value' => $val];
        }

        return $this->post('addressbooks/' . $bookID . '/emails/variable', $data);
    }

    /**
     * List email addresses from book
     * @link https://sendpulse.com/integrations/api/bulk-email#lists-emails
     * @param int $id
     * @param int|null $limit
     * @param int|null $offset
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function getEmailsFromBook(int $id, int $limit = null, int $offset = null): ?array
    {
        $data = [];
        if (null !== $limit) {
            $data['limit'] = $limit;
        }
        if (null !== $offset) {
            $data['offset'] = $offset;
        }

        return $this->get('addressbooks/' . $id . '/emails', $data);
    }

    /**
     * Add new emails to address book
     * @link https://sendpulse.com/integrations/api/bulk-email#add-email
     * @param int $bookID
     * @param array $emails
     * @param array $additionalParams
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::post()
     */
    public function addEmails(int $bookID, array $emails, array $additionalParams = []): ?array
    {
        if (empty($bookID) || empty($emails)) {
            throw new ApiClientException('Empty book id or emails');
        }

        $data = [
            'emails' => $emails,
        ];

        if ($additionalParams) {
            $data = array_merge($data, $additionalParams);
        }

        return $this->post('addressbooks/' . $bookID . '/emails', $data);
    }

    /**
     * Remove email addresses from book
     * @link https://sendpulse.com/integrations/api/bulk-email#delete-email
     * @param int $bookID
     * @param array $emails
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::delete()
     */
    public function removeEmails(int $bookID, array $emails): ?array
    {
        return $this->delete('addressbooks/' . $bookID . '/emails', [
            'emails' => $emails
        ]);
    }

    /**
     * Get information about email address from book
     * @link https://sendpulse.com/integrations/api/bulk-email#email-info
     * @param int $bookID
     * @param string $email
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function getEmailInfo(int $bookID, string $email): ?array
    {
        return $this->get('addressbooks/' . $bookID . '/emails/' . $email);
    }

    /**
     * Get cost of campaign based on address book
     * @link https://sendpulse.com/integrations/api/bulk-email#campaign-cost
     * @param int $bookID
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function campaignCost(int $bookID): ?array
    {
        return $this->get('addressbooks/' . $bookID . '/cost');
    }

    /**
     * Get list of campaigns
     * @link https://sendpulse.com/integrations/api/bulk-email#campaigns-list
     * @param int|null $limit
     * @param int|null $offset
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function listCampaigns(int $limit = null, int $offset = null): ?array
    {
        $data = [];
        if (!empty($limit)) {
            $data['limit'] = $limit;
        }
        if (!empty($offset)) {
            $data['offset'] = $offset;
        }

        return $this->get('campaigns', $data);
    }

    /**
     * Get information about campaign
     * @link https://sendpulse.com/integrations/api/bulk-email#campaign-info
     * @param int $id
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function getCampaignInfo(int $id): ?array
    {
        return $this->get('campaigns/' . $id);
    }

    /**
     * Get campaign statistic by countries
     * @link https://sendpulse.com/integrations/api/bulk-email#stat-countries
     * @param int $id
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function campaignStatByCountries(int $id): ?array
    {
        return $this->get('campaigns/' . $id . '/countries');
    }

    /**
     * Get campaign statistic by referrals
     * @link https://sendpulse.com/integrations/api/bulk-email#stat-referral
     * @param int $id
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function campaignStatByReferrals(int $id): ?array
    {
        return $this->get('campaigns/' . $id . '/referrals');
    }

    /**
     * Create new campaign
     * @link https://sendpulse.com/integrations/api/bulk-email#create-campaign
     * @param string $senderName
     * @param string $senderEmail
     * @param string $subject
     * @param $bodyOrTemplateId
     * @param int $bookId
     * @param string $name
     * @param array $attachments
     * @param string $type
     * @param bool $useTemplateId
     * @param string $sendDate
     * @param int|null $segmentId
     * @param array $attachmentsBinary
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::post()
     */
    public function createCampaign(
        string $senderName,
        string $senderEmail,
        string $subject,
               $bodyOrTemplateId,
        int    $bookId,
        string $name = '',
        array  $attachments = [],
        string $type = '',
        bool   $useTemplateId = false,
        string $sendDate = '',
        int    $segmentId = null,
        array  $attachmentsBinary = []
    ): ?array
    {
        if (empty($senderName) || empty($senderEmail) || empty($subject) || empty($bodyOrTemplateId) || empty($bookId)) {
            throw new ApiClientException('Not all data.');
        }

        if ($useTemplateId) {
            $paramName = 'template_id';
            $paramValue = $bodyOrTemplateId;
        } else {
            $paramName = 'body';
            $paramValue = base64_encode($bodyOrTemplateId);
        }

        $data = [
            'sender_name' => $senderName,
            'sender_email' => $senderEmail,
            'subject' => $subject,
            $paramName => $paramValue,
            'list_id' => $bookId,
            'name' => $name,
            'type' => $type,
        ];

        if (!empty($attachments)) {
            $data['attachments'] = $attachments;
        } elseif (!empty($attachmentsBinary)) {
            $data['attachments_binary'] = $attachmentsBinary;
        }

        if (!empty($sendDate)) {
            $data['send_date'] = $sendDate;
        }

        if (!empty($segmentId)) {
            $data['segment_id'] = $segmentId;
        }

        return $this->post('campaigns', $data);
    }

    /**
     * Cancel campaign
     * @link https://sendpulse.com/integrations/api/bulk-email#cancel-send
     * @param int $id
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::delete()
     */
    public function cancelCampaign(int $id): ?array
    {
        return $this->delete('campaigns/' . $id);
    }

    /**
     * List all senders
     * @link https://sendpulse.com/integrations/api/bulk-email#senders-list
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function listSenders(): ?array
    {
        return $this->get('senders');
    }

    /**
     * List SMS senders
     * @link https://sendpulse.com/integrations/api/bulk-sms#get-senders
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function listSMSSenders(): ?array
    {
        return $this->get('sms/senders');
    }

    /**
     * Add new sender
     * @link https://sendpulse.com/integrations/api/bulk-email#add-sender
     * @param $senderName
     * @param $senderEmail
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::post()
     */
    public function addSender($senderName, $senderEmail): ?array
    {
        return $this->post('senders', [
            'email' => $senderEmail,
            'name' => $senderName,
        ]);
    }

    /**
     * Remove sender
     * @link https://sendpulse.com/integrations/api/bulk-email#delete-sender
     * @param string $email
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::delete()
     */
    public function removeSender(string $email): ?array
    {
        return $this->delete('senders', [
            'email' => $email
        ]);
    }

    /**
     * Activate sender using code
     * @link https://sendpulse.com/integrations/api/bulk-email#activate-sender
     * @param string $email
     * @param string $code
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::post()
     */
    public function activateSender(string $email, string $code): ?array
    {
        return $this->post('senders/' . $email . '/code', [
            'code' => $code,
        ]);
    }

    /**
     * Request mail with activation code
     * @link https://sendpulse.com/integrations/api/bulk-email#code
     * @param string $email
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function getSenderActivationMail(string $email): ?array
    {
        return $this->get('senders/' . $email . '/code');
    }

    /**
     * Get global information about email
     * @link https://sendpulse.com/integrations/api/bulk-email#email-info
     * @param string $email
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function getEmailGlobalInfo(string $email): ?array
    {
        return $this->get('emails/' . $email);
    }

    /**
     * Get global information about list of emails
     * @link https://sendpulse.com/integrations/api/bulk-email#emails_info
     * @param array $emails Emails list
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::post()
     */
    public function getEmailsGlobalInfo(array $emails): ?array
    {
        return $this->post('emails', $emails);
    }

    /**
     * Remove email from all books
     * @link https://sendpulse.com/integrations/api/bulk-email#email-delete
     * @param string $email
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::delete()
     */
    public function removeEmailFromAllBooks(string $email): ?array
    {
        return $this->delete('emails/' . $email);
    }

    /**
     * Get email statistic by all campaigns
     * @link https://sendpulse.com/integrations/api/bulk-email#email-stat
     * @param $email
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function emailStatByCampaigns($email): ?array
    {
        return $this->get('emails/' . $email . '/campaigns');
    }

    /**
     * Get all emails from blacklist
     * @link https://sendpulse.com/integrations/api/bulk-email#view-blacklist
     * @throws ApiClientException
     * @see ApiClient::get()
     * @deprecated
     */
    public function getBlackList(): ?array
    {
        return $this->get('blacklist');
    }

    /**
     * Add email to blacklist
     * @link https://sendpulse.com/integrations/api/bulk-email#add-blacklist
     * @param string $emails string with emails, separator - ,
     * @param string $comment
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::post()
     */
    public function addToBlackList(string $emails, string $comment = ''): ?array
    {
        return $this->post('blacklist', [
            'emails' => base64_encode($emails),
            'comment' => $comment,
        ]);
    }

    /**
     * Remove emails from blacklist
     * @link https://sendpulse.com/integrations/api/bulk-email#delete-blacklist
     * @param string $emails string with emails, separator - ,
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::delete()
     */
    public function removeFromBlackList(string $emails): ?array
    {
        return $this->delete('blacklist', [
            'emails' => base64_encode($emails)
        ]);

    }

    /**
     * Get balance
     * @link https://sendpulse.com/integrations/api/bulk-email#get-balance
     * @param string $currency
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function getBalance(string $currency = ''): ?array
    {
        $currency = strtoupper($currency);
        $url = 'balance';
        if (!empty($currency)) {
            $url .= '/' . strtoupper($currency);
        }

        return $this->get($url);
    }

    /**
     * SMTP: get list of emails
     * @link https://sendpulse.com/integrations/api/smtp#get-emails-list-smtp
     * @param int $limit
     * @param int $offset
     * @param string $fromDate
     * @param string $toDate
     * @param string $sender
     * @param string $recipient
     * @param string $country
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function smtpListEmails(int $limit = 0, int $offset = 0, string $fromDate = '', string $toDate = '', string $sender = '', string $recipient = '', string $country = 'off'): ?array
    {
        return $this->get('smtp/emails', [
            'limit' => $limit,
            'offset' => $offset,
            'from' => $fromDate,
            'to' => $toDate,
            'sender' => $sender,
            'recipient' => $recipient,
            'country' => $country,
        ]);
    }

    /**
     * Get information about email by id
     * @link https://sendpulse.com/integrations/api/smtp#email-info-smtp
     * @param $id
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function smtpGetEmailInfoById($id): ?array
    {
        return $this->get('smtp/emails/' . $id);
    }

    /**
     * SMTP: get list of unsubscribed emails
     * @link https://sendpulse.com/integrations/api/smtp#unsubscribed
     * @param int|null $limit
     * @param int|null $offset
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function smtpListUnsubscribed(int $limit = null, int $offset = null): ?array
    {
        $data = array();
        if (null !== $limit) {
            $data['limit'] = $limit;
        }
        if (null !== $offset) {
            $data['offset'] = $offset;
        }

        return $this->get('smtp/unsubscribe', $data);
    }

    /**
     * SMTP: add emails to unsubscribe list
     * @link https://sendpulse.com/integrations/api/smtp#unsubscribe-smtp
     * @param array $emails
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::post()
     */
    public function smtpUnsubscribeEmails(array $emails): ?array
    {
        return $this->post('smtp/unsubscribe', [
            'emails' => $emails,
        ]);
    }

    /**
     * SMTP: remove emails from unsubscribe list
     * @link https://sendpulse.com/integrations/api/smtp#delete-smtp
     * @param $emails
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::delete()
     */
    public function smtpRemoveFromUnsubscribe($emails): ?array
    {
        return $this->delete('smtp/unsubscribe', [
            'emails' => $emails
        ]);

    }

    /**
     * Get list of IP
     * @link https://sendpulse.com/integrations/api/smtp#ip-smtp
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function smtpListIP(): ?array
    {
        return $this->get('smtp/ips');
    }

    /**
     * SMTP: send mail
     * @link https://sendpulse.com/integrations/api/smtp#send-email-smtp
     * @param array $email
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::post()
     */
    public function smtpSendMail(array $email): ?array
    {
        $emailData = $email;
        if (isset($email['html'])) {
            $emailData['html'] = base64_encode($email['html']);
        }

        return $this->post('smtp/emails', [
            'email' => $emailData,
        ]);
    }

    /**
     * Get list of push campaigns
     * @link https://sendpulse.com/integrations/api/web-push#get-push-list
     * @param int|null $limit
     * @param int|null $offset
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function pushListCampaigns(int $limit = null, int $offset = null): ?array
    {
        $data = [];
        if (null !== $limit) {
            $data['limit'] = $limit;
        }
        if (null !== $offset) {
            $data['offset'] = $offset;
        }

        return $this->get('push/tasks', $data);
    }

    /**
     * Get list of websites
     * @link https://sendpulse.com/integrations/api/web-push#get-websites-list
     * @param int|null $limit
     * @param int|null $offset
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function pushListWebsites(int $limit = null, int $offset = null): ?array
    {
        $data = array();
        if (null !== $limit) {
            $data['limit'] = $limit;
        }
        if (null !== $offset) {
            $data['offset'] = $offset;
        }

        return $this->get('push/websites', $data);
    }

    /**
     * Get amount of websites
     * @link https://sendpulse.com/integrations/api/web-push#get-websites-number
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function pushCountWebsites(): ?array
    {
        return $this->get('push/websites/total');
    }

    /**
     * Get list of all variables for website
     * @link https://sendpulse.com/integrations/api/web-push#get-variables-list
     * @param int $websiteId
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function pushListWebsiteVariables(int $websiteId): ?array
    {
        return $this->get('push/websites/' . $websiteId . '/variables');
    }

    /**
     * Get list of subscriptions for the website
     * @link https://sendpulse.com/integrations/api/web-push#get-subscribers-list
     * @param int $websiteID
     * @param int|null $limit
     * @param int|null $offset
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function pushListWebsiteSubscriptions(int $websiteID, int $limit = null, int $offset = null): ?array
    {
        $data = [];
        if (null !== $limit) {
            $data['limit'] = $limit;
        }
        if (null !== $offset) {
            $data['offset'] = $offset;
        }

        return $this->get('push/websites/' . $websiteID . '/subscriptions', $data);
    }

    /**
     * Get amount of subscriptions for the site
     * @link https://sendpulse.com/integrations/api/web-push#get-subscribers-number
     * @param $websiteID
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function pushCountWebsiteSubscriptions($websiteID): ?array
    {
        return $this->get('push/websites/' . $websiteID . '/subscriptions/total');
    }

    /**
     * Set state for subscription
     * @link https://sendpulse.com/integrations/api/web-push#activate-subscriber
     * @param int $subscriptionID
     * @param int $stateValue
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::post()
     */
    public function pushSetSubscriptionState(int $subscriptionID, int $stateValue): ?array
    {
        return $this->post('push/subscriptions/state', [
            'id' => $subscriptionID,
            'state' => $stateValue,
        ]);
    }

    /**
     * Get common website info
     * @link https://sendpulse.com/integrations/api/web-push#site_info
     * @param int $websiteId
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function pushGetWebsiteInfo(int $websiteId): ?array
    {
        return $this->get('push/websites/info/' . $websiteId);
    }

    /**
     * Create new push campaign
     * @link https://sendpulse.com/integrations/api/web-push#create-push
     * @param array $taskInfo
     * @param array $additionalParams
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::post()
     */
    public function createPushTask(array $taskInfo, array $additionalParams = []): ?array
    {
        $data = $taskInfo;
        if (!isset($data['ttl'])) {
            $data['ttl'] = 0;
        }
        if (empty($data['title']) || empty($data['website_id']) || empty($data['body'])) {
            throw new ApiClientException('Not all data');
        }
        if ($additionalParams) {
            foreach ($additionalParams as $key => $val) {
                $data[$key] = $val;
            }
        }

        return $this->post('push/tasks', $data);
    }

    /**
     * Get integration code for Push Notifications.
     * @link https://sendpulse.com/integrations/api/web-push#get_js
     * @param int $websiteID
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function getPushIntegrationCode(int $websiteID): ?array
    {
        return $this->get('push/websites/' . $websiteID . '/code');
    }

    /**
     * Get stats for push campaign
     * @link https://sendpulse.com/integrations/api/web-push#statistics
     * @param int $campaignID
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function getPushCampaignStat(int $campaignID): ?array
    {
        return $this->get('push/tasks/' . $campaignID);
    }

    /**
     * @Author Maksym Dzhym m.jim@sendpulse.com
     * @param string $eventName
     * @param array $variables
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::post()
     */
    public function startEventAutomation360(string $eventName, array $variables): ?array
    {
        if (!array_key_exists('email', $variables) && !array_key_exists('phone', $variables)) {
            throw new ApiClientException('Email and phone is empty');
        }

        return $this->post('events/name/' . $eventName, $variables);
    }

    /**
     * Add phones to addressbook
     * @link https://sendpulse.com/integrations/api/bulk-sms#add-telephone
     * @param int $bookID
     * @param array $phones
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::post()
     */
    public function addPhones(int $bookID, array $phones): ?array
    {
        return $this->post('sms/numbers', [
            'addressBookId' => $bookID,
            'phones' => $phones
        ]);
    }

    /**
     * Add phones with variables to addressbook
     * @link https://sendpulse.com/integrations/api/bulk-sms#add-phone-variable
     * @param int $bookID
     * @param array $phonesWithVariables
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::post()
     */
    public function addPhonesWithVariables(int $bookID, array $phonesWithVariables): ?array
    {
        return $this->post('sms/numbers/variables', [
            'addressBookId' => $bookID,
            'phones' => $phonesWithVariables
        ]);
    }

    /**
     * Update variables for phones
     * @link https://sendpulse.com/integrations/api/bulk-sms#update-variable
     * @param int $bookID
     * @param array $phones
     * @param array $variables
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::put()
     */
    public function updatePhoneVaribales(int $bookID, array $phones, array $variables): ?array
    {
        return $this->put('sms/numbers', [
            'addressBookId' => $bookID,
            'phones' => $phones,
            'variables' => $variables
        ]);

    }

    /**
     * Delete phones from book
     * @link https://sendpulse.com/integrations/api/bulk-sms#delete-telephone
     * @param int $bookID
     * @param array $phones
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::delete()
     */
    public function deletePhones(int $bookID, array $phones): ?array
    {
        return $this->delete('sms/numbers', [
            'addressBookId' => $bookID,
            'phones' => $phones
        ]);
    }

    /**
     * get information about phone number
     * @info https://sendpulse.com/integrations/api/bulk-sms#retrieve-info-number
     * @param int $bookID
     * @param string $phoneNumber
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function getPhoneInfo(int $bookID, string $phoneNumber): ?array
    {
        return $this->get('sms/numbers/info/' . $bookID . '/' . $phoneNumber);
    }

    /**
     * Add phones to blacklist
     * @link https://sendpulse.com/integrations/api/bulk-sms#add-to-blacklist
     * @param array $phones
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::post()
     */
    public function addPhonesToBlacklist(array $phones): ?array
    {
        return $this->post('sms/black_list', [
            'phones' => $phones
        ]);
    }

    /**
     * Delete phones from blacklist
     * @link https://sendpulse.com/integrations/api/bulk-sms#delete-from-blacklist
     * @param array $phones
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::delete()
     */
    public function removePhonesFromBlacklist(array $phones): ?array
    {
        return $this->delete('sms/black_list', [
            'phones' => $phones
        ]);
    }

    /**
     * Get list of phones from blacklist
     * @link https://sendpulse.com/integrations/api/bulk-sms#view-blacklist
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function getPhonesFromBlacklist(): ?array
    {
        return $this->get('sms/black_list');
    }

    /**
     * Create sms campaign based on phones in book
     * @link https://sendpulse.com/integrations/api/bulk-sms#create-campaign
     * @param int $bookID
     * @param array $params
     * @param array $additionalParams
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::post()
     */
    public function sendSmsByBook(int $bookID, array $params, array $additionalParams = []): ?array
    {
        $data = [
            'addressBookId' => $bookID
        ];

        $data = array_merge($data, $params);

        if ($additionalParams) {
            $data = array_merge($data, $additionalParams);
        }

        return $this->post('sms/campaigns', $data);
    }

    /**
     * Create sms campaign based on list
     * @link  https://sendpulse.com/integrations/api/bulk-sms#create-campaign-to-list
     * @param array $phones
     * @param array $params
     * @param array $additionalParams
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::post()
     */
    public function sendSmsByList(array $phones, array $params, array $additionalParams): ?array
    {
        $data = [
            'phones' => $phones
        ];

        $data = array_merge($data, $params);

        if ($additionalParams) {
            $data = array_merge($data, $additionalParams);
        }

        return $this->post('sms/send', $data);
    }

    /**
     * List sms campaigns
     * @link https://sendpulse.com/integrations/api/bulk-sms#retrieve-campaign-by-date
     * @param array $params
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function listSmsCampaigns(array $params = []): ?array
    {
        return $this->get('sms/campaigns/list', $params);
    }

    /**
     * Get info about sms campaign
     * @link https://sendpulse.com/integrations/api/bulk-sms#retrieve-campaign-info
     * @param int $campaignID
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function getSmsCampaignInfo(int $campaignID): ?array
    {
        return $this->get('sms/campaigns/info/' . $campaignID);
    }

    /**
     * Cancel SMS campaign
     * @link https://sendpulse.com/integrations/api/bulk-sms#cancel-campaign
     * @param int $campaignID
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::put()
     */
    public function cancelSmsCampaign(int $campaignID): ?array
    {
        return $this->put('sms/campaigns/cancel/' . $campaignID);
    }

    /**
     * Get SMS campaign cost based on book or simple list
     * @link https://sendpulse.com/integrations/api/bulk-sms#cost
     * @param array $params
     * @param array $additionalParams
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::get()
     */
    public function getSmsCampaignCost(array $params, array $additionalParams = []): ?array
    {
        if (!isset($params['addressBookId']) && !isset($params['phones'])) {
            throw new ApiClientException('You mast pass phones list or addressbook ID');
        }

        if ($additionalParams) {
            $params = array_merge($params, $additionalParams);
        }

        return $this->get('sms/campaigns/cost', $params);
    }

    /**
     * Delete SMS campaign
     * @link https://sendpulse.com/integrations/api/bulk-sms#delete-campaign
     * @param int $campaignID
     * @return array|null
     * @throws ApiClientException
     * @deprecated
     * @see ApiClient::delete()
     */
    public function deleteSmsCampaign(int $campaignID): ?array
    {
        return $this->delete('sms/campaigns', ['id' => $campaignID]);
    }


}