<?php

namespace App\Repository;

use App\Entity\Member;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Member|null find($id, $lockMode = null, $lockVersion = null)
 * @method Member|null findOneBy(array $criteria, array $orderBy = null)
 * @method Member[]    findAll()
 * @method Member[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MemberRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Member::class);
    }

    public function findAllOrderedByName() {
        return $this->getEntityManager()
        ->createQuery(
            'SELECT m FROM App:Member m
            ORDER BY m.member_name ASC'
        )
        ->getResult();
    }

    public function findMusicien() {
        return $this->createQueryBuilder('m')
            ->andWhere('m.member_statut = :statut')
            ->setParameter('statut', 'Musicien')
            ->getQuery()
            ->getResult();
    }

    public function findAccompagnateur() {
        return $this->createQueryBuilder('m')
            ->andWhere('m.member_statut = :statut')
            ->setParameter('statut', 'Accompagnateur')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Member[] Returns an array of Member objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Member
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
