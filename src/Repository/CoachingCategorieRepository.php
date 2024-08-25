<?php

namespace App\Repository;

use App\Entity\CoachingCategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CoachingCategorie>
 *
 * @method CoachingCategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoachingCategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoachingCategorie[]    findAll()
 * @method CoachingCategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoachingCategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoachingCategorie::class);
    }

    public function save(CoachingCategorie $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CoachingCategorie $entity, bool $flush = false): void
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
