<?php

declare(strict_types=1);

namespace Module\Accounting\Domain\Entity\Contractor;

/**
 * Юридическое лицо
 */
final class LegalPerson implements TypeDataInterface
{
    /**
     * @var string|null Короткое название
     */
    private $shortName = null;

    /**
     * @var string|null Полное название
     */
    private $fullName = null;

    /**
     * @var string|null ИНН
     */
    private $inn = null;

    /**
     * @var string|null КПП
     */
    private $kpp = null;

    /**
     * @var string|null ОКПО
     */
    private $okpo = null;

    /**
     * @var string|null ОГРН
     */
    private $ogrn = null;

    /**
     * @var string|null Юридический адрес
     */
    private $legalAddress = null;

    public function getShortName(): ?string
    {
        return $this->shortName;
    }

    public function setShortName(?string $name): void
    {
        $this->shortName = $name;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $name): void
    {
        $this->fullName = $name;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function setInn(?string $inn): void
    {
        $this->inn = $inn;
    }

    public function getKpp(): ?string
    {
        return $this->kpp;
    }

    public function setKpp(?string $kpp): void
    {
        $this->kpp = $kpp;
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

    public function getLegalAddress(): ?string
    {
        return $this->legalAddress;
    }

    public function setLegalAddress(?string $address): void
    {
        $this->legalAddress = $address;
    }

    public function generateShortName(): string
    {
        return $this->shortName ?? '';
    }

    public function generateFullName(): string
    {
        return $this->fullName ?? '';
    }
}
