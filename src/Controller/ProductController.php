<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\PostType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class ProductController extends AbstractController
{
    #[Route('/dashboard/product/create', name: 'product_create', methods: ['GET', 'POST'])]
    public function createProduct(Request $request, EntityManagerInterface $manager)
    {
        $product = new Product();
        $form = $this->createForm(PostType::class, $product);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($product);
            $manager->flush();
        }
        return $this->render('product/create.html.twig', [
            'form' => $form
        ]);
    }

}
