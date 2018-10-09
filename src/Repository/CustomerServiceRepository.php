<?php

namespace App\Repository;

use App\Entity\CustomerService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CustomerService|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomerService|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomerService[]    findAll()
 * @method CustomerService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerServiceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CustomerService::class);
    }

//    /**
//     * @return CustomerService[] Returns an array of CustomerService objects
//     */
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
    public function findOneBySomeField($value): ?CustomerService
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
