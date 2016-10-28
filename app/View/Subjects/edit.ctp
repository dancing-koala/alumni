<?php
// Création du formulaire
echo $this->Form->create('Subject');
echo $this->Form->input('name', array('label' => 'Nom de la matière :'));
echo $this->Form->input('is_available', array('label' => 'La matière est enseignée.', 'type' => 'checkbox'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Sauvegarder');
