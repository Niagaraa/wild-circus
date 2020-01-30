<?php

namespace App\Repository;

use App\Entity\Troop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Troop|null find($id, $lockMode = null, $lockVersion = null)
 * @method Troop|null findOneBy(array $criteria, array $orderBy = null)
 * @method Troop[]    findAll()
 * @method Troop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TroopRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Troop::class);
    }

    // /**
    //  * @return Troop[] Returns an array of Troop objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Troop
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
