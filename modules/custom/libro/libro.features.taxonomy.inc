<?php
/**
 * @file
 * libro.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function libro_taxonomy_default_vocabularies() {
  return array(
    'autores' => array(
      'name' => 'Autores',
      'machine_name' => 'autores',
      'description' => '',
      'hierarchy' => '0',
      'module' => 'taxonomy',
      'weight' => '0',
    ),
    'editoriales' => array(
      'name' => 'Editoriales',
      'machine_name' => 'editoriales',
      'description' => '',
      'hierarchy' => '0',
      'module' => 'taxonomy',
      'weight' => '0',
    ),
    'materias' => array(
      'name' => 'Materias',
      'machine_name' => 'materias',
      'description' => '',
      'hierarchy' => '0',
      'module' => 'taxonomy',
      'weight' => '0',
    ),
  );
}