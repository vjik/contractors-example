<?php

declare(strict_types=1);

namespace Module\Accounting\Domain\Entity\Contractor;

interface TypeDataInterface
{
    public function generateShortName(): string;

    public function generateFullName(): string;
}
