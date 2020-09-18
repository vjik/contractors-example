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
     * @var LegalPersonDetails|null
     */
    private $legalPersonDetails = null;

    /**
     * @var SoleProprietorDetails|null
     */
    private $soleProprietorDetails = null;

    /**
     * @var NaturalPersonDetails|null
     */
    private $naturalPersonDetails = null;

    public function __construct(int $typeId)
    {
        $this->typeId = $typeId;
        $this->shortName = '';
        $this->fullName = '';
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

    public function getType(): ContractorType
    {
        return ContractorType::get($this->typeId);
    }

    public function getShortName(): string
    {
        return $this->shortName;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function getLegalPersonDetails(): LegalPersonDetails
    {
        if ($this->typeId !== ContractorType::LEGAL_PERSON) {
            throw new LogicException('Contractor is not legal person.');
        }
        return $this->legalPersonDetails;
    }

    public function setLegalPersonDetails(LegalPersonDetails $legalPersonDetails): void
    {
        if ($this->typeId !== ContractorType::LEGAL_PERSON) {
            throw new LogicException('Contractor is not legal person.');
        }
        $this->legalPersonDetails = $legalPersonDetails;
        $this->updateNames();
    }

    public function getSoleProprietorDetails(): SoleProprietorDetails
    {
        if ($this->typeId !== ContractorType::SOLE_PROPRIETOR) {
            throw new LogicException('Contractor is not sole proprietor.');
        }
        return $this->soleProprietorDetails;
    }

    public function setSoleProprietorDetails(SoleProprietorDetails $soleProprietorDetails): void
    {
        if ($this->typeId !== ContractorType::SOLE_PROPRIETOR) {
            throw new LogicException('Contractor is not sole proprietor.');
        }
        $this->soleProprietorDetails = $soleProprietorDetails;
        $this->updateNames();
    }

    public function getNaturalPersonDetails(): NaturalPersonDetails
    {
        if ($this->typeId !== ContractorType::NATURAL_PERSON) {
            throw new LogicException('Contractor is not natural person.');
        }
        return $this->naturalPersonDetails;
    }

    public function setNaturalPersonDetails(NaturalPersonDetails $naturalPersonDetails): void
    {
        if ($this->typeId !== ContractorType::NATURAL_PERSON) {
            throw new LogicException('Contractor is not natural person.');
        }
        $this->naturalPersonDetails = $naturalPersonDetails;
        $this->updateNames();
    }

    private function updateNames(): void
    {
        $this->shortName = $this->getDetails()->generateShortName();
        $this->fullName = $this->getDetails()->generateFullName();
    }

    private function getDetails(): DetailsInterface
    {
        switch ($this->typeId) {
            case ContractorType::LEGAL_PERSON:
                return $this->legalPersonDetails;
            case ContractorType::SOLE_PROPRIETOR:
                return $this->soleProprietorDetails;
            case ContractorType::NATURAL_PERSON:
                return $this->naturalPersonDetails;
        }
        throw new LogicException('Incorrect contractor type');
    }
}
