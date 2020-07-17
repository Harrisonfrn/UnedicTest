<?php

namespace App\Controller;

use App\Entity\Student;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * @Route("/api", name="api_")
 */
class APIController extends AbstractController
{
    /**
     * @Route("/students/liste", name="liste", methods={"GET"})
     */
    public function liste(StudentRepository $studentRepository)
    {
        //On récupère la liste des Student 
        $student = $studentRepository->apiFindByDepartment();

        //On spécifie qu'on utilise un encoder en Json
        $encoders = [new JsonEncoder()];

        //On instancie le "normaliseur" pour convertir la collection en tableau
        $normalizers = [new ObjectNormalizer()];

        //On fait la conversion en Json
        //On instancie le convertisseur
        $serializer = new Serializer($normalizers, $encoders);

        //On convertit en Json
        $jsonContent = $serializer->serialize($student, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            }
        ]);

        //On instancie la réponse de symfony
        $response = new Response($jsonContent);

        //On ajoute l'entête http
        $response->headers->set('Content-Type', 'application/json');

        //On envoie la reponse
        return $response;
    }

    /**
     * @Route("/student/voir/{id}", name="voir", methods={"GET"})
     */
    public function getStudent(Student $student)
    {
        //On spécifie qu'on utilise un encoder en Json
        $encoders = [new JsonEncoder()];

        //On instancie le "normaliseur" pour convertir la collection en tableau
        $normalizers = [new ObjectNormalizer()];

        //On fait la conversion en Json
        //On instancie le convertisseur
        $serializer = new Serializer($normalizers, $encoders);

        //On convertit en Json
        $jsonContent = $serializer->serialize($student, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            }
        ]);

        //On instancie la réponse de symfony
        $response = new Response($jsonContent);

        //On ajoute l'entête http
        $response->headers->set('Content-Type', 'application/json');

        //On envoie la reponse
        return $response;
    }
}
