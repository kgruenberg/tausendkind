<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CustomerAdmin extends AbstractAdmin
{
    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('customer_number', 'entity', ['label' => 'Kundennummer'])
            ->add('prefix', 'text', ['label' => 'Namensvorsatz'])
            ->add('firstname', 'text', ['label' => 'Vorname'])
            ->add('lastname', 'text', ['label' => 'Nachname']);
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('customer_number')
            ->add('firstname')
            ->add('lastname');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('customer_number')
            ->addIdentifier('firstname')
            ->addIdentifier('lastname')
            ->addIdentifier('created_at')
            ->addIdentifier('updated_at')
        ;
    }

    /**
     * @param mixed $customer
     */
    public function prePersist($customer)
    {
        $customer->setCreatedAt(new \DateTime('now'));
        $customer->setUpdatedAt(new \DateTime('now'));
    }

    /**
     * @param mixed $customer
     */
    public function preUpdate($customer)
    {
        $customer->setUpdatedAt(new \DateTime('now'));
    }
}