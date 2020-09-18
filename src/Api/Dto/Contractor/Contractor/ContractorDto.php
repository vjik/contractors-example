<?php

declare(strict_types=1);

namespace Module\Accounting\Api\Dto\Contractor\Contractor;

final class ContractorDto
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $typeId;

    /**
     * @var string
     */
    public $shortName;

    /**
     * @var string;
     */
    public $fullName;
}
