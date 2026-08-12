<?php

declare(strict_types=1);

namespace Sendpulse\RestApi\Generated\Service\Crm;

use Sendpulse\RestApi\Generated\Operation\Crm\GetProductsByFilter;
use Sendpulse\RestApi\Generated\Operation\Crm\GetCategoryProduct;
use Sendpulse\RestApi\Generated\Operation\Crm\AddProductToDeal;
use Sendpulse\RestApi\Generated\Operation\Crm\GetProductsByDealId;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateProductsInDeal;
use Sendpulse\RestApi\Generated\Operation\Crm\GetProductsByContactDeals;
use Sendpulse\RestApi\Generated\Operation\Crm\DetachProductFromDeal;
use Sendpulse\RestApi\Generated\Operation\Crm\GetProductById;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateProduct;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteProduct;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateProductCategory;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteProductCategory;
use Sendpulse\RestApi\Generated\Operation\Crm\GetProductCategories;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateProductCategory;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateProductPrices;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateProductSections;
use Sendpulse\RestApi\Generated\Operation\Crm\UpdateProductSections;
use Sendpulse\RestApi\Generated\Operation\Crm\DeleteProductSection;
use Sendpulse\RestApi\Generated\Operation\Crm\CreateProduct;
use Sendpulse\RestApi\Service\AbstractService;

final class ECommerceProductResource extends AbstractService
{
    public function getProductsByFilter(array $body = []): array
    {
        return $this->send(GetProductsByFilter::build(
            body: $body,
        ));
    }

    public function getCategoryProduct(float $productId, float $categoryId): array
    {
        return $this->send(GetCategoryProduct::build(
            productId: $productId,
            categoryId: $categoryId,
        ));
    }

    public function addProductToDeal(array $body = []): array
    {
        return $this->send(AddProductToDeal::build(
            body: $body,
        ));
    }

    public function getProductsByDealId(float $dealId): array
    {
        return $this->send(GetProductsByDealId::build(
            dealId: $dealId,
        ));
    }

    public function updateProductsInDeal(int $headId, array $body = []): array
    {
        return $this->send(UpdateProductsInDeal::build(
            headId: $headId,
            body: $body,
        ));
    }

    public function getProductsByContactDeals(float $contactId): array
    {
        return $this->send(GetProductsByContactDeals::build(
            contactId: $contactId,
        ));
    }

    public function detachProductFromDeal(float $categoryId, float $productId, float $headId): array
    {
        return $this->send(DetachProductFromDeal::build(
            categoryId: $categoryId,
            productId: $productId,
            headId: $headId,
        ));
    }

    public function getProductById(float $productId): array
    {
        return $this->send(GetProductById::build(
            productId: $productId,
        ));
    }

    public function updateProduct(float $productId, array $body = []): array
    {
        return $this->send(UpdateProduct::build(
            productId: $productId,
            body: $body,
        ));
    }

    public function deleteProduct(float $productId): array
    {
        return $this->send(DeleteProduct::build(
            productId: $productId,
        ));
    }

    public function updateProductCategory(float $categoryId, array $body = []): array
    {
        return $this->send(UpdateProductCategory::build(
            categoryId: $categoryId,
            body: $body,
        ));
    }

    public function deleteProductCategory(float $categoryId): array
    {
        return $this->send(DeleteProductCategory::build(
            categoryId: $categoryId,
        ));
    }

    public function getProductCategories(): array
    {
        return $this->send(GetProductCategories::build());
    }

    public function createProductCategory(array $body = []): array
    {
        return $this->send(CreateProductCategory::build(
            body: $body,
        ));
    }

    public function updateProductPrices(float $productId, array $body = []): array
    {
        return $this->send(UpdateProductPrices::build(
            productId: $productId,
            body: $body,
        ));
    }

    public function createProductSections(float $productId, array $body = []): array
    {
        return $this->send(CreateProductSections::build(
            productId: $productId,
            body: $body,
        ));
    }

    public function updateProductSections(float $productId, array $body = []): array
    {
        return $this->send(UpdateProductSections::build(
            productId: $productId,
            body: $body,
        ));
    }

    public function deleteProductSection(float $productId, float $sectionId): array
    {
        return $this->send(DeleteProductSection::build(
            productId: $productId,
            sectionId: $sectionId,
        ));
    }

    public function createProduct(array $body = []): array
    {
        return $this->send(CreateProduct::build(
            body: $body,
        ));
    }
}