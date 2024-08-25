<?php

namespace App\Repository;

use App\Entity\ContributorRating;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ContributorRating>
 *
 * @method ContributorRating|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContributorRating|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContributorRating[]    findAll()
 * @method ContributorRating[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContributorRatingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContributorRating::class);
    }

    public function save(ContributorRating $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ContributorRating $entity, bool $flush = false): void
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
