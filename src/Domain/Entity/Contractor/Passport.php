<?php

declare(strict_types=1);

namespace Module\Accounting\Domain\Entity\Contractor;

use DateTimeImmutable;

/**
 * Паспорт
 */
final class Passport
{
    /**
     * @var string|null Имя
     */
    private $firstName = null;

    /**
     * @var string|null Отчество
     */
    private $middleName = null;

    /**
     * @var string|null Фамилия
     */
    private $lastName = null;

    /**
     * @var string|null Серия
     */
    private $series = null;

    /**
     * @var string|null Номер
     */
    private $number = null;

    /**
     * @var string|null Кем выдан
     */
    private $departmentName = null;

    /**
     * @var DateTimeImmutable|null Дата выдачи
     */
    private $issueDate = null;

    /**
     * @var string|null Код подразделения
     */
    private $divisionCode = null;

    /**
     * @var string|null Адрес регистрации
     */
    private $registrationAddress;

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $name): void
    {
        $this->firstName = $name;
    }

    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    public function setMiddleName(?string $name): void
    {
        $this->middleName = $name;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $name): void
    {
        $this->lastName = $name;
    }

    public function getSeries(): ?string
    {
        return $this->series;
    }

    public function setSeries(?string $series): void
    {
        $this->series = $series;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }

    public function getDepartmentName(): ?string
    {
        return $this->departmentName;
    }

    public function setDepartmentName(?string $name): void
    {
        $this->departmentName = $name;
    }

    public function getIssueDate(): ?DateTimeImmutable
    {
        return $this->issueDate;
    }

    public function setIssueDate(?DateTimeImmutable $date): void
    {
        $this->issueDate = $date;
    }

    public function getDivisionCode(): ?string
    {
        return $this->divisionCode;
    }

    public function setDivisionCode(?string $code): void
    {
        $this->divisionCode = $code;
    }

    public function getRegistrationAddress(): ?string
    {
        return $this->registrationAddress;
    }

    public function setRegistrationAddress(?string $address): void
    {
        $this->registrationAddress = $address;
    }

    public function getFullName(): string
    {
        $items = [];
        if ($this->lastName !== null) {
            $items[] = $this->lastName;
        }
        if ($this->firstName !== null) {
            $items[] = $this->firstName;
        }
        if ($this->middleName !== null) {
            $items[] = $this->middleName;
        }
        return implode(' ', $items);
    }
}
