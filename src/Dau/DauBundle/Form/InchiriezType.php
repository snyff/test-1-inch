<?php

namespace Dau\DauBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class InchiriezType extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        
        $builder->add('title');
        $builder->add('annonce', 'textarea');
        $builder->add('price', 'text');
        $builder->add('fix');
        $builder->add('mobil');
        $builder->add('email', 'email');
    }

    public function getName() {
        return 'inchiriez_form';
    }

}