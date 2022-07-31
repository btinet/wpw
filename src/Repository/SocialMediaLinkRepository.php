<?php

namespace App\Repository;

use App\Entity\SocialMediaLink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SocialMediaLink>
 *
 * @method SocialMediaLink|null find($id, $lockMode = null, $lockVersion = null)
 * @method SocialMediaLink|null findOneBy(array $criteria, array $orderBy = null)
 * @method SocialMediaLink[]    findAll()
 * @method SocialMediaLink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SocialMediaLinkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SocialMediaLink::class);
    }

    public function add(SocialMediaLink $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SocialMediaLink $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SocialMediaLink[] Returns an array of SocialMediaLink objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SocialMediaLink
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
