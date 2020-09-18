<?php

declare(strict_types=1);

namespace Module\Accounting\Api\Contractor;

use InvalidArgumentException;
use Module\Accounting\Api\Dto\Contractor\Contractor\ContractorDto;
use Module\Accounting\Api\Dto\Contractor\Contractor\ContractorDtoFactory;
use Module\Accounting\Api\Dto\Contractor\CreateLegalPersonContractor\CreateLegalPersonContractorDto;
use Module\Accounting\Api\Dto\Contractor\CreateLegalPersonContractor\DtoValidation;
use Module\Accounting\Application\Contractor\CreateContractorService;
use Throwable;

final class CreateLegalPersonContractor
{
    private $createContractorService;
    private $dtoValidation;
    private $contractorDtoFactory;

    public function __construct(
        CreateContractorService $createContractorService,
        DtoValidation $dtoValidation,
        ContractorDtoFactory $contractorDtoFactory
    ) {
        $this->createContractorService = $createContractorService;
        $this->dtoValidation = $dtoValidation;
        $this->contractorDtoFactory = $contractorDtoFactory;
    }

    /**
     * @param CreateLegalPersonContractorDto $dto
     * @return ContractorDto
     * @throws InvalidArgumentException
     * @throws Throwable
     */
    public function handle(CreateLegalPersonContractorDto $dto): ContractorDto
    {
        $this->dtoValidation->validate($dto);
        $contractor = $this->createContractorService->createLegalPersonContractor($dto);
        return $this->contractorDtoFactory->make($contractor);
    }
}
