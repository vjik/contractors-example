<?php

declare(strict_types=1);

namespace Module\Accounting\Api\Dto\Contractor\CreateContractor;

use InvalidArgumentException;
use Module\Accounting\Api\Dto\Contractor\LegalPersonDetails\DtoValidation as LegalPersonDetailsDtoValidation;
use Module\Accounting\Api\Dto\Contractor\LegalPersonDetails\LegalPersonDetailsDto;
use Module\Accounting\Api\Dto\Contractor\NaturalPersonDetails\DtoValidation as NaturalPersonDtoValidation;
use Module\Accounting\Api\Dto\Contractor\NaturalPersonDetails\NaturalPersonDetailsDto;
use Module\Accounting\Domain\Entity\Contractor\ContractorType;

final class DtoValidation
{
    private $legalPersonDetailsDtoValidation;
    private $naturalPersonDtoValidation;

    public function __construct(
        LegalPersonDetailsDtoValidation $legalPersonDetailsDtoValidation,
        NaturalPersonDtoValidation $naturalPersonDtoValidation
    ) {
        $this->legalPersonDetailsDtoValidation = $legalPersonDetailsDtoValidation;
        $this->naturalPersonDtoValidation = $naturalPersonDtoValidation;
    }

    /**
     * @param CreateContractorDto $dto
     * @throws InvalidArgumentException
     */
    public function validate(CreateContractorDto $dto)
    {
        switch ($dto->typeId) {
            case ContractorType::LEGAL_PERSON:
                if (!($dto->details instanceof LegalPersonDetailsDto)) {
                    throw new InvalidArgumentException('Details don\'t match contractor type.');
                }
                $this->legalPersonDetailsDtoValidation->validate($dto->details);
                break;

            case ContractorType::NATURAL_PERSON:
                if (!($dto->details instanceof NaturalPersonDetailsDto)) {
                    throw new InvalidArgumentException('Details don\'t match contractor type.');
                }
                $this->naturalPersonDtoValidation->validate($dto->details);
                break;

            default:
                throw new InvalidArgumentException('Contractor type don\'t support.');
        }
    }
}
