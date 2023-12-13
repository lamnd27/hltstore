<?php

namespace App\Repository;

use App\Entity\Cart;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cart>
 *
 * @method Cart|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cart|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cart[]    findAll()
 * @method Cart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CartRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cart::class);
    }

//    /**
//     * @return Cart[] Returns an array of Cart objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Cart
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

//SELECT `id` ,`cquantity` FROM `cart` WHERE `cproid_id` = 1
   /**
    * @return Cart[] Returns an array of Cart objects
    */
   public function addToCart($id): array
   {
       return $this->createQueryBuilder('c')
            ->select('c.id, c.cquantity')
           ->andWhere('c.cproid = :val')
           ->setParameter('val', $id)
           ->getQuery()
           ->getResult()
       ;
   }
//SELECT `p.pname`,`p.price`,`p.image`,`c.cquantity` FROM `cart` c , `product` p WHERE c.cproid = p.pid and `cuserid`=1
   /**
    * @return Cart[] Returns an array of Cart objects
    */
    public function showCart($id): array
    {
        return $this->createQueryBuilder('c')
            ->select('c.id, c.cquantity, p.pname, p.price, p.image ')
            ->innerJoin('c.cproid','p')
            ->andWhere('c.id = :val')
            ->setParameter('val', $id)
            ->getQuery()
            ->getResult()
        ;
    }
// //SELECT `u.username`,`c.cquantity`, `c.cdate` FROM `cart` c , `user` u WHERE c.cuserid = u.uid and `cid`= ?
//    /**
//     * @return Cart[] Returns an array of Cart objects
//     */
//     public function listCart($id): array
//     {
//         return $this->createQueryBuilder('c')
//             ->select('u.username,c.cquantity,c.cdate ')
//             ->innerJoin('c.cuserid','u')
//             ->andWhere('c.id = :val')
//             ->setParameter('val', $id)
//             ->getQuery()
//             ->getResult()
//         ;
//     }

}
