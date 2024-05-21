<?php

namespace App\Repository;

use App\Entity\Fortune;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Fortune>
 */
class FortuneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fortune::class);
    }

    public function pickRandom(): ?Fortune
    {
        $count = $this->createQueryBuilder('f')
            ->select('COUNT(f.id)')
            ->getQuery()
            ->getSingleScalarResult();

        if ($count === 0) {
            return null;
        }

        $offset = random_int(0, $count - 1);

        return $this->createQueryBuilder('f')
            ->setFirstResult($offset)
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult();
    }
}
