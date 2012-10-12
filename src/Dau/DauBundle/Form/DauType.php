<?php

namespace Dau\DauBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class DauType extends AbstractType {

    public function buildForm(FormBuilder $builder, array $options) {
        $raion = $nr_rooms = $floors = array();
	$raion[''] = '---';
	$raion[1] = 'Centru';
	$raion[2] = 'Riscani';
	$raion[3] = 'Ciocana';
	$raion[4] = 'Buiucani';
	$raion[5] = 'Botanica';
	$raion[6] = 'Posta Veche';
	$raion[7] = 'Telecentru';
	$raion[8] = 'Aeroport';
	$raion[9] = 'Sculeni';
	$raion[10] = 'Durlesti';
        
        $nr_rooms = array(
            '' => '---', 
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
        );
        
        $floors[''] = '---';
        for($i=1;$i<=16;$i++) {
            $floors[$i] = $i;
        }
        
        $builder->add('title');
        $builder->add('address');
        $builder->add('m2', 'text', array('required' => false));
        $builder->add('nr_floors', 'choice', array('required' => false, 'choices' => array_merge(array(0 => '-'), $floors)));
        $builder->add('content', 'textarea', array('required' => false));
        $builder->add('nr_rooms', 'choice', array('choices' => $nr_rooms));
        $builder->add('floor', 'choice', array('choices' => $floors));
        $builder->add('price', 'text');
        $builder->add('fix', 'text', array('required' => false));
        $builder->add('mobil');
        $builder->add('email', 'email', array('required' => false));
        $builder->add('raion', 'choice', array('choices' => $raion));
    }

    public function getName() {
        return 'dau_form';
    }

}