<?php

namespace App\Repository;

use App\Entity\IMEI;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IMEI>
 *
 * @method IMEI|null find($id, $lockMode = null, $lockVersion = null)
 * @method IMEI|null findOneBy(array $criteria, array $orderBy = null)
 * @method IMEI[]    findAll()
 * @method IMEI[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IMEIRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IMEI::class);
    }

    public function countTotalStock()
    {
        return $this->createQueryBuilder('i')
            ->select('COUNT(i)')
            ->innerJoin('i.phone', 'p')
            ->andWhere('p.isActive = 1')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function add(IMEI $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(IMEI $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
