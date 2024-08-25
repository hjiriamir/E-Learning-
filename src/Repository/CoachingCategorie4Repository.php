<?php

namespace App\Repository;

use App\Entity\CoachingCategorie4;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CoachingCategorie4>
 *
 * @method CoachingCategorie4|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoachingCategorie4|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoachingCategorie4[]    findAll()
 * @method CoachingCategorie4[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoachingCategorie4Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoachingCategorie4::class);
    }

    public function save(CoachingCategorie4 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CoachingCategorie4 $entity, bool $flush = false): void
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
