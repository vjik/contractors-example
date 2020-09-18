<?php

declare(strict_types=1);

namespace Module\Accounting\Application\Contractor;

use Module\Accounting\Api\Dto\Contractor\CreateLegalPersonContractor\CreateLegalPersonContractorDto;
use Module\Accounting\Api\Dto\Contractor\CreateNaturalPersonContractor\CreateNaturalPersonContractorDto;
use Module\Accounting\Api\Dto\Contractor\Passport\PassportDto;
use Module\Accounting\Domain\Entity\Contractor\Contractor;
use Module\Accounting\Domain\Entity\Contractor\ContractorRepositoryInterface;
use Module\Accounting\Domain\Entity\Contractor\LegalPerson;
use Module\Accounting\Domain\Entity\Contractor\NaturalPerson;
use Module\Accounting\Domain\Entity\Contractor\Passport;

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

    public function createNaturalPersonContractor(CreateNaturalPersonContractorDto $dto): Contractor
    {
        $contractor = Contractor::makeNaturalPersonContractor();

        $naturalPerson = new NaturalPerson();
        $naturalPerson->setPassport(
            $this->createPassport($dto->passport)
        );

        $contractor->setNaturalPerson($naturalPerson);

        $this->contractors->save($contractor);

        return $contractor;
    }

    private function createPassport(PassportDto $dto): Passport
    {
        $passport = new Passport();
        $passport->setFirstName($dto->firstName);
        $passport->setMiddleName($dto->middleName);
        $passport->setLastName($dto->lastName);
        $passport->setSeries($dto->series);
        $passport->setNumber($dto->number);
        $passport->setDepartmentName($dto->departmentName);
        $passport->setIssueDate($dto->issueDate);
        $passport->setDivisionCode($dto->divisionCode);
        $passport->setRegistrationAddress($dto->registrationAddress);
        return $passport;
    }
}
