<?php

declare(strict_types=1);

namespace Module\Accounting\Domain\Entity\Contractor;

use LogicException;

final class Contractor
{
    /**
     * @var int|null
     */
    private $id = null;

    /**
     * @var int
     */
    private $typeId;

    /**
     * @var string
     */
    private $shortName;

    /**
     * @var string
     */
    private $fullName;

    /**
     * @var LegalPerson|null
     */
    private $legalPerson = null;

    /**
     * @var SoleProprietor|null
     */
    private $soleProprietor = null;

    /**
     * @var NaturalPerson|null
     */
    private $naturalPerson = null;

    private function __construct(int $typeId)
    {
        $this->typeId = $typeId;
        $this->shortName = '';
        $this->fullName = '';
    }

    public static function makeLegalPersonContractor(): self
    {
        $contractor = new Contractor(ContractorType::LEGAL_PERSON);
        $contractor->legalPerson = new LegalPerson();
        return $contractor;
    }

    public static function makeSoleProprietorContractor(): self
    {
        $contractor = new Contractor(ContractorType::SOLE_PROPRIETOR);
        $contractor->soleProprietor = new SoleProprietor();
        return $contractor;
    }

    public static function makeNaturalPersonContractor(): self
    {
        $contractor = new Contractor(ContractorType::NATURAL_PERSON);
        $contractor->naturalPerson = new NaturalPerson();
        return $contractor;
    }

    public function getId(): int
    {
        if ($this->id === null) {
            throw new LogicException('ID not available for new contractor.');
        }
        return $this->id;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function getShortName(): string
    {
        return $this->shortName;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function getLegalPerson(): LegalPerson
    {
        if ($this->typeId !== ContractorType::LEGAL_PERSON) {
            throw new LogicException('Contractor is not legal person.');
        }
        return $this->legalPerson;
    }

    public function setLegalPerson(LegalPerson $legalPerson): void
    {
        if ($this->typeId !== ContractorType::LEGAL_PERSON) {
            throw new LogicException('Contractor is not legal person.');
        }
        $this->legalPerson = $legalPerson;
        $this->updateNames();
    }

    public function getSoleProprietor(): SoleProprietor
    {
        if ($this->typeId !== ContractorType::SOLE_PROPRIETOR) {
            throw new LogicException('Contractor is not sole proprietor.');
        }
        return $this->soleProprietor;
    }

    public function setSoleProprietor(SoleProprietor $soleProprietor): void
    {
        if ($this->typeId !== ContractorType::SOLE_PROPRIETOR) {
            throw new LogicException('Contractor is not sole proprietor.');
        }
        $this->soleProprietor = $soleProprietor;
        $this->updateNames();
    }

    public function getNaturalPerson(): NaturalPerson
    {
        if ($this->typeId !== ContractorType::NATURAL_PERSON) {
            throw new LogicException('Contractor is not natural person.');
        }
        return $this->naturalPerson;
    }

    public function setNaturalPerson(NaturalPerson $naturalPerson): void
    {
        if ($this->typeId !== ContractorType::NATURAL_PERSON) {
            throw new LogicException('Contractor is not natural person.');
        }
        $this->naturalPerson = $naturalPerson;
        $this->updateNames();
    }

    private function updateNames(): void
    {
        $this->shortName = $this->getTypeData()->generateShortName();
        $this->fullName = $this->getTypeData()->generateFullName();
    }

    private function getTypeData(): TypeDataInterface
    {
        switch ($this->typeId) {
            case ContractorType::LEGAL_PERSON:
                return $this->legalPerson;
            case ContractorType::SOLE_PROPRIETOR:
                return $this->soleProprietor;
            case ContractorType::NATURAL_PERSON:
                return $this->naturalPerson;
        }
        throw new LogicException('Incorrect contractor type');
    }
}
