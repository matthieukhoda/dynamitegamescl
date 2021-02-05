<?php

namespace App\Repository;

use App\Entity\NewController;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NewController|null find($id, $lockMode = null, $lockVersion = null)
 * @method NewController|null findOneBy(array $criteria, array $orderBy = null)
 * @method NewController[]    findAll()
 * @method NewController[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewControllerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NewController::class);
    }

    // /**
    //  * @return NewController[] Returns an array of NewController objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NewController
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
