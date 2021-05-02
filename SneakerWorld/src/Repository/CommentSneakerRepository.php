<?php

namespace App\Repository;

use App\Entity\CommentSneaker;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CommentSneaker|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommentSneaker|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommentSneaker[]    findAll()
 * @method CommentSneaker[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentSneakerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommentSneaker::class);
    }

    // /**
    //  * @return CommentSneaker[] Returns an array of CommentSneaker objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CommentSneaker
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
