<?php

namespace App\Repository;

use App\Entity\CoursCategorie2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CoursCategorie2>
 *
 * @method CoursCategorie2|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoursCategorie2|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoursCategorie2[]    findAll()
 * @method CoursCategorie2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoursCategorie2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoursCategorie2::class);
    }

    public function save(CoursCategorie2 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CoursCategorie2 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    // Vous pouvez ajouter d'autres méthodes personnalisées ici si nécessaire

    // Exemple de méthode pour trouver un ContributorFollowers par un champ spécifique
    // public function findBySomeField($value): array
    // {
    //     return $this->createQueryBuilder('cf')
    //         ->andWhere('cf.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->orderBy('cf.id', 'ASC')
    //         ->setMaxResults(10)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }
}