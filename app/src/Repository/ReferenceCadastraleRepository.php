<?php

namespace App\Repository;

use App\Entity\ReferenceCadastrale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ReferenceCadastrale|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReferenceCadastrale|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReferenceCadastrale[]    findAll()
 * @method ReferenceCadastrale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReferenceCadastraleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ReferenceCadastrale::class);
    }

    // /**
    //  * @return ReferenceCadastrale[] Returns an array of ReferenceCadastrale objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ReferenceCadastrale
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
