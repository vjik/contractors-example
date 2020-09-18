<?php

declare(strict_types=1);

namespace Module\Accounting\Api\Dto\Contractor\Contractor;

use Module\Accounting\Domain\Entity\Contractor\Contractor;

final class ContractorDtoFactory
{
    public function make(Contractor $contractor): ContractorDto
    {
        $dto = new ContractorDto();
        $dto->id = $contractor->getId();
        $dto->typeId = $contractor->getTypeId();
        $dto->shortName = $contractor->getShortName();
        $dto->fullName = $contractor->getFullName();
        return $dto;
    }
}
