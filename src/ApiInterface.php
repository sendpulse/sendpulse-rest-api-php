<?php

/*
 * SendPulse REST API Interface
 *
 * Documentation
 * https://login.sendpulse.com/manual/rest-api/
 * https://sendpulse.com/api
 *
 */

namespace Sendpulse\RestApi;

interface ApiInterface
{

    /**
     * Create new address book
     *
     * @param $bookName
     */
    public function createAddressBook($bookName);

    /**
     * Edit address book name
     *
     * @param $id
     * @param $newName
     */
    public function editAddressBook($id, $newName);

    /**
     * Remove address book
     *
     * @param $id
     */
    public function removeAddressBook($id);

    /**
     * Get list of address books
     *
     * @param $limit
     * @param $offset
     */
    public function listAddressBooks($limit = null, $offset = null);

    /**
     * Get book info
     *
     * @param $id
     */
    public function getBookInfo($id);

    /**
     * Get book variables.
     *
     * @param $id
     *   Address book id.
     */
    public function getBookVariables($id);

    /**
     * Get list pf emails from book
     *
     * @param $id
     */
    public function getEmailsFromBook($id);

    /**
     * Add new emails to book
     *
     * @param $bookID
     * @param $emails
     */
    public function addEmails($bookID, $emails);

    /**
     * Remove emails from book
     *
     * @param $bookID
     * @param $emails
     */
    public function removeEmails($bookID, $emails);

    /**
     * Get information about email from book
     *
     * @param $bookID
     * @param $email
     */
    public function getEmailInfo($bookID, $email);

    /**
     * Calculate cost of the campaign based on address book
     *
     * @param $bookID
     */
    public function campaignCost($bookID);

    /**
     * Get list of campaigns
     *
     * @param $limit
     * @param $offset
     */
    public function listCampaigns($limit = null, $offset = null);

    /**
     * Get information about campaign
     *
     * @param $id
     */
    public function getCampaignInfo($id);

    /**
     * Get campaign statistic by countries
     *
     * @param $id
     */
    public function campaignStatByCountries($id);

    /**
     * Get campaign statistic by referrals
     *
     * @param $id
     */
    public function campaignStatByReferrals($id);

    /**
     * Create new campaign
     *
     * @param      $senderName
     * @param      $senderEmail
     * @param      $subject
     * @param      $body
     * @param      $bookId
     * @param null $name
     * @param null $attachments
     * @param null $type
     */
    public function createCampaign(
        $senderName,
        $senderEmail,
        $subject,
        $body,
        $bookId,
        $name = null,
        $attachments = null,
        $type = null
    );

    /**
     * Cancel campaign
     *
     * @param $id
     */
    public function cancelCampaign($id);

    /**
     * Get list of allowed senders
     */
    public function listSenders();

    /**
     * Add new sender
     *
     * @param $senderName
     * @param $senderEmail
     */
    public function addSender($senderName, $senderEmail);

    /**
     * Remove sender
     *
     * @param $email
     */
    public function removeSender($email);

    /**
     * Activate sender using code from mail
     *
     * @param $email
     * @param $code
     */
    public function activateSender($email, $code);

    /**
     * Send mail with activation code on sender email
     *
     * @param $email
     */
    public function getSenderActivationMail($email);

    /**
     * Get global information about email
     *
     * @param $email
     */
    public function getEmailGlobalInfo($email);

    /**
     * Remove email address from all books
     *
     * @param $email
     */
    public function removeEmailFromAllBooks($email);

    /**
     * Get statistic for email by all campaigns
     *
     * @param $email
     */
    public function emailStatByCampaigns($email);

    /**
     * Show emails from blacklist
     */
    public function getBlackList();

    /**
     * Add email address to blacklist
     *
     * @param      $emails
     * @param null $comment
     */
    public function addToBlackList($emails, $comment = null);

    /**
     * Remove email address from blacklist
     *
     * @param $emails
     */
    public function removeFromBlackList($emails);

    /**
     * Return user balance
     *
     * @param string $currency
     */
    public function getBalance($currency = '');

    /**
     * Get list of emails that was sent by SMTP
     *
     * @param int $limit
     * @param int $offset
     * @param string $fromDate
     * @param string $toDate
     * @param string $sender
     * @param string $recipient
     * @param string $country
     */
    public function smtpListEmails(
        $limit = 0,
        $offset = 0,
        $fromDate = '',
        $toDate = '',
        $sender = '',
        $recipient = '',
        $country = 'off'
    );

    /**
     * Get information about email by his id
     *
     * @param $id
     */
    public function smtpGetEmailInfoById($id);

    /**
     * SMTP: get list of unsubscribed emails
     *
     * @param null $limit
     * @param null $offset
     */
    public function smtpListUnsubscribed($limit = null, $offset = null);

    /**
     * Unsubscribe emails using SMTP
     *
     * @param $emails
     */
    public function smtpUnsubscribeEmails($emails);

