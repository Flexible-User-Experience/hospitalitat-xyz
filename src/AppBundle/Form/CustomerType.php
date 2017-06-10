<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CustomerType
 *
 * @package AppBundle\Form
 *
 * @author  Wils Iglesias <wiglesias83@gmail.com>
 */
class CustomerType extends AbstractType
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
                    'attr' => array(
                        'placeholder' => 'DNI *',
                    ),
                    'constraints' => array(
                        new Assert\NotBlank(),
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
                    'constraints' => array(
                        new Assert\NotBlank(),
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
                    'constraints' => array(
                        new Assert\NotBlank(),
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
                    'constraints' => array(
                        new Assert\NotBlank(),
                        new Assert\Email(array(
                            'strict' => true,
                            'checkMX' => true,
                            'checkHost' => true,
                        )),
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
                        'placeholder' => 'Adreça',
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
                        'placeholder' => 'Codi Postal',
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
                        'placeholder' => 'Província',
                    ),
                )
            )
            ->add(
                'send',
                SubmitType::class,
                array(
                    'label' => 'Enviar',
                    'attr' => array(
                        'class' => 'btn btn-primary no-m-bottom',
                        'style' => 'margin-bottom: -15px',
                    ),
                )
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'AppBundle\Entity\Customer'
            )
        );
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_customer_type';
    }
}
