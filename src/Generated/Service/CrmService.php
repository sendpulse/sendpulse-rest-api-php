<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service;

use Sendpulse\RestApi\Generated\Service\Crm\UsersResource;
use Sendpulse\RestApi\Generated\Service\Crm\PipelinesResource;
use Sendpulse\RestApi\Generated\Service\Crm\PipelineStepsResource;
use Sendpulse\RestApi\Generated\Service\Crm\DealsResource;
use Sendpulse\RestApi\Generated\Service\Crm\DealNotesResource;
use Sendpulse\RestApi\Generated\Service\Crm\DealContactsResource;
use Sendpulse\RestApi\Generated\Service\Crm\DealAttributesResource;
use Sendpulse\RestApi\Generated\Service\Crm\DealAttributeValueResource;
use Sendpulse\RestApi\Generated\Service\Crm\MessengersTypesResource;
use Sendpulse\RestApi\Generated\Service\Crm\PaymentsResource;
use Sendpulse\RestApi\Generated\Service\Crm\ContactsResource;
use Sendpulse\RestApi\Generated\Service\Crm\ContactPhoneNumberResource;
use Sendpulse\RestApi\Generated\Service\Crm\ContactEmailAddressesResource;
use Sendpulse\RestApi\Generated\Service\Crm\ContactsMessengersResource;
use Sendpulse\RestApi\Generated\Service\Crm\ContactTagsResource;
use Sendpulse\RestApi\Generated\Service\Crm\ContactAttributesResource;
use Sendpulse\RestApi\Generated\Service\Crm\ContactAttributesValueResource;
use Sendpulse\RestApi\Generated\Service\Crm\ContactAttributesValuesResource;
use Sendpulse\RestApi\Generated\Service\Crm\TasksBoardsResource;
use Sendpulse\RestApi\Generated\Service\Crm\BoardAttributesResource;
use Sendpulse\RestApi\Generated\Service\Crm\TasksStepsResource;
use Sendpulse\RestApi\Generated\Service\Crm\TasksResource;
use Sendpulse\RestApi\Generated\Service\Crm\TaskCommentsResource;
use Sendpulse\RestApi\Generated\Service\Crm\TaskTagsResource;
use Sendpulse\RestApi\Generated\Service\Crm\TaskEntityResource;
use Sendpulse\RestApi\Generated\Service\Crm\TaskChecklistResource;
use Sendpulse\RestApi\Generated\Service\Crm\ChecklistItemsResource;
use Sendpulse\RestApi\Generated\Service\Crm\TaskAttributesResource;
use Sendpulse\RestApi\Generated\Service\Crm\TelephonyResource;
use Sendpulse\RestApi\Generated\Service\Crm\DealExpirationResource;
use Sendpulse\RestApi\Generated\Service\Crm\FileManagerResource;
use Sendpulse\RestApi\Generated\Service\Crm\AttachmentsResource;
use Sendpulse\RestApi\Generated\Service\Crm\CompanyResource;
use Sendpulse\RestApi\Generated\Service\Crm\CompanyHistoryResource;
use Sendpulse\RestApi\Generated\Service\Crm\CompanyAttributesResource;
use Sendpulse\RestApi\Generated\Service\Crm\EmailsResource;
use Sendpulse\RestApi\Generated\Service\Crm\PhonesResource;
use Sendpulse\RestApi\Generated\Service\Crm\MessengersResource;
use Sendpulse\RestApi\Generated\Service\Crm\DealHistoryResource;
use Sendpulse\RestApi\Generated\Service\Crm\ContactHistoryResource;
use Sendpulse\RestApi\Generated\Service\Crm\TaskHistoryResource;
use Sendpulse\RestApi\Generated\Service\Crm\ECommerceProductResource;
use Sendpulse\RestApi\Generated\Service\Crm\ManagerSettingsResource;
use Sendpulse\RestApi\Generated\Service\Crm\CustomTabResource;
use Sendpulse\RestApi\Service\AbstractService;

final class CrmService extends AbstractService
{
    public function users(): UsersResource
    {
        return new UsersResource($this->client);
    }

    public function pipelines(): PipelinesResource
    {
        return new PipelinesResource($this->client);
    }

    public function pipelineSteps(): PipelineStepsResource
    {
        return new PipelineStepsResource($this->client);
    }

    public function deals(): DealsResource
    {
        return new DealsResource($this->client);
    }