    /**
     * Remove emails from unsubscribe list using SMTP
     *
     * @param $emails
     */
    public function smtpRemoveFromUnsubscribe($emails);

    /**
     * Get list of allowed IPs using SMTP
     */
    public function smtpListIP();

    /**
     * Get list of allowed domains using SMTP
     */
    public function smtpListAllowedDomains();

    /**
     * Add domain using SMTP
     *
     * @param $email
     */
    public function smtpAddDomain($email);

    /**
     * Send confirm mail to verify new domain
     *
     * @param $email
     */
    public function smtpVerifyDomain($email);

    /**
     * Send mail using SMTP
     *
     * @param $email
     */
    public function smtpSendMail($email);

    /**
     * Get list of all push campaigns
     *
     * @param null $limit
     * @param null $offset
     */
    public function pushListCampaigns($limit = null, $offset = null);

    /**
     * Get list of websites
     *
     * @param null $limit
     * @param null $offset
     */
    public function pushListWebsites($limit = null, $offset = null);

    /**
     * Get amount of websites
     */
    public function pushCountWebsites();

    /**
     * Get list of all variables for the website
     *
     * @param $websiteID
     */
    public function pushListWebsiteVariables($websiteID);

    /**
     * Get list of all subscriptions for the website
     *
     * @param      $websiteID
     * @param null $limit
     * @param null $offset
     *
     * @return
     */
    public function pushListWebsiteSubscriptions($websiteID, $limit = null, $offset = null);

    /**
     * Get amount of subscriptions for the site
     *
     * @param $websiteID
     */
    public function pushCountWebsiteSubscriptions($websiteID);

    /**
     * Set state for subscription
     *
     * @param $subscriptionID
     * @param $stateValue
     */
    public function pushSetSubscriptionState($subscriptionID, $stateValue);

    /**
     * Create new push campaign
     *
     * @param       $taskInfo
     * @param array $additionalParams
     */
    public function createPushTask($taskInfo, array $additionalParams = array());

    /**
     * Get integration code for Push Notifications.
     *
     * @param $websiteID
     */
    public function getPushIntegrationCode($websiteID);

    /**
     * @Author Maksym Dzhym m.jim@sendpulse.com
     * @param $eventName
     * @param array $variables
     * @return \stdClass
     */
    public function startEventAutomation360($eventName, array $variables);

    /**
     * Add phones to addressbook
     *
     * @param $bookID
     * @param array $phones
     * @return mixed
     */
    public function addPhones($bookID, array $phones);

    /**
     * Add phones with variables to addressbook
     *
     * @param $bookID
     * @param array $phones
     * @return mixed
     */
    public function addPhonesWithVariables($bookID, array $phones);


    /**
     * Update phone variables
     *
     * @param $bookID
     * @param $phones
     * @param $variables
     * @return mixed
     */
    public function updatePhoneVaribales($bookID, array $phones, array $variables);

    /**
     * Delete phones from book
     *
     * @param $bookID
     * @param array $phones
     * @return mixed
     */
    public function deletePhones($bookID, array $phones);

    /**
     * Get information about phone
     *
     * @param $bookID
     * @param $phoneNumber
     * @return mixed
     */
    public function getPhoneInfo($bookID, $phoneNumber);

    /**
     * Add phones to blacklist
     *
     * @param $bookID
     * @param array $phones
     * @return mixed
     */
    public function addPhonesToBlacklist(array $phones);

    /**
     * Remove phones from blacklist
     *
     * @param array $phones
     * @return mixed
     */
    public function removePhonesFromBlacklist(array $phones);

    /**
     * Get list of phones from blacklist
     *
     * @return mixed
     */
    public function getPhonesFromBlacklist();

    /**
     * Create sms campaign based on phones in book
     *
     * @param $bookId
     * @param array $params
     * @param array $additionalParams
     * @return mixed
     */
    public function sendSmsByBook($bookId, array $params, array $additionalParams);

    /**
     * Create sms campaign based on list
     *
     * @param $phones
     * @param array $params
     * @param array $additionalParams
     * @return mixed
     */
    public function sendSmsByList(array $phones, array $params, array $additionalParams);

    /**
     * List sms campaigns
     *
     * @param $params
     * @return mixed
     */
    public function listSmsCampaigns(array $params);

    /**
     * get info about SMS campaign
     *
     * @param $campaignID
     * @return mixed
     */
    public function getSmsCampaignInfo($campaignID);

    /**
     * Cancel SMS campaign
     *
     * @param $campaignID
     * @return mixed
     */
    public function cancelSmsCampaign($campaignID);

    /**
     * Get SMS campaign cost based on book or simple list
     *
     * @param $params
     * @param $additionalParams
     * @return mixed
     */
    public function getSmsCampaignCost(array $params, array $additionalParams);

    /**
     * Delete SMS campaign
     *
     * @param $campaignID
     * @return mixed
     */
    public function deleteSmsCampaign($campaignID);

}
