<?php

namespace App\Controller;

use App\Entity\Offer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OfferRepository;

class OfferController extends AbstractController
{
    #[Route('/offer/{id}', name: 'offer')]
    public function index(OfferRepository $offerRepository, int $id): Response
    {
        return $this->render('offer/index.html.twig', [
            'offer' => $offerRepository->find($id),
        ]);
    }
}
