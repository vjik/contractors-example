<?php

declare(strict_types=1);

use Module\Accounting\Domain\Entity\Contractor\ContractorRepositoryInterface;
use Module\Accounting\Infrastructure\Repository\ContractorRepository;

return [
    ContractorRepositoryInterface::class => ContractorRepository::class,
];
