<?php

namespace App\Repository;

use App\Entity\HelpdeskState;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HelpdeskState|null find($id, $lockMode = null, $lockVersion = null)
 * @method HelpdeskState|null findOneBy(array $criteria, array $orderBy = null)
 * @method HelpdeskState[]    findAll()
 * @method HelpdeskState[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HelpdeskStateRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HelpdeskState::class);
    }

//    /**
//     * @return HelpdeskState[] Returns an array of HelpdeskState objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HelpdeskState
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
