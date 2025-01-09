<?php

namespace App\Repository;

use DateTime;
use App\Entity\User;
use App\Entity\Event;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Event>
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Event::class);
    }

//    /**
//     * @return Event[] Returns an array of Event objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Event
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function findPastEvents(User $user)
    {
        return $this->createQueryBuilder('e')
            ->where('e.date < :now')
            // ->andWhere('e.time > :currentTime')
            ->andWhere(':user MEMBER OF e.subscribedUsers')
            ->setParameter('now', new DateTime())
            // ->setParameter('currentTime', new DateTime())
            ->setParameter('user', $user)
            ->orderBy('e.date', 'DESC')
            ->addOrderBy('e.time', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findCompanyEvents($company)
    {
        return $this->createQueryBuilder('e')
            ->where('e.company = :company')
            ->setParameter('company', $company)
            ->orderBy('e.date', 'desc')
            ->getQuery()
            ->getResult();
    }
}
