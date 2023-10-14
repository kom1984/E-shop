<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    public function home(ProductRepository $productRepository): Response
    {
        //return new Response("<html><body><h1>PAGE D'ACCUEIL</h1></body></html>");
        //return $this->render('default/home.html.twig');
        $products = $productRepository->findAll();
        return $this->render('default/home.html.twig',['products'=>$products]);
    }
    #[Route('/{id}', name: 'default_product', methods: ['GET'])]

    public function product(int $id,ProductRepository $productRepository): Response
    {
            //$product = $productRepository->findOneBy(['id'=>$id]);
        $product = $productRepository->findOneById($id);


            return $this->render('default/product.html.twig', [
           'product' =>$product
        ]);
    }
}