<?php

declare(strict_types=1);

namespace Module\Accounting\Domain\Entity\Contractor;

interface DetailsInterface
{
    public function generateShortName(): string;

    public function generateFullName(): string;
}
