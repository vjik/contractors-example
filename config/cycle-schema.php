<?php

declare(strict_types=1);

use Cycle\ORM\Relation;
use Cycle\ORM\Schema;
use Module\Accounting\Domain\Entity\Contractor\Contractor;
use Module\Accounting\Domain\Entity\Contractor\LegalPerson;

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
            'legalPerson' => [
                Relation::TYPE => Relation::HAS_ONE,
                Relation::TARGET => 'acc.contractor_legal_person',
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
        Schema::ENTITY => LegalPerson::class,
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
            'legalAddress' => 'legalAddress',
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
];
