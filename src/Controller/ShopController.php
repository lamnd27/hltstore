<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Entity\Product;
use App\Entity\User;
use App\Repository\CartRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{
    #[Route('/shop', name: 'all_product')]
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('shop/index.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }
    //buy
    #[Route('/buy/{id}', name: 'buy_product')]
    public function buy(int $id, Product $product, EntityManagerInterface $entityManager, UserRepository $ur, CartRepository $cr): Response
    {
        
        $re = $cr->addToCart($id);
        
        if (count($re)==0) {
            $cart = new Cart();
        $u = $ur->find(1);
        $cart->setCuserid($u);    
        $cart->setCproid($product);    
        $cart->setCquantity(1);    
        $cart->setCdate(new \DateTime(date('Y-m-d H:i')));    
        $entityManager->persist($cart);
        $entityManager->flush();
        }
        else {
            $cid = $re[0]['id'];
            $quan = $re[0]['cquantity'];
            $cart = $cr->find($cid);
            $cart->setCquantity($quan+1);
            $entityManager->persist($cart);
            $entityManager->flush();
        
        }


        return new Response('ok');
        // return $this->render('shop/test.html.twig', [
        //     're' => $re[0]
        // ]);
    }
    #[Route('/admin', name: 'admin')]
    public function adindex( ): Response
    {
        return $this->render('admin.html.twig');
    }

    #[Route('/Homepage', name: 'Homepage')]
    public function Homeindex( ): Response
    {
        return $this->render('shop/content.html.twig');
    }

}
