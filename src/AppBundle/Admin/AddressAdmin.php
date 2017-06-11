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
        $formMapper
            ->add('street', 'text', ['label' => 'Straße'])
            ->add('postcode', 'text', ['label' => 'Postleitzahl'])
            ->add('city', 'text', ['label' => 'Stadt'])
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('street')
            ->add('postcode')
            ->add('city')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('street')
            ->addIdentifier('postcode')
            ->addIdentifier('city')
            ->addIdentifier('created_at')
            ->addIdentifier('updated_at')
        ;
    }

    /**
     * @param mixed $address
     */
    public function prePersist($address)
    {
        $address->setCustomerId(1);
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