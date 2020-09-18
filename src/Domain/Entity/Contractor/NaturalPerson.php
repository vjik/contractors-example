<?php

declare(strict_types=1);

namespace Module\Accounting\Domain\Entity\Contractor;

/**
 * Физическое лицо
 */
final class NaturalPerson implements TypeDataInterface
{
    /**
     * @var Passport Паспорт
     */
    private $passport;

    public function __construct()
    {
        $this->passport = new Passport();
    }

    public function getPassport(): Passport
    {
        return $this->passport;
    }

    public function generateShortName(): string
    {
        return $this->passport->getFullName();
    }

    public function generateFullName(): string
    {
        return $this->passport->getFullName();
    }
}