    public function dealNotes(): DealNotesResource
    {
        return new DealNotesResource($this->client);
    }

    public function dealContacts(): DealContactsResource
    {
        return new DealContactsResource($this->client);
    }

    public function dealAttributes(): DealAttributesResource
    {
        return new DealAttributesResource($this->client);
    }

    public function dealAttributeValue(): DealAttributeValueResource
    {
        return new DealAttributeValueResource($this->client);
    }

    public function messengersTypes(): MessengersTypesResource
    {
        return new MessengersTypesResource($this->client);
    }

    public function payments(): PaymentsResource
    {
        return new PaymentsResource($this->client);
    }

    public function contacts(): ContactsResource
    {
        return new ContactsResource($this->client);
    }

    public function contactPhoneNumber(): ContactPhoneNumberResource
    {
        return new ContactPhoneNumberResource($this->client);
    }

    public function contactEmailAddresses(): ContactEmailAddressesResource
    {
        return new ContactEmailAddressesResource($this->client);
    }

    public function contactsMessengers(): ContactsMessengersResource
    {
        return new ContactsMessengersResource($this->client);
    }

    public function contactTags(): ContactTagsResource
    {
        return new ContactTagsResource($this->client);
    }

    public function contactAttributes(): ContactAttributesResource
    {
        return new ContactAttributesResource($this->client);
    }

    public function contactAttributesValue(): ContactAttributesValueResource
    {
        return new ContactAttributesValueResource($this->client);
    }

    public function contactAttributesValues(): ContactAttributesValuesResource
    {
        return new ContactAttributesValuesResource($this->client);
    }

    public function tasksBoards(): TasksBoardsResource
    {
        return new TasksBoardsResource($this->client);
    }

    public function boardAttributes(): BoardAttributesResource
    {
        return new BoardAttributesResource($this->client);
    }

    public function tasksSteps(): TasksStepsResource
    {
        return new TasksStepsResource($this->client);
    }

    public function tasks(): TasksResource
    {
        return new TasksResource($this->client);
    }

    public function taskComments(): TaskCommentsResource
    {
        return new TaskCommentsResource($this->client);
    }

    public function taskTags(): TaskTagsResource
    {
        return new TaskTagsResource($this->client);
    }

    public function taskEntity(): TaskEntityResource
    {
        return new TaskEntityResource($this->client);
    }

    public function taskChecklist(): TaskChecklistResource
    {
        return new TaskChecklistResource($this->client);
    }

    public function checklistItems(): ChecklistItemsResource
    {
        return new ChecklistItemsResource($this->client);
    }

    public function taskAttributes(): TaskAttributesResource
    {
        return new TaskAttributesResource($this->client);
    }

    public function telephony(): TelephonyResource
    {
        return new TelephonyResource($this->client);
    }

    public function dealExpiration(): DealExpirationResource
    {
        return new DealExpirationResource($this->client);
    }

    public function fileManager(): FileManagerResource
    {
        return new FileManagerResource($this->client);
    }

    public function attachments(): AttachmentsResource
    {
        return new AttachmentsResource($this->client);
    }

    public function company(): CompanyResource
    {
        return new CompanyResource($this->client);
    }

    public function companyHistory(): CompanyHistoryResource
    {
        return new CompanyHistoryResource($this->client);
    }

    public function companyAttributes(): CompanyAttributesResource
    {
        return new CompanyAttributesResource($this->client);
    }

    public function emails(): EmailsResource
    {
        return new EmailsResource($this->client);
    }

    public function phones(): PhonesResource
    {
        return new PhonesResource($this->client);
    }

    public function messengers(): MessengersResource
    {
        return new MessengersResource($this->client);
    }

    public function dealHistory(): DealHistoryResource
    {
        return new DealHistoryResource($this->client);
    }

    public function contactHistory(): ContactHistoryResource
    {
        return new ContactHistoryResource($this->client);
    }

    public function taskHistory(): TaskHistoryResource
    {
        return new TaskHistoryResource($this->client);
    }

    public function eCommerceProduct(): ECommerceProductResource
    {
        return new ECommerceProductResource($this->client);
    }

    public function managerSettings(): ManagerSettingsResource
    {
        return new ManagerSettingsResource($this->client);
    }

    public function customTab(): CustomTabResource
    {
        return new CustomTabResource($this->client);
    }
}