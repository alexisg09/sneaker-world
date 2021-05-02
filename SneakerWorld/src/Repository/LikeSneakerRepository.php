<?php

namespace App\Repository;

use App\Entity\LikeSneaker;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method LikeSneaker|null find($id, $lockMode = null, $lockVersion = null)
 * @method LikeSneaker|null findOneBy(array $criteria, array $orderBy = null)
 * @method LikeSneaker[]    findAll()
 * @method LikeSneaker[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LikeSneakerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LikeSneaker::class);
    }

    // /**
    //  * @return LikeSneaker[] Returns an array of LikeSneaker objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LikeSneaker
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
