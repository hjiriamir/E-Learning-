<?php

namespace App\Repository;

use App\Entity\CoursFinal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CoursFinal>
 *
 * @method CoursFinal|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoursFinal|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoursFinal[]    findAll()
 * @method CoursFinal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoursFinalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoursFinal::class);
    }

    public function save(CoursFinal $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CoursFinal $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    /*public function findByLevels(array $levels)
    {
        return $this->createQueryBuilder('c')
            ->where('c.level IN (:cat)')
            ->setParameter('levels', $levels)
            ->getQuery()
            ->getResult();
    }*/
   /**
     * @param int|array<int> $level
     * @return CoursFinal[]
     */
    public function findByLevels($level)
    {
        $qb = $this->createQueryBuilder('c');

        if (is_array($level)) {
            $qb->andWhere('c.level IN (:cat)')
               ->setParameter('levels', $level);
        } else {
            $qb->andWhere('c.level = :level')
               ->setParameter('level', $level);
        }

        return $qb->getQuery()->getResult();
    }
    
//    /**
//     * @return CoursFinal[] Returns an array of CoursFinal objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CoursFinal
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
