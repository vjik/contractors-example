<?php

declare(strict_types=1);

namespace Module\Accounting\Api\Dto\Contractor\NaturalPersonDetails;

use InvalidArgumentException;
use Module\Accounting\Api\Dto\Contractor\Passport\DtoValidation as PassportDtoValidation;
use Module\Accounting\Api\Dto\Contractor\Passport\PassportDto;

final class DtoValidation
{
    private $passportDtoValidation;

    public function __construct(PassportDtoValidation $passportDtoValidation)
    {
        $this->passportDtoValidation = $passportDtoValidation;
    }

    /**
     * @param NaturalPersonDetailsDto $dto
     * @throws InvalidArgumentException
     */
    public function validate(NaturalPersonDetailsDto $dto)
    {
        if (!($dto->passport instanceof PassportDto)) {
            throw new InvalidArgumentException('Passport should be PassportDto.');
        }
        $this->passportDtoValidation->validate($dto->passport);
    }
}
