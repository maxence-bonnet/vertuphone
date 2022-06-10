<?php

namespace App\Controller;

use App\Repository\IMEIRepository;
use App\Repository\PhoneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PhoneRepository $phoneRepository, IMEIRepository $IMEIRepository): Response
    {
        $stockoutPhones = $phoneRepository->findLastStockout();
        $totalStock = $IMEIRepository->countTotalStock();
        
        return $this->render('home/index.html.twig', [
            'stockoutPhones' => $stockoutPhones,
            'totalStock' => $totalStock,
        ]);
    }
}
