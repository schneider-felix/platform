<?php declare(strict_types=1);

namespace Shopware\Core\Framework\Adapter\Filesystem\Plugin;

use Shopware\Core\Framework\Log\Package;

#[Package('framework')]
interface WriteBatchInterface
{
    public function writeBatch(CopyBatchInput ...$files): void;
}
