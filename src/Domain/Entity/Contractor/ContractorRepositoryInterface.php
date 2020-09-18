<?php

declare(strict_types=1);

namespace Module\Accounting\Domain\Entity\Contractor;

use Throwable;

interface ContractorRepositoryInterface
{
    /**
     * @param Contractor $contractor
     * @throws Throwable
     */
    public function save(Contractor $contractor): void;
}
