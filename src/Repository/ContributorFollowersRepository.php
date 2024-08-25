<?php

namespace App\Repository;

use App\Entity\ContributorFollowers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ContributorFollowers>
 *
 * @method ContributorFollowers|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContributorFollowers|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContributorFollowers[]    findAll()
 * @method ContributorFollowers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContributorFollowersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContributorFollowers::class);
    }

    public function save(ContributorFollowers $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ContributorFollowers $entity, bool $flush = false): void
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