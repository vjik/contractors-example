<?php

declare(strict_types=1);

namespace Module\Accounting\Domain\Entity\Contractor;

/**
 * Реквизиты физического лица
 */
final class NaturalPersonDetails implements DetailsInterface
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

    public function setPassport(Passport $passport): void
    {
        $this->passport = $passport;
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
