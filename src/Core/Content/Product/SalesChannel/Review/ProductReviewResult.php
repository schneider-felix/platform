<?php declare(strict_types=1);

namespace Shopware\Core\Content\Product\SalesChannel\Review;

use Shopware\Core\Content\Product\Aggregate\ProductReview\ProductReviewCollection;
use Shopware\Core\Content\Product\Aggregate\ProductReview\ProductReviewEntity;
use Shopware\Core\Framework\DataAbstractionLayer\Search\EntitySearchResult;
use Shopware\Core\Framework\Feature;
use Shopware\Core\Framework\Log\Package;

/**
 * @extends EntitySearchResult<ProductReviewCollection>
 */
#[Package('after-sales')]
class ProductReviewResult extends EntitySearchResult
{
    /**
     * @deprecated tag:v6.7.0 - Will be natively typed
     *
     * @var string|null
     */
    protected $parentId;

    /**
     * @deprecated tag:v6.7.0 - Will be natively typed
     *
     * @var string
     */
    protected $productId;

    /**
     * @deprecated tag:v6.7.0 - Will be natively typed
     *
     * @var RatingMatrix
     */
    protected $matrix;

    /**
     * @deprecated tag:v6.7.0 - Will be natively typed
     *
     * @var ProductReviewEntity|null
     */
    protected $customerReview;

    /**
     * @deprecated tag:v6.7.0 - Will be removed
     *
     * @var int
     */
    protected $totalReviews;

    protected int $totalReviewsInCurrentLanguage;

    public function getProductId(): string
    {
        return $this->productId;
    }

    public function setProductId(string $productId): void
    {
        $this->productId = $productId;
    }

    public function getMatrix(): RatingMatrix
    {
        return $this->matrix;
    }

    public function setMatrix(RatingMatrix $matrix): void
    {
        $this->matrix = $matrix;
    }

    public function getCustomerReview(): ?ProductReviewEntity
    {
        return $this->customerReview;
    }

    public function setCustomerReview(?ProductReviewEntity $customerReview): void
    {
        $this->customerReview = $customerReview;
    }

    /**
     * @deprecated tag:v6.7.0 - Will be removed, use `getTotal` instead
     */
    public function getTotalReviews(): int
    {
        Feature::triggerDeprecationOrThrow(
            'v6.7.0.0',
            Feature::deprecatedMethodMessage(__CLASS__, __METHOD__, 'v6.7.0.0', 'getTotal'),
        );

        return $this->totalReviews;
    }

    /**
     * @deprecated tag:v6.7.0 - Will be removed
     */
    public function setTotalReviews(int $totalReviews): void
    {
        Feature::triggerDeprecationOrThrow(
            'v6.7.0.0',
            Feature::deprecatedMethodMessage(__CLASS__, __METHOD__, 'v6.7.0.0'),
        );

        $this->totalReviews = $totalReviews;
    }

    public function getTotalReviewsInCurrentLanguage(): int
    {
        return $this->totalReviewsInCurrentLanguage;
    }

    public function setTotalReviewsInCurrentLanguage(int $totalReviewsInCurrentLanguage): void
    {
        $this->totalReviewsInCurrentLanguage = $totalReviewsInCurrentLanguage;
    }

    public function getParentId(): ?string
    {
        return $this->parentId;
    }

    public function setParentId(?string $parentId): void
    {
        $this->parentId = $parentId;
    }
}
