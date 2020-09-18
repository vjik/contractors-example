<?php

declare(strict_types=1);

namespace Module\Accounting\Domain\Entity\Contractor;

/**
 * Индивидуальный предприниматель
 */
final class SoleProprietor implements TypeDataInterface
{
    /**
     * @var Passport Паспорт
     */
    private $passport;

    /**
     * @var string|null ИНН
     */
    private $inn = null;

    /**
     * @var string|null ОКПО
     */
    private $okpo = null;

    /**
     * @var string|null ОГРН
     */
    private $ogrn = null;

    public function __construct()
    {
        $this->passport = new Passport();
    }

    public function getPassport(): Passport
    {
        return $this->passport;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function setInn(?string $inn): void
    {
        $this->inn = $inn;
    }

    public function getOkpo(): ?string
    {
        return $this->okpo;
    }

    public function setOkpo(?string $okpo): void
    {
        $this->okpo = $okpo;
    }

    public function getOgrn(): ?string
    {
        return $this->ogrn;
    }

    public function setOgrn(?string $ogrn): void
    {
        $this->ogrn = $ogrn;
    }

    public function generateShortName(): string
    {
        return 'ИП ' . $this->passport->getFullName();
    }

    public function generateFullName(): string
    {
        return 'Индивидуальный предприниматель ' . $this->passport->getFullName();
    }
}
