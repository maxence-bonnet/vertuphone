<?php

namespace App\Controller;

use App\Repository\PhoneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PhoneRepository $phoneRepository): Response
    {
        $stockoutPhones = [];
        $totalStock = 0;
        return $this->render('home/index.html.twig', [
            'totalStock' => $totalStock,
            'stockoutPhones' => $stockoutPhones,
        ]);
    }
}
