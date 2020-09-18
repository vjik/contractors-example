<?php

namespace Module\Accounting\Api\Dto\Contractor\Passport;

use DateTimeImmutable;
use InvalidArgumentException;

final class DtoValidation
{
    /**
     * @param PassportDto $dto
     * @throws InvalidArgumentException
     */
    public function validate(PassportDto $dto)
    {
        $dto->firstName = $this->prepareNullOrString($dto->firstName, 'First name');
        if ($dto->firstName) {
            if (mb_strlen($dto->firstName) > 50) {
                throw new InvalidArgumentException('First name incorrect length.');
            }
        }

        $dto->middleName = $this->prepareNullOrString($dto->middleName, 'Middle name');
        if ($dto->middleName) {
            if (mb_strlen($dto->middleName) > 50) {
                throw new InvalidArgumentException('Middle name incorrect length.');
            }
        }

        $dto->lastName = $this->prepareNullOrString($dto->lastName, 'Last name');
        if ($dto->lastName) {
            if (mb_strlen($dto->lastName) > 50) {
                throw new InvalidArgumentException('Last name incorrect length.');
            }
        }

        $dto->series = $this->prepareNullOrString($dto->series, 'Series');
        if ($dto->series) {
            if (mb_strlen($dto->series) != 4) {
                throw new InvalidArgumentException('Series incorrect length.');
            }
        }

        $dto->number = $this->prepareNullOrString($dto->number, 'Number');
        if ($dto->number) {
            if (mb_strlen($dto->number) != 6) {
                throw new InvalidArgumentException('Number incorrect length.');
            }
        }

        $dto->departmentName = $this->prepareNullOrString($dto->departmentName, 'Department name');
        if ($dto->departmentName) {
            if (mb_strlen($dto->departmentName) > 191) {
                throw new InvalidArgumentException('Department name incorrect length.');
            }
        }

        if ($dto->issueDate !== null &&
            !($dto->issueDate instanceof DateTimeImmutable)
        ) {
            throw new InvalidArgumentException('Issue date should be null or DateTimeImmutable.');
        }

        $dto->divisionCode = $this->prepareNullOrString($dto->divisionCode, 'Division code');
        if ($dto->divisionCode) {
            if (mb_strlen($dto->divisionCode) > 50) {
                throw new InvalidArgumentException('Division code incorrect length.');
            }
        }

        $dto->registrationAddress = $this->prepareNullOrString($dto->registrationAddress, 'Registration address');
        if ($dto->registrationAddress) {
            if (mb_strlen($dto->registrationAddress) > 191) {
                throw new InvalidArgumentException('Registration address incorrect length.');
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
