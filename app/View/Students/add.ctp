<?php
// Création du formulaire
echo $this->Form->create('Student');
echo $this->Form->input('lastname', array('label' => 'Nom'));
echo $this->Form->input('firstname', array('label' => 'Prénom'));
echo $this->Form->input('birthdate', array(
    'label' => 'Date de naissance',
    'dateFormat' => 'D-M-Y',
    'minYear' => date('Y') - 35,
    'maxYear' => date('Y'),
));
echo $this->Form->input('Student.is_registered', array('label' => 'L\'élève est inscrit', 'type' => 'checkbox'));
echo $this->Form->end('Sauvegarder');
