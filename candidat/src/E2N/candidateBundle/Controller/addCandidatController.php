<?php

 namespace E2N\candidateBundle\Controller;

 use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//chemin vers l'entité (table)
 use E2N\candidateBundle\Entity\users;
 use E2N\candidateBundle\Form\usersType;
 use Symfony\Component\HttpFoundation\Request;
 use Symfony\Component\Validator\Constraints as Assert;
 //fichiers servant à la création du formulaire
// use Symfony\Component\Form\Extension\Core\Type\FormType;
// use Symfony\Component\Form\Extension\Core\Type\SubmitType;
// use Symfony\Component\Form\Extension\Core\Type\TextareaType;
// use Symfony\Component\Form\Extension\Core\Type\TextType;
// use Symfony\Component\Form\Extension\Core\Type\IntegerType;
// use Symfony\Component\Form\Extension\Core\Type\EmailType;

 class addCandidatController extends Controller {

     public function addCandidatAction(Request $request)
     {
//         $user = new user();
//         //préparation de la création du formulaire
//         $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $user);
//         //création du formulaire
//         $formBuilder
//                 ->add('nom de l'attribut des entités
//                 ->add('lastname', TextType::class)
//                 ->add('firstname', TextType::class)
//                 ->add('mail', EmailType::class)
//                 ->add('motivation', TextareaType::class)
//                 ->add('palme', IntegerType::class)
//                 ->add('submit', SubmitType::class);
//         //on génère le formulaire
//         $form = $formBuilder->getForm();
         $users = new users();
//         $users->setLastname();
//         $users->setFirstname();
//         $users->setMail();
//         $users->setMotivation();
//         $users->setPalme('1');
         
         $form = $this->get('form.factory')->create(usersType::class, $users);
         //handleRequest valide le fait que le formulaire a bien été créé et rendu sur la page, indique que le formulaire n'a pas été soumis au chargement de la page
         //si le fomulaire est valide et soumis (isSubmitted verifie si le formulaire est soumis ou non.
           //isValid permet de savoir si le formulaire est valide
         if ($request->isMethod('POST') && $form->handleRequest($request)->isValid())
         {
             //récupération des données avec getData()
             $users = $form->getData();
             //on fait appel au service de doctrine, getManager fait appel à la configuration du fichier config.yml ,récupère les tables de la bdd connecté à doctrine
             $em = $this->getDoctrine()->getManager();
             //modification de l'objet $users dans doctrine pour y placer les données récupérées avec getData()
             $em->persist($users);
             // récupération et insertions (post) des objets modifiés et persistés dans la table
             $em->flush();
             // redirection vers une page de notre choix
             return $this->redirectToRoute('add_candidat');
         }
         return $this->render('@E2Ncandidate/addCandidat/add_candidat.html.twig'
                ,array('formView' => $form->createView())
         );
     }

 }
 