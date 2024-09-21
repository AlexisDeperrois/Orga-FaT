<?php

namespace App\Controller;

use App\Entity\Emplacement;
use App\Entity\Table;
use App\Repository\EmplacementRepository;
use App\Repository\TableRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/table')]
final class TableController extends AbstractController
{
 
    #[Route('/new', name: 'app_table_new', methods: ['GET', 'POST'])]
    public function new(EntityManagerInterface $entityManager, TableRepository $tableRepository): Response
    {
        $table = new Table();
        $table->setNumber(count($tableRepository->findAll())+1);       
        $entityManager->persist($table);
        $entityManager->flush();

        return $this->redirectToRoute('app_reservation_plan', [], Response::HTTP_SEE_OTHER);
        
    }

    #[Route('/add-emplacement/{id}', name: 'app_table_add_emplacements', methods: ['GET'])]
    public function addEmplacement(Table $table, EntityManagerInterface $entityManager): Response
    {
        $newEmplacement= new Emplacement;
        $newEmplacement->setRangée($table);
        $newEmplacement->setNumber(count($table->getEmplacements())+1);


        $entityManager->persist(($newEmplacement));
        $entityManager->persist($table);
        $entityManager->flush();


        return $this->redirectToRoute('app_reservation_plan', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/remove-emplacement/{id}', name: 'app_table_remove_emplacements', methods: ['GET'])]
    public function removeEmplacement(Table $table, EntityManagerInterface $entityManager, EmplacementRepository $emplacementRepository): Response
    {        
        $table->removeEmplacement($table->getEmplacements()->last());
        $entityManager->persist($table);
        $entityManager->flush();
        

        return $this->redirectToRoute('app_reservation_plan', [], Response::HTTP_SEE_OTHER);
    }
    

    #[Route('/remove', name: 'app_table_delete', methods: ['GET'])]
    public function delete(EntityManagerInterface $entityManager, TableRepository $tableRepository): Response
    {
        $lastTable = $tableRepository->findOneBy([],['number'=>'DESC']);
        $entityManager->remove($lastTable);
        $entityManager->flush();
        

        return $this->redirectToRoute('app_reservation_plan', [], Response::HTTP_SEE_OTHER);
    }
}
