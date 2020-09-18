<?php

declare(strict_types=1);

use Cycle\ORM\Relation;
use Cycle\ORM\Schema;
use Module\Accounting\Domain\Entity\Contractor\Contractor;
use Module\Accounting\Domain\Entity\Contractor\LegalPersonDetails;
use Module\Accounting\Domain\Entity\Contractor\NaturalPersonDetails;
use Module\Accounting\Domain\Entity\Contractor\Passport;

return [
    'acc.contractor' => [
        Schema::ENTITY => Contractor::class,
        Schema::TABLE => 'acc_contractor',
        Schema::PRIMARY_KEY => 'id',
        Schema::COLUMNS => [
            'id' => 'id',
            'typeId' => 'type_id',
            'shortName' => 'short_name',
            'fullName' => 'full_name',
        ],
        Schema::TYPECAST => [
            'id' => 'int',
            'typeId' => 'int',
            'shortName' => 'string',
            'fullName' => 'string',
        ],
        Schema::RELATIONS => [
            'legalPersonDetails' => [
                Relation::TYPE => Relation::HAS_ONE,
                Relation::TARGET => 'acc.contractor_legal_person',
                Relation::SCHEMA => [
                    Relation::CASCADE => true,
                    Relation::NULLABLE => true,
                    Relation::INNER_KEY => 'id',
                    Relation::OUTER_KEY => 'id',
                ],
            ],
            'naturalPersonDetails' => [
                Relation::TYPE => Relation::HAS_ONE,
                Relation::TARGET => 'acc.contractor_natural_person',
                Relation::SCHEMA => [
                    Relation::CASCADE => true,
                    Relation::NULLABLE => true,
                    Relation::INNER_KEY => 'id',
                    Relation::OUTER_KEY => 'id',
                ],
            ],
        ],
    ],
    'acc.contractor_legal_person' => [
        Schema::ENTITY => LegalPersonDetails::class,
        Schema::TABLE => 'acc_contractor_legal_person',
        Schema::PRIMARY_KEY => 'id',
        Schema::COLUMNS => [
            'id' => 'id',
            'shortName' => 'short_name',
            'fullName' => 'full_name',
            'inn' => 'inn',
            'kpp' => 'kpp',
            'okpo' => 'okpo',
            'ogrn' => 'ogrn',
            'legalAddress' => 'legal_address',
        ],
        Schema::TYPECAST => [
            'id' => 'int',
            'shortName' => 'string',
            'fullName' => 'string',
            'inn' => 'string',
            'kpp' => 'string',
            'okpo' => 'string',
            'ogrn' => 'string',
            'legalAddress' => 'string',
        ],
        Schema::RELATIONS => [],
    ],
    'acc.contractor_natural_person' => [
        Schema::ENTITY => NaturalPersonDetails::class,
        Schema::TABLE => 'acc_contractor_natural_person',
        Schema::PRIMARY_KEY => 'id',
        Schema::COLUMNS => [
            'id' => 'id',
        ],
        Schema::TYPECAST => [
            'id' => 'int',
        ],
        Schema::RELATIONS => [
            'passport' => [
                Relation::TYPE => Relation::EMBEDDED,
                Relation::TARGET => 'acc.contractor_natural_person.passport',
                Relation::LOAD => null,
                Relation::SCHEMA => [],
            ],
        ],
    ],
    'acc.contractor_natural_person.passport' => [
        Schema::ENTITY => Passport::class,
        Schema::TABLE => 'acc_contractor_natural_person',
        Schema::COLUMNS => [
            'firstName' => 'first_name',
            'middleName' => 'middle_name',
            'lastName' => 'last_name',
            'series' => 'series',
            'number' => 'number',
            'departmentName' => 'department_name',
            'issueDate' => 'issue_date',
            'divisionCode' => 'division_code',
            'registrationAddress' => 'registration_address',
        ],
        Schema::TYPECAST => [
            'firstName' => 'string',
            'middleName' => 'string',
            'lastName' => 'string',
            'series' => 'string',
            'number' => 'string',
            'departmentName' => 'string',
            'issueDate' => 'datetime',
            'divisionCode' => 'string',
            'registrationAddress' => 'string',
        ],
        Schema::RELATIONS => [],
    ],
];
