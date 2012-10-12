<?php

namespace Dau\DauBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ContactsType extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        $builder->add('email', 'email');
        $builder->add('subject', 'text');
        $builder->add('content', 'textarea', array('required' => false));
    }

    public function getName() {
        return 'contacts_form';
    }

}