<?php

declare(strict_types=1);

namespace Module\Accounting\Api\Contractor;

use Module\Accounting\Api\Contractor\Dto\ContractorDto;
use Module\Accounting\Api\Contractor\Dto\CreateLegalPersonContractorDto;
use Module\Accounting\Api\Contractor\Factory\ContractorDtoFactory;
use Module\Accounting\Application\Contractor\CreateContractorService;

final class Create
{
    private $createContractorService;

    public function __construct(CreateContractorService $createContractorService)
    {
        $this->createContractorService = $createContractorService;
    }

    public function legalPersonContractor(CreateLegalPersonContractorDto $dto): ContractorDto
    {
        $contractor = $this->createContractorService->createLegalPersonContractor($dto);
        return ContractorDtoFactory::make($contractor);
    }
}
