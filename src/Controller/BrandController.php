<?php

namespace App\Controller;

use App\Repository\BrandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/brand')]
class BrandController extends AbstractController
{
    #[Route('/', name: 'app_brand_index', methods: ['GET'])]
    public function index(BrandRepository $brandRepository): Response
    {
        // formulaire Brand simple + index en même temps
        return $this->render('brand/index.html.twig', [
            'brands' => $brandRepository->findAllJoinPhone(),
        ]);
    }
}
