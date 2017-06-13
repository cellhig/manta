<?php

namespace Manta\FacturationBundle\Form;

use Manta\FacturationBundle\Entity\Categoria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProductoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre',null, array( 'required' => true))
            ->add('precio',null, array( 'required' => true))
            ->add('stock',null, array( 'required' => true, 'attr' => array('min' => '1', 'max' => '100000000')))
            ->add('categoriaId', EntityType::class, array(
                'class' => 'MantaFacturationBundle:Categoria',
                'choice_label' => 'nombre',
                'label' => 'Categoría'
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Manta\FacturationBundle\Entity\Producto'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'manta_facturationbundle_producto';
    }
}
