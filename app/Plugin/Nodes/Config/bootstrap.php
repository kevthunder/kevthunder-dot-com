<?php

Croogo::hookComponent('*', 'Nodes.Nodes');

Croogo::hookHelper('*', 'Nodes.Nodes');

// Configure Wysiwyg
Croogo::mergeConfig('Wysiwyg.actions', array(
	'Nodes/admin_add' => array(
		array(
			'elements' => 'NodeBody',
		),
	),
	'Nodes/admin_edit' => array(
		array(
			'elements' => 'NodeBody',
		),
	),
	'Translate/admin_edit' => array(
		array(
			'elements' => 'NodeBody',
		),
	),
));

CroogoNav::add('content', array(
	'icon' => array('edit', 'large'),
	'title' => __d('croogo', 'Content'),
	'url' => array(
		'plugin' => 'nodes',
		'admin' => true,
		'controller' => 'nodes',
		'action' => 'index',
	),
	'weight' => 10,
	'children' => array(

		'list' => array(
			'title' => __d('croogo', 'List'),
			'url' => array(
				'plugin' => 'nodes',
				'admin' => true,
				'controller' => 'nodes',
				'action' => 'index',
			),
			'weight' => 10,
		),

		'create' => array(
			'title' => __d('croogo', 'Create'),
			'url' => array(
				'plugin' => 'nodes',
				'admin' => true,
				'controller' => 'nodes',
				'action' => 'create',
			),
			'weight' => 20,
		),

	)
));
