<?php

declare(strict_types=1);

namespace Module\Accounting\Application\Contractor;

use Module\Accounting\Api\Dto\Contractor\CreateContractor\CreateContractorDto;
use Module\Accounting\Api\Dto\Contractor\LegalPersonDetails\LegalPersonDetailsDto;
use Module\Accounting\Api\Dto\Contractor\NaturalPersonDetails\NaturalPersonDetailsDto;
use Module\Accounting\Api\Dto\Contractor\Passport\PassportDto;
use Module\Accounting\Domain\Entity\Contractor\Contractor;
use Module\Accounting\Domain\Entity\Contractor\ContractorRepositoryInterface;
use Module\Accounting\Domain\Entity\Contractor\ContractorType;
use Module\Accounting\Domain\Entity\Contractor\LegalPersonDetails;
use Module\Accounting\Domain\Entity\Contractor\NaturalPersonDetails;
use Module\Accounting\Domain\Entity\Contractor\Passport;

final class CreateContractorService
{
    private $contractors;

    public function __construct(ContractorRepositoryInterface $contractors)
    {
        $this->contractors = $contractors;
    }

    public function createContractor(CreateContractorDto $dto): Contractor
    {
        $contractor = new Contractor($dto->typeId);

        switch ($dto->typeId) {
            case ContractorType::LEGAL_PERSON:
                $this->setLegalPersonDetails($contractor, $dto->details);
                break;
            case ContractorType::NATURAL_PERSON:
                $this->setNaturalPersonDetails($contractor, $dto->details);
                break;
        }

        $this->contractors->save($contractor);

        return $contractor;
    }

    private function setLegalPersonDetails(Contractor $contractor, LegalPersonDetailsDto $dto): void
    {
        $legalPerson = new LegalPersonDetails();
        $legalPerson->setShortName($dto->shortName);
        $legalPerson->setFullName($dto->fullName);
        $legalPerson->setInn($dto->inn);
        $legalPerson->setKpp($dto->kpp);
        $legalPerson->setOkpo($dto->okpo);
        $legalPerson->setOgrn($dto->ogrn);
        $legalPerson->setLegalAddress($dto->legalAddress);

        $contractor->setLegalPersonDetails($legalPerson);
    }

    private function setNaturalPersonDetails(Contractor $contractor, NaturalPersonDetailsDto $dto): void
    {
        $naturalPerson = new NaturalPersonDetails();
        $naturalPerson->setPassport(
            $this->createPassport($dto->passport)
        );

        $contractor->setNaturalPersonDetails($naturalPerson);
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
