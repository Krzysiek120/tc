<?php

namespace App\Repository;

use App\Entity\HelpDeskApplication;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HelpDeskApplication|null find($id, $lockMode = null, $lockVersion = null)
 * @method HelpDeskApplication|null findOneBy(array $criteria, array $orderBy = null)
 * @method HelpDeskApplication[]    findAll()
 * @method HelpDeskApplication[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HelpDeskApplicationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HelpDeskApplication::class);
    }

//    /**
//     * @return HelpDeskApplication[] Returns an array of HelpDeskApplication objects
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
    public function findOneBySomeField($value): ?HelpDeskApplication
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
