<?php

namespace App\Repository;

use App\Entity\OnlineResource;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OnlineResource>
 *
 * @method OnlineResource|null find($id, $lockMode = null, $lockVersion = null)
 * @method OnlineResource|null findOneBy(array $criteria, array $orderBy = null)
 * @method OnlineResource[]    findAll()
 * @method OnlineResource[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OnlineResourceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OnlineResource::class);
    }

//    /**
//     * @return OnlineResource[] Returns an array of OnlineResource objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OnlineResource
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
