<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventorySales\Model\IsProductSalableForRequestedQtyCondition;

use Magento\InventorySalesApi\Api\Data\ProductSalabilityErrorInterface;
use Magento\Framework\Model\AbstractExtensibleModel;
use Magento\InventorySalesApi\Api\Data\ProductSalabilityErrorExtensionInterface;

class ProductSalabilityError extends AbstractExtensibleModel implements ProductSalabilityErrorInterface
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $message;

    public function __construct(string $code, string $message)
    {
        $this->code = $code;
        $this->message = $message;
    }

    /**
     * @inheritdoc
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @inheritdoc
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @inheritdoc
     */
    public function getExtensionAttributes(): ?ProductSalabilityErrorExtensionInterface
    {
        $extensionAttributes = $this->_getExtensionAttributes();
        if (null === $extensionAttributes) {
            $extensionAttributes = $this->extensionAttributesFactory->create(ProductSalabilityErrorInterface::class);
            $this->setExtensionAttributes($extensionAttributes);
        }
        return $extensionAttributes;
    }

    /**
     * @inheritdoc
     */
    public function setExtensionAttributes(ProductSalabilityErrorExtensionInterface $extensionAttributes): void
    {
        $this->_setExtensionAttributes($extensionAttributes);
    }
}
