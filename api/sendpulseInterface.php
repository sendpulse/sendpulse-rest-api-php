<?php

    /*
     * Interface for SendPulse REST API
     *
     * Documentation
     * https://login.sendpulse.com/manual/rest-api/
     * https://sendpulse.com/api
     *
     */

    interface SendpulseApi_Interface {

        /**
         * Create new address book
         *
         * @param $bookName
         */
        public function createAddressBook( $bookName );

        /**
         * Edit address book name
         *
         * @param $id
         * @param $newName
         */
        public function editAddressBook( $id, $newName );

        /**
         * Remove address book
         *
         * @param $id
         */
        public function removeAddressBook( $id );

        /**
         * Get list of address books
         *
         * @param $limit
         * @param $offset
         */
        public function listAddressBooks( $limit = NULL, $offset = NULL );

        /**
         * Get book info
         *
         * @param $id
         */
        public function getBookInfo( $id );

        /**
         * Get list pf emails from book
         *
         * @param $id
         */
        public function getEmailsFromBook( $id );

        /**
         * Add new emails to book
         *
         * @param $bookId
         * @param $emails
         */
        public function addEmails( $bookId, $emails );

        /**
         * Remove emails from book
         *
         * @param $bookId
         * @param $emails
         */
        public function removeEmails( $bookId, $emails );

        /**
         * Get information about email from book
         *
         * @param $bookId
         * @param $email
         */
        public function getEmailInfo( $bookId, $email );

        /**
         * Calculate cost of the campaign based on address book
         *
         * @param $bookId
         */
        public function campaignCost( $bookId );

        /**
         * Get list of campaigns
         *
         * @param $limit
         * @param $offset
         */
        public function listCampaigns( $limit = NULL, $offset = NULL );

        /**
         * Get information about campaign
         *
         * @param $id
         */
        public function getCampaignInfo( $id );

        /**
         * Get campaign statistic by countries
         *
         * @param $id
         */
        public function campaignStatByCountries( $id );

        /**
         * Get campaign statistic by referrals
         *
         * @param $id
         */
        public function campaignStatByReferrals( $id );

        /**
         * Create new campaign
         *
         * @param $senderName
         * @param $senderEmail
         * @param $subject
         * @param $body
         * @param $bookId
         * @param null $name
         * @param null $attachments
         */
        public function createCampaign( $senderName, $senderEmail, $subject, $body, $bookId, $name = NULL, $attachments = NULL );

        /**
         * Cancel campaign
         *
         * @param $id
         */
        public function cancelCampaign( $id );

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
        public function addSender( $senderName, $senderEmail );

        /**
         * Remove sender
         *
         * @param $email
         */
        public function removeSender( $email );

        /**
         * Activate sender using code from mail
         *
         * @param $email
         * @param $code
         */
        public function activateSender( $email, $code );

        /**
         * Send mail with activation code on sender email
         *
         * @param $email
         */
        public function getSenderActivationMail( $email );

        /**
         * Get global information about email
         *
         * @param $email
         */
        public function getEmailGlobalInfo( $email );

        /**
         * Remove email address from all books
         *
         * @param $email
         */
        public function removeEmailFromAllBooks( $email );

        /**
         * Get statistic for email by all campaigns
         *
         * @param $email
         */
        public function emailStatByCampaigns( $email );

        /**
         * Show emails from blacklist
         */
        public function getBlackList();

        /**
         * Add email address to blacklist
         *
         * @param $emails
         * @param null $comment
         */
        public function addToBlackList( $emails, $comment = NULL );

        /**
         * Remove email address from blacklist
         *
         * @param $emails
         */
        public function removeFromBlackList( $emails );

        /**
         * Return user balance
         *
         * @param string $currency
         */
        public function getBalance( $currency = '' );

        /**
         * Get list of emails that was sent by SMTP
         *
         * @param int $limit
         * @param int $offset
         * @param string $fromDate
         * @param string $toDate
         * @param string $sender
         * @param string $recipient
         */
        public function smtpListEmails( $limit = 0, $offset = 0, $fromDate = '', $toDate = '', $sender = '', $recipient = '' );

        /**
         * Get information about email by his id
         *
         * @param $id
         */
        public function smtpGetEmailInfoById( $id );

        /**
         * Unsubscribe emails using SMTP
         *
         * @param $emails
         */
        public function smtpUnsubscribeEmails( $emails );

        /**
         * Remove emails from unsubscribe list using SMTP
         *
         * @param $emails
         */
        public function smtpRemoveFromUnsubscribe( $emails );

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
        public function smtpAddDomain( $email );

        /**
         * Send confirm mail to verify new domain
         *
         * @param $email
         */
        public function smtpVerifyDomain( $email );

        /**
         * Send mail using SMTP
         *
         * @param $email
         */
        public function smtpSendMail( $email );

        /**
         * Get list of all push campaigns
         *
         * @param null $limit
         * @param null $offset
         */
        public function pushListCampaigns( $limit = NULL, $offset = NULL );

        /**
         * Get list of websites
         *
         * @param null $limit
         * @param null $offset
         */
        public function pushListWebsites( $limit = NULL, $offset = NULL );

        /**
         * Get amount of websites
         */
        public function pushCountWebsites();

        /**
         * Get list of all variables for the website
         *
         * @param $websiteId
         */
        public function pushListWebsiteVariables( $websiteId );

        /**
         * Get list of all subscriptions for the website
         *
         * @param $websiteId
         */
        public function pushListWebsiteSubscriptions( $websiteId, $limit = NULL, $offset = NULL );

        /**
         * Get amount of subscriptions for the site
         *
         * @param $websiteId
         */
        public function pushCountWebsiteSubscriptions( $websiteId );

        /**
         * Set state for subscription
         *
         * @param $subscriptionId
         * @param $stateValue
         */
        public function pushSetSubscriptionState( $subscriptionId, $stateValue );

        /**
         * Create new push campaign
         *
         * @param $taskInfo
         * @param array $additionalParams
         */
        public function createPushTask( $taskInfo, $additionalParams = array() );
    }
