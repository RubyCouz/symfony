<?php

 namespace E2N\candidateBundle\Form;

 use Symfony\Component\Form\AbstractType;
 use Symfony\Component\Form\FormBuilderInterface;
 use Symfony\Component\OptionsResolver\OptionsResolver;
 use Symfony\Component\Form\Extension\Core\Type\SubmitType;
 use Symfony\Component\Form\Extension\Core\Type\TextareaType;
 use Symfony\Component\Form\Extension\Core\Type\TextType;
 use Symfony\Component\Form\Extension\Core\Type\IntegerType;
 use Symfony\Component\Form\Extension\Core\Type\EmailType;

 class usersType extends AbstractType {

     /**
      * {@inheritdoc}
      */
     public function buildForm(FormBuilderInterface $builder, array $options)
     {
         $builder
                 ->add('lastname', TextType::class, array('label' => 'Nom :'))
                 ->add('firstname', TextType::class, array('label' => 'Prénom :'))
                 ->add('mail', TextType::class, array('label' => 'Adresse mail :'))
                 ->add('motivation', TextareaType::class, array('label' => 'Motivation :'))
                 ->add('palme', IntegerType::class, array('label' => 'Nombre de palme :'))
                 ->add('submit', SubmitType::class, array('label' => 'Ajout d\'un candidat'));
     }

     /**
      * {@inheritdoc}
      */
     public function configureOptions(OptionsResolver $resolver)
     {
         $resolver->setDefaults(array(
             'data_class' => 'E2N\candidateBundle\Entity\users'
         ));
     }

     /**
      * {@inheritdoc}
      */
     public function getBlockPrefix()
     {

         return 'e2n_candidatebundle_users';
     }

 }
 