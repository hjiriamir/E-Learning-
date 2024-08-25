<?php

namespace App\Repository;

use App\Entity\CoachingStepContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CoachingStepContent>
 *
 * @method CoachingStepContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoachingStepContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoachingStepContent[]    findAll()
 * @method CoachingStepContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoachingStepContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoachingStepContent::class);
    }

    public function save(CoachingStepContent $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CoachingStepContent $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
 

//    /**
//     * @return CoachingStepContent[] Returns an array of CoachingStepContent objects
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

//    public function findOneBySomeField($value): ?CoachingStepContent
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
