<?php

namespace App\Repository;

use App\Entity\ArrivalsDetails;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ArrivalsDetails>
 *
 * @method ArrivalsDetails|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArrivalsDetails|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArrivalsDetails[]    findAll()
 * @method ArrivalsDetails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArrivalsDetailsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArrivalsDetails::class);
    }

    public function save(ArrivalsDetails $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ArrivalsDetails $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ArrivalsDetails[] Returns an array of ArrivalsDetails objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ArrivalsDetails
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
