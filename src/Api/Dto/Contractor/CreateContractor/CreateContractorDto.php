<?php

declare(strict_types=1);

namespace Module\Accounting\Api\Dto\Contractor\CreateContractor;

use Module\Accounting\Api\Dto\Contractor\LegalPersonDetails\LegalPersonDetailsDto;
use Module\Accounting\Api\Dto\Contractor\NaturalPersonDetails\NaturalPersonDetailsDto;

final class CreateContractorDto
{
    /**
     * @var int
     */
    public $typeId;

    /**
     * @var LegalPersonDetailsDto|NaturalPersonDetailsDto
     */
    public $details;
}
