<?php

declare(strict_types=1);

namespace Module\Accounting\Api\Dto\Contractor\CreateLegalPersonContractor;

use InvalidArgumentException;

final class DtoValidation
{
    /**
     * @param CreateLegalPersonContractorDto $dto
     * @throws InvalidArgumentException
     */
    public function validate(CreateLegalPersonContractorDto $dto)
    {
        $dto->shortName = $this->prepareNullOrString($dto->shortName, 'Short name');
        if ($dto->shortName) {
            if (mb_strlen($dto->shortName) > 191) {
                throw new InvalidArgumentException('Short name incorrect length.');
            }
        }

        $dto->fullName = $this->prepareNullOrString($dto->shortName, 'Full name');
        if ($dto->fullName) {
            if (mb_strlen($dto->fullName) > 191) {
                throw new InvalidArgumentException('Full name incorrect length.');
            }
        }

        $dto->inn = $this->prepareNullOrString($dto->inn, 'INN');
        if ($dto->inn) {
            if (mb_strlen($dto->inn) != 12) {
                throw new InvalidArgumentException('INN incorrect length.');
            }
        }

        $dto->kpp = $this->prepareNullOrString($dto->kpp, 'KPP');
        if ($dto->kpp) {
            if (mb_strlen($dto->kpp) != 9) {
                throw new InvalidArgumentException('KPP incorrect length.');
            }
        }

        $dto->okpo = $this->prepareNullOrString($dto->okpo, 'OKPO');
        if ($dto->okpo) {
            if (mb_strlen($dto->okpo) != 8) {
                throw new InvalidArgumentException('OKPO incorrect length.');
            }
        }

        $dto->ogrn = $this->prepareNullOrString($dto->ogrn, 'OGRN');
        if ($dto->ogrn) {
            if (mb_strlen($dto->ogrn) != 15) {
                throw new InvalidArgumentException('OGRN incorrect length.');
            }
        }

        $dto->legalAddress = $this->prepareNullOrString($dto->legalAddress, 'Legal address');
        if ($dto->legalAddress) {
            if (mb_strlen($dto->legalAddress) > 191) {
                throw new InvalidArgumentException('Legal address incorrect length.');
            }
        }
    }

    /**
     * @param mixed $value
     * @param string $label
     * @return string|null
     * @throws InvalidArgumentException
     */
    private function prepareNullOrString($value, string $label): ?string
    {
        if ($value === null) {
            return null;
        }
        if (!is_string($value)) {
            throw new InvalidArgumentException($label . ' should be null or string.');
        }
        $value = trim($value);
        return $value === '' ? null : $value;
    }
}
