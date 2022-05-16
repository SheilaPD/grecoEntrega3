<?php

namespace App\Repository;

use App\Entity\Localizacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Localizacion>
 *
 * @method Localizacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Localizacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Localizacion[]    findAll()
 * @method Localizacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocalizacionRepository extends ServiceEntityRepository
{
    public function findOrd()
    {
        return $this
            ->createQueryBuilder('l')
            ->orderBy('l.nombre', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findNoPadre()
    {
        return $this
            ->createQueryBuilder('l')
            ->orderBy('l.nombre', 'ASC')
            ->where('l.padre is NULL')
            ->getQuery()
            ->getResult();
    }

    public function findHijas($id)
    {
        return $this
            ->createQueryBuilder('l')
            ->where('l.padre = :id')
            ->setParameter('id', $id)
            ->orderBy('l.nombre', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Localizacion::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Localizacion $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Localizacion $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Localizacion[] Returns an array of Localizacion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Localizacion
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
