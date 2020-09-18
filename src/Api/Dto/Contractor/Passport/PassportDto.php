<?php

declare(strict_types=1);

namespace Module\Accounting\Api\Dto\Contractor\Passport;

use DateTimeImmutable;

final class PassportDto
{
    /**
     * @var string|null Имя
     */
    public $firstName = null;

    /**
     * @var string|null Отчество
     */
    public $middleName = null;

    /**
     * @var string|null Фамилия
     */
    public $lastName = null;

    /**
     * @var string|null Серия
     */
    public $series = null;

    /**
     * @var string|null Номер
     */
    public $number = null;

    /**
     * @var string|null Кем выдан
     */
    public $departmentName = null;

    /**
     * @var DateTimeImmutable|null Дата выдачи
     */
    public $issueDate = null;

    /**
     * @var string|null Код подразделения
     */
    public $divisionCode = null;

    /**
     * @var string|null Адрес регистрации
     */
    public $registrationAddress;
}
