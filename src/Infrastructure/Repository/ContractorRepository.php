<?php

declare(strict_types=1);

namespace Module\Accounting\Infrastructure\Repository;

use Cycle\ORM\ORMInterface;
use Cycle\ORM\Transaction;
use Module\Accounting\Domain\Entity\Contractor\Contractor;
use Module\Accounting\Domain\Entity\Contractor\ContractorRepositoryInterface;

final class ContractorRepository implements ContractorRepositoryInterface
{
    private $transaction;

    public function __construct(ORMInterface $orm)
    {
        $this->transaction = new Transaction($orm);
    }

    public function save(Contractor $contractor): void
    {
        $this->transaction->persist($contractor)->run();
    }
}
