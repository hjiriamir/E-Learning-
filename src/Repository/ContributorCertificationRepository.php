<?php

namespace App\Repository;

use App\Entity\ContributorCertification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ContributorCertification>
 *
 * @method ContributorCertification|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContributorCertification|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContributorCertification[]    findAll()
 * @method ContributorCertification[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContributorCertificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContributorCertification::class);
    }

    public function save(ContributorCertification $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ContributorCertification $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    // Vous pouvez ajouter d'autres méthodes personnalisées ici si nécessaire

    // Exemple de méthode pour trouver un ContributorCertification par un champ spécifique
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
