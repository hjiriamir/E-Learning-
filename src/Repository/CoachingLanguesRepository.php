<?php

namespace App\Repository;

use App\Entity\CoachingLangues;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CoachingLangues>
 *
 * @method CoachingLangues|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoachingLangues|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoachingLangues[]    findAll()
 * @method CoachingLangues[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoachingLanguesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoachingLangues::class);
    }

    public function save(CoachingLangues $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CoachingLangues $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    // Vous pouvez ajouter d'autres méthodes personnalisées ici si nécessaire

    // Exemple de méthode pour trouver un CoachingLangues par un champ spécifique
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