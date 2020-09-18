<?php

namespace Module\Accounting\Api\Contractor;

use InvalidArgumentException;
use Module\Accounting\Api\Dto\Contractor\Contractor\ContractorDto;
use Module\Accounting\Api\Dto\Contractor\Contractor\ContractorDtoFactory;
use Module\Accounting\Api\Dto\Contractor\CreateContractor\CreateContractorDto;
use Module\Accounting\Api\Dto\Contractor\CreateContractor\DtoValidation;
use Module\Accounting\Application\Contractor\CreateContractorService;
use Throwable;

class CreateContractor
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
     * @param CreateContractorDto $dto
     * @return ContractorDto
     * @throws InvalidArgumentException
     * @throws Throwable
     */
    public function handle(CreateContractorDto $dto): ContractorDto
    {
        $this->dtoValidation->validate($dto);
        $contractor = $this->createContractorService->createContractor($dto);
        return $this->contractorDtoFactory->make($contractor);
    }
}
