<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CustomerType.
 *
 *
 * @author  Wils Iglesias <wiglesias83@gmail.com>
 */
class CustomerFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'nif',
                TextType::class,
                array(
                    'label' => false,
                    'required' => true,
                    'block_name' => 'custom_nif',
                    'attr' => array(
                        'placeholder' => 'DNI *',
                    ),
                )
            )
            ->add(
                'name',
                TextType::class,
                array(
                    'label' => false,
                    'required' => true,
                    'attr' => array(
                        'placeholder' => 'Nom *',
                    ),
                )
            )
            ->add(
                'surname',
                TextType::class,
                array(
                    'label' => false,
                    'required' => true,
                    'attr' => array(
                        'placeholder' => 'Cognoms *',
                    ),
                )
            )
            ->add(
                'email',
                EmailType::class,
                array(
                    'label' => false,
                    'required' => true,
                    'attr' => array(
                        'placeholder' => 'Email *',
                    ),
                )
            )
            ->add(
                'phone',
                TextType::class,
                array(
                    'label' => false,
                    'required' => false,
                    'attr' => array(
                        'placeholder' => 'Telèfon',
                    ),
                )
            )
            ->add(
                'address',
                TextType::class,
                array(
                    'label' => false,
                    'required' => false,
                    'attr' => array(
                        'placeholder' => 'Adreça *',
                    ),
                )
            )
            ->add(
                'postalCode',
                TextType::class,
                array(
                    'label' => false,
                    'required' => false,
                    'attr' => array(
                        'placeholder' => 'Codi Postal *',
                    ),
                )
            )
            ->add(
                'province',
                TextType::class,
                array(
                    'label' => false,
                    'required' => false,
                    'attr' => array(
                        'placeholder' => 'Província *',
                    ),
                )
            )
            ->add(
                'send',
                SubmitType::class,
                array(
                    'label' => '<i class="add to calendar icon"></i> Reservar',
                    'attr' => array(
                        'class' => 'ui positive',
                    ),
                )
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'AppBundle\Entity\Customer',
            )
        );
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_customer_type';
    }
}
