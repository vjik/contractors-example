<?php

declare(strict_types=1);

namespace Module\Accounting\Application\Contractor;

use Module\Accounting\Api\Contractor\Dto\CreateLegalPersonContractorDto;
use Module\Accounting\Domain\Entity\Contractor\Contractor;
use Module\Accounting\Domain\Entity\Contractor\ContractorRepositoryInterface;
use Module\Accounting\Domain\Entity\Contractor\LegalPerson;

final class CreateContractorService
{
    private $contractors;

    public function __construct(ContractorRepositoryInterface $contractors)
    {
        $this->contractors = $contractors;
    }

    public function createLegalPersonContractor(CreateLegalPersonContractorDto $dto): Contractor
    {
        $contractor = Contractor::makeLegalPersonContractor();

        $legalPerson = new LegalPerson();
        $legalPerson->setShortName($dto->shortName);
        $legalPerson->setFullName($dto->fullName);
        $legalPerson->setInn($dto->inn);
        $legalPerson->setKpp($dto->kpp);
        $legalPerson->setOkpo($dto->okpo);
        $legalPerson->setOgrn($dto->ogrn);
        $legalPerson->setLegalAddress($dto->legalAddress);

        $contractor->setLegalPerson($legalPerson);

        $this->contractors->save($contractor);

        return $contractor;
    }
}
