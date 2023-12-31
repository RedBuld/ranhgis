<?php

namespace App\Repository;

use App\Entity\MessageMapping;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MessageMapping>
 *
 * @method MessageMapping|null find($id, $lockMode = null, $lockVersion = null)
 * @method MessageMapping|null findOneBy(array $criteria, array $orderBy = null)
 * @method MessageMapping[]    findAll()
 * @method MessageMapping[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MessageMappingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MessageMapping::class);
    }

//    /**
//     * @return MessageMapping[] Returns an array of MessageMapping objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MessageMapping
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
