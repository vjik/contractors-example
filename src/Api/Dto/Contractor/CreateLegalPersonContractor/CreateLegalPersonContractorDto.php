<?php

declare(strict_types=1);

namespace Module\Accounting\Api\Dto\Contractor\CreateLegalPersonContractor;

final class CreateLegalPersonContractorDto
{
    /**
     * @var string|null Короткое название
     */
    public $shortName = null;

    /**
     * @var string|null Полное название
     */
    public $fullName = null;

    /**
     * @var string|null ИНН
     */
    public $inn = null;

    /**
     * @var string|null КПП
     */
    public $kpp = null;

    /**
     * @var string|null ОКПО
     */
    public $okpo = null;

    /**
     * @var string|null ОГРН
     */
    public $ogrn = null;

    /**
     * @var string|null Юридический адрес
     */
    public $legalAddress = null;
}
