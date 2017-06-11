<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class AddressAdmin extends AbstractAdmin
{
    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('street', 'string');
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('street');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('street');
    }

    /**
     * @param mixed $address
     */
    public function prePersist($address)
    {
        $address->setCreatedAt(new \DateTime('now'));
        $address->setUpdatedAt(new \DateTime('now'));
    }

    /**
     * @param mixed $address
     */
    public function preUpdate($address)
    {
        $address->setUpdatedAt(new \DateTime('now'));
    }
}