<?php

namespace App\Repository;

use App\Entity\Phone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Phone>
 *
 * @method Phone|null find($id, $lockMode = null, $lockVersion = null)
 * @method Phone|null findOneBy(array $criteria, array $orderBy = null)
 * @method Phone[]    findAll()
 * @method Phone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Phone::class);
    }

    public function findLastStockout()
    {
        return $this->createQueryBuilder('p')
            ->select('p')
            ->innerJoin('p.brand', 'b')
            ->orderBy('p.updatedAt', 'DESC')
            // WHERE p.imeis <= p.limitStock ? :(
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();
    }

    public function findAllJoinAll()
    {
        return $this->createQueryBuilder('p')
            ->select('p', 'b', 'i')
            ->innerJoin('p.brand', 'b')
            ->leftJoin('p.imeis', 'i')
            ->andWhere('p.isActive = 1')
            ->getQuery()
            ->getResult();
    }

    public function add(Phone $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Phone $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
