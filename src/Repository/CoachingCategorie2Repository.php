<?php

namespace App\Repository;

use App\Entity\CoachingCategorie2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CoachingCategorie2>
 *
 * @method CoachingCategorie2|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoachingCategorie2|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoachingCategorie2[]    findAll()
 * @method CoachingCategorie2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoachingCategorie2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoachingCategorie2::class);
    }

    public function save(CoachingCategorie2 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CoachingCategorie2 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    // Vous pouvez ajouter d'autres méthodes personnalisées ici si nécessaire

    // Exemple de méthode pour trouver un Contributor par un champ spécifique
    // public function findBySomeField($value): array
    // {
    //     return $this->createQueryBuilder('c')
    //         ->andWhere('c.exampleField = :val')
    //         ->setParameter('val', $value)
    //         ->orderBy('c.id', 'ASC')
    //         ->setMaxResults(10)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }
}
