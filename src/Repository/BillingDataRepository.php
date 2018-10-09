<?php

namespace App\Repository;

use App\Entity\BillingData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BillingData|null find($id, $lockMode = null, $lockVersion = null)
 * @method BillingData|null findOneBy(array $criteria, array $orderBy = null)
 * @method BillingData[]    findAll()
 * @method BillingData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BillingDataRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BillingData::class);
    }

//    /**
//     * @return BillingData[] Returns an array of BillingData objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BillingData
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
