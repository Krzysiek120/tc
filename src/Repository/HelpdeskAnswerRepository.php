<?php

namespace App\Repository;

use App\Entity\HelpdeskAnswer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HelpdeskAnswer|null find($id, $lockMode = null, $lockVersion = null)
 * @method HelpdeskAnswer|null findOneBy(array $criteria, array $orderBy = null)
 * @method HelpdeskAnswer[]    findAll()
 * @method HelpdeskAnswer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HelpdeskAnswerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HelpdeskAnswer::class);
    }

//    /**
//     * @return HelpdeskAnswer[] Returns an array of HelpdeskAnswer objects
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
    public function findOneBySomeField($value): ?HelpdeskAnswer
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
