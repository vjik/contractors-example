<?php

declare(strict_types=1);

namespace Module\Accounting\Api\Contractor;

use InvalidArgumentException;
use Module\Accounting\Api\Dto\Contractor\Contractor\ContractorDto;
use Module\Accounting\Api\Dto\Contractor\Contractor\ContractorDtoFactory;
use Module\Accounting\Api\Dto\Contractor\CreateNaturalPersonContractor\CreateNaturalPersonContractorDto;
use Module\Accounting\Api\Dto\Contractor\CreateNaturalPersonContractor\DtoValidation;
use Module\Accounting\Application\Contractor\CreateContractorService;
use Throwable;

final class CreateNaturalPersonContractor
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
     * @param CreateNaturalPersonContractorDto $dto
     * @return ContractorDto
     * @throws InvalidArgumentException
     * @throws Throwable
     */
    public function handle(CreateNaturalPersonContractorDto $dto): ContractorDto
    {
        $this->dtoValidation->validate($dto);
        $contractor = $this->createContractorService->createNaturalPersonContractor($dto);
        return $this->contractorDtoFactory->make($contractor);
    }
}
