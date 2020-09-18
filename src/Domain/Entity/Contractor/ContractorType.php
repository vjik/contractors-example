<?php

namespace Module\Accounting\Domain\Entity\Contractor;

use vjik\enum\Enum;

final class ContractorType extends Enum
{
    const LEGAL_PERSON = 1;
    const SOLE_PROPRIETOR = 2;
    const NATURAL_PERSON = 3;
}
