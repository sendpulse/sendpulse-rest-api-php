<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Email;

use Sendpulse\RestApi\Generated\Operation\Email\CreateTemplate;
use Sendpulse\RestApi\Generated\Model\Email\TemplateCreation;
use Sendpulse\RestApi\Generated\Operation\Email\UpdateTemplate;
use Sendpulse\RestApi\Generated\Model\Email\ResultTrue;
use Sendpulse\RestApi\Generated\Operation\Email\GetTemplateById;
use Sendpulse\RestApi\Generated\Model\Email\TemplateDetails;
use Sendpulse\RestApi\Generated\Operation\Email\GetTemplateBySlug;
use Sendpulse\RestApi\Generated\Operation\Email\GetTemplates;
use Sendpulse\RestApi\Generated\Model\Email\TemplateSummary;
use Sendpulse\RestApi\Service\AbstractService;

final class TemplatesResource extends AbstractService
{
    public function createTemplate(array $body = []): TemplateCreation
    {
        return TemplateCreation::fromArray($this->send(CreateTemplate::build(
            body: $body,
        )));
    }

    public function updateTemplate(int $id, array $body = []): ResultTrue
    {
        return ResultTrue::fromArray($this->send(UpdateTemplate::build(
            id: $id,
            body: $body,
        )));
    }

    public function getTemplateById(string $template_id, ?string $owner = null, ?string $lang = null): TemplateDetails
    {
        return TemplateDetails::fromArray($this->send(GetTemplateById::build(
            template_id: $template_id,
            owner: $owner,
            lang: $lang,
        )));
    }

    public function getTemplateBySlug(string $name_slug, ?string $owner = null, ?string $lang = null): TemplateDetails
    {
        return TemplateDetails::fromArray($this->send(GetTemplateBySlug::build(
            name_slug: $name_slug,
            owner: $owner,
            lang: $lang,
        )));
    }

    /**
     * @return TemplateSummary[]
     */
    public function getTemplates(?string $owner = null, ?bool $only_active = null, ?int $limit = null, ?int $offset = null): array
    {
        return array_map(
            static fn(array $item) => TemplateSummary::fromArray($item),
            $this->send(GetTemplates::build(
            owner: $owner,
            only_active: $only_active,
            limit: $limit,
            offset: $offset,
        ))
        );
    }
}