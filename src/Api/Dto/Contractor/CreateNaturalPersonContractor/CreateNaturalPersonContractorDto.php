<?php

declare(strict_types=1);

namespace Module\Accounting\Api\Dto\Contractor\CreateNaturalPersonContractor;

use Module\Accounting\Api\Dto\Contractor\Passport\PassportDto;

final class CreateNaturalPersonContractorDto
{
    /**
     * @var PassportDto
     */
    public $passport;
}
