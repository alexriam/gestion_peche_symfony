<?php

namespace PriseBundle\Form;

use DateTime;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Prise3Form extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        //echo '<pre>' . print_r($options, true) . '</pre>';
        
        $builder
            ->add('priseid', TextType::class, array(
                'required' => true,
                'label' => 'prise id: ',
                //'attribute' => array('readonly', 'readonly')
                'attr' => array('readonly' => true)
            )
        )
        /* ->add('sessionpecheid', TextType::class, array(
          'required' => true,
          'label' => 'Session peche id: '
          )
          ) */
        /*->add('sessionpecheid', ChoiceType::class, array(
                'required' => true,
                'label' => 'Session peche id: ',
                'choices' => $this->loadSessionPecheId()
            )
        )*/
        /*->add('sessionpecheid', ChoiceType::class, array(
                'required' => true,
                'label' => 'Session peche id: ',
                'choices' => $this->loadSessionPecheId(),
                'attr' => array('class' => 'form-control'),
            )
        )*/
        /*->add('sessionpecheid', EntityType::class, array(
            'class' => 'PriseBundle:SessionPeche3',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('sp3')
                    ->orderBy('sp3.sessionPecheId', 'DESC')
                    ->setMaxResults(10);
            },
            'choice_label' => 'Sessionpecheid',
            'label' => 'Session peche id: ',
            //'choice_value' => '',
            'empty_data'  => 'aa',
        ))*/
        ->add('datePrise', DateType::class, array(
                //'input' => 'datetime',
                'html5' => true,
                'data' => new DateTime(),
                'widget' => 'single_text',//'choice',
                //'placeholder' => array('year' => 'Année', 'month' => 'Mois', 'day' => 'Jour'),
                'format' => 'yyyy-MM-dd',
                'years' => range(date('Y')-1, date('Y')+1),
                'label' => 'Ta date de prise: ',
                //'attr' => ['class' => 'js-datepicker'],
                'attr' => array('class' => 'form-control'),
                )
            )
            ->add('poisson', TextType::class, array(
                'required' => true,
                'label' => 'Ton poisson: ',
                'attr' => array('class' => 'form-control'),
                    )
            )
            ->add('lieu', TextType::class, array(
                'required' => true,
                'label' => 'Ton lieu : ',
                'attr' => array('class' => 'form-control'),
                    )
            )
            ->add('lieuPrecis', TextType::class, array(
                'required' => false,
                'label' => 'Ton lieuPrecis (option): ',
                'data' => '',
                'attr' => array('class' => 'form-control'),
                    )
            )
            /* ->add('email', EmailType::class, array(
              'required' => true,
              'label' => 'Ton Email: '
              )
              ) */
            ->add('pecheur', TextType::class, array(
                'required' => true,
                'label' => 'Ton pecheur : ',
                'attr' => array('class' => 'form-control'),
                    )
            )
            ->add('commentaire', TextType::class, array(
                'required' => false,
                'label' => 'Ton commentaire (option): ',
                'attr' => array('class' => 'form-control'),
                    )
            )
            ->add('appat', TextType::class, array(
                'required' => false,
                'label' => 'Appat (option): ',
                'attr' => array('class' => 'form-control'),
                    )
            )
            ->add('technique', TextType::class, array(
                'required' => false,
                'label' => 'Technique (option): ',
                'attr' => array('class' => 'form-control'),
                    )
            )
            ->add('leurre', TextType::class, array(
                'required' => false,
                'label' => 'Leurre (option): ',
                'attr' => array('class' => 'form-control'),
                    )
            )
            ->add('taille', TextType::class, array(
                'required' => false,
                'label' => 'Taille (option): ',
                'attr' => array('class' => 'form-control'),
                    )
            )
            ->add('poids', TextType::class, array(
                'required' => false,
                'label' => 'Poids (option): ',
                'attr' => array('class' => 'form-control'),
                    )
            )
            ->add('posLat', TextType::class, array(
                'required' => false,
                'label' => 'Position latitude (option): ',
                'attr' => array('class' => 'form-control'),
                    )
            )
            ->add('posLong', TextType::class, array(
                'required' => false,
                'label' => 'Position longitude (option): ',
                'attr' => array('class' => 'form-control'),
                    )
            )
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        /* $resolver->setDefaults(array(
          'data_class' => 'Adista\TestBundle\Entity\FormulaireContact'
          )); */
    }

    /**
     * @return string
     */
    public function getName() {
        return 'prisebundle_formulaireprise3';
    }
    
    
    public function fillSessionPecheId($aSessionId)
    {
        
    }
    
    private function loadSessionPecheId()
    {
        /*$choices          = [];
        $table2Repository = $this->getDoctrine()->getRepository('BlocMainBundle:Table2');
        $table2Objects    = $table2Repository->findAll();

        foreach ($table2Objects as $table2Obj) {
            $choices[$table2Obj->getId()] = $table2Obj->getNumero() . ' - ' . $table2Obj->getName();
        }*/

        //return $choices;
        
        
        
        return array(
                    'yes' => true,
                    'no' => false,
                    'maybe' => null,
                    'yes2' => 'true2',
                    'no2' => 'false2',
                    'maybe2' => 'null2',
                );
    }

}
