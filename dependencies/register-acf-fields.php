<?php 
if( function_exists('register_field_group') ):

register_field_group(array (
	'key' => 'group_54f5ba985d1e5',
	'title' => 'Configuration Homepage',
	'fields' => array (
		array (
			'key' => 'field_53a2ff1ea893c',
			'label' => 'Mise en avant - Slideshow',
			'name' => 'hp_sildeshow',
			'prefix' => '',
			'type' => 'relationship',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'object',
			'post_type' => array (
				0 => 'post',
				1 => 'tutoriaux',
				2 => 'outils',
				3 => 'projets',
			),
			'taxonomy' => array (
			),
			'filters' => array (
				0 => 'search',
			),
			'max' => 9,
			'elements' => array (
				0 => 'featured_image',
				1 => 'post_type',
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page',
				'operator' => '==',
				'value' => '128',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'permalink',
		1 => 'the_content',
		2 => 'excerpt',
		3 => 'custom_fields',
		4 => 'discussion',
		5 => 'comments',
		6 => 'revisions',
		7 => 'slug',
		8 => 'author',
		9 => 'format',
		10 => 'featured_image',
		11 => 'categories',
		12 => 'tags',
		13 => 'send-trackbacks',
	),
));

register_field_group(array (
	'key' => 'group_54f5ba988e771',
	'title' => 'Description de la catégorie',
	'fields' => array (
		array (
			'key' => 'field_53ff54666a817',
			'label' => 'Fiche outil utilisée pour décrire cette catégorie',
			'name' => 'cat_description',
			'prefix' => '',
			'type' => 'relationship',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'object',
			'post_type' => array (
				0 => 'outils',
			),
			'taxonomy' => array (
			),
			'filters' => array (
				0 => 'search',
			),
			'max' => 1,
			'elements' => array (
				0 => 'post_type',
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'category',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
	),
));

register_field_group(array (
	'key' => 'group_54f5ba98af01f',
	'title' => 'Licence projet',
	'fields' => array (
		array (
			'key' => 'field_53a2a2b508b0d',
			'label' => 'Choisir la licence de mon projet',
			'name' => 'licence_projet',
			'prefix' => '',
			'type' => 'radio',
			'instructions' => 'Attention, il faut qu\'il reste disponible pour n\'importe qui dans le monde, en conformité avec la charte des Fablabs et les conditions d\'utilisation du Faclab',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'CC BY' => 'CC BY',
				'CC BY-NC' => 'CC BY-NC',
				'CC BY-SA' => 'CC BY-SA',
				'CC BY-NC-SA' => 'CC BY-NC-SA',
				'GNU GPL' => 'GNU GPL',
				'Free to beer' => 'Free to beer',
			),
			'other_choice' => 1,
			'save_other_choice' => 0,
			'default_value' => '',
			'layout' => 'vertical',
		),
		array (
			'key' => 'field_53a2a3891e25f',
			'label' => 'Quelle licence choisir ?',
			'name' => '',
			'prefix' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '<h2>Une licence mais pourquoi faire ?</h2>
Selon le principe "Participez, partagez, documentez", vous devez laisser les plans et la documentation des projets que vous réalisez au faclab. Cela ne veut pas dire que vous ne pouvez pas protéger votre travail. Protéger votre travail c\'est définir un cadre dans lequel vous souhaitez qu\'il puisse être réutilisé, amélioré, exploité...

<h2>Comment choisir ma licence ?</h2>
Il existe de nombreuses licences "libres" (qui offrent une protection de la propriété intellectuelle, sans restreindre l\'utilisation de votre projet.) Vous pouvez par exemple consulter le très bon <a href="https://creativecommons.org/choose/" target="_blank">selecteur de licence "Créatives Commons"</a> 
Sachez néanmoins qu\'il existe pleins d\'autre licences, comme la "Free to Beer" (<i>"Faites ce que vous voulez de mon projet, mais payez moi une bière à l\'occasion :)</i>"). En cas de doutes, n\'hesitez pas à pauser la question aux fabmanagers.
Un peu moins digeste, mais tout aussi instructif, <a href="http://freedomdefined.org/OSHW/translations/fr" target="_blank"> une explication de l\'Open-Hardware</a>, un principe qui s\'applique aux objets physiques',
			'esc_html' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'projets',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
	),
));

register_field_group(array (
	'key' => 'group_54f5ba98dfc21',
	'title' => 'Maintenance & consomables',
	'fields' => array (
		array (
			'key' => 'field_53ff5348894a2',
			'label' => 'Entretiens de la machine',
			'name' => 'entretiens_de_la_machine',
			'prefix' => '',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'toolbar' => 'full',
			'media_upload' => 1,
			'tabs' => 'all',
		),
		array (
			'key' => 'field_53ff6748d0b7e',
			'label' => 'Problèmes rencontrés',
			'name' => 'problemes_rencontres',
			'prefix' => '',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'toolbar' => 'full',
			'media_upload' => 1,
			'tabs' => 'all',
		),
		array (
			'key' => 'field_53ff53aa894a4',
			'label' => 'Consommables',
			'name' => 'consommables',
			'prefix' => '',
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'toolbar' => 'full',
			'media_upload' => 1,
			'tabs' => 'all',
		),
		array (
			'key' => 'field_53ff53bd894a5',
			'label' => 'Améliorations & bricolages',
			'name' => 'ameliorations_&_bricolages',
			'prefix' => '',
			'type' => 'wysiwyg',
			'instructions' => 'Elle marche cette machine, mais ça serait mieux si on ajoutait....',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'toolbar' => 'full',
			'media_upload' => 1,
			'tabs' => 'all',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'outils',
			),
			array (
				'param' => 'post_category',
				'operator' => '==',
				'value' => 'category:machines',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
	),
));

register_field_group(array (
	'key' => 'group_54f5ba993d157',
	'title' => 'Ressources en ligne',
	'fields' => array (
		array (
			'key' => 'field_5423d1656d54e',
			'label' => 'Ressources en ligne',
			'name' => 'ressources_en_ligne',
			'prefix' => '',
			'type' => 'repeater',
			'instructions' => 'Ajouter des liens et des ressources vers d\'autre sites concernant cet outil',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'row_min' => '',
			'row_limit' => '',
			'layout' => 'row',
			'button_label' => 'Ajouter un lien',
			'min' => 0,
			'max' => 0,
			'sub_fields' => array (
				array (
					'key' => 'field_5423d1ab6d54f',
					'label' => 'Titre de la ressource',
					'name' => 'titre_de_la_ressource',
					'prefix' => '',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_5423d1bb6d550',
					'label' => 'Description de la ressource',
					'name' => 'description_de_la_ressource',
					'prefix' => '',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => '',
					'new_lines' => 'br',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_5423d1c76d551',
					'label' => 'Lien vers la ressource',
					'name' => 'lien_vers_la_ressource',
					'prefix' => '',
					'type' => 'text',
					'instructions' => 'Adresse l\'adresse web (http://maressource.ext/)',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'outils',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'tutoriaux',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'projets',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'lexique',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
	),
));

register_field_group(array (
	'key' => 'group_54f5ba998653a',
	'title' => 'Projets',
	'fields' => array (
		array (
			'key' => 'field_53a021787007c',
			'label' => 'Statut',
			'name' => '_statut',
			'prefix' => '',
			'type' => 'radio',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'on' => 'En cours',
				'ended' => 'Terminé',
				'paused' => 'En pause',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'En cours',
			'layout' => 'vertical',
		),
		array (
			'key' => 'field_53a025ebd5185',
			'label' => 'Difficulté',
			'name' => '_difficulte',
			'prefix' => '',
			'type' => 'radio',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'easy' => 'Débutant',
				'normal' => 'Normal',
				'hard' => 'Expert',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => '',
			'layout' => 'vertical',
		),
		array (
			'key' => 'field_53a029f90f000',
			'label' => 'Durée',
			'name' => '_duree',
			'prefix' => '',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'very_sort' => 'Très court (moins d\'un jour)',
				'short' => 'Court (1 jour)',
				'middle_time' => 'Moyen (3 jours)',
				'long' => 'Long (7 jours)',
				'very_long' => 'Très Long (plus d\'une semaine)',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => '',
			'layout' => 'vertical',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'projets',
			),
		),
	),
	'menu_order' => 1,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'permalink',
		1 => 'excerpt',
		2 => 'custom_fields',
		3 => 'discussion',
		4 => 'comments',
		5 => 'revisions',
		6 => 'slug',
		7 => 'format',
		8 => 'categories',
		9 => 'tags',
		10 => 'send-trackbacks',
	),
));

register_field_group(array (
	'key' => 'group_54f5ba99bcc60',
	'title' => 'Tutoriels',
	'fields' => array (
		array (
			'key' => 'field_53a069acc921a',
			'label' => 'Difficulté',
			'name' => '_difficulte',
			'prefix' => '',
			'type' => 'radio',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'easy' => 'Débutant',
				'normal' => 'Normal',
				'hard' => 'Expert',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => '',
			'layout' => 'vertical',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'tutoriaux',
			),
		),
	),
	'menu_order' => 1,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
	),
));

register_field_group(array (
	'key' => 'group_54f5ba9a1fbb1',
	'title' => 'Étapes',
	'fields' => array (
		array (
			'key' => 'field_53a06a1ab9c2c',
			'label' => 'Étapes',
			'name' => '_etapes',
			'prefix' => '',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'row_min' => '',
			'row_limit' => '',
			'layout' => 'row',
			'button_label' => 'Ajouter une étape',
			'min' => 0,
			'max' => 0,
			'sub_fields' => array (
				array (
					'key' => 'field_53a06a36b9c2d',
					'label' => 'Titre de l\'étape',
					'name' => '_titre_de_letape',
					'prefix' => '',
					'type' => 'text',
					'instructions' => 'Par exemple :	Etape 1, réalisation du fichier',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => 150,
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_53a06a64b9c2e',
					'label' => 'Description de l\'étape',
					'name' => '_description_de_letape',
					'prefix' => '',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'toolbar' => 'full',
					'media_upload' => 1,
					'tabs' => 'all',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'tutoriaux',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'projets',
			),
		),
	),
	'menu_order' => 2,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
	),
));

register_field_group(array (
	'key' => 'group_54f5ba9a558bd',
	'title' => 'Ajouter des fichiers',
	'fields' => array (
		array (
			'key' => 'field_53b2ca6bc6ac7',
			'label' => 'Télécharger les sources',
			'name' => '_telecharger_les_sources',
			'prefix' => '',
			'type' => 'repeater',
			'instructions' => 'Ajoutez tous les fichiers sources de votre projet ci dessous',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'row_min' => '',
			'row_limit' => '',
			'layout' => 'table',
			'button_label' => 'Ajouter un fichier',
			'min' => 0,
			'max' => 0,
			'sub_fields' => array (
				array (
					'key' => 'field_53b2ca8cc6ac8',
					'label' => 'Ajouter un fichier',
					'name' => '_ajouter_un_fichier',
					'prefix' => '',
					'type' => 'file',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'library' => 'all',
					'return_format' => 'array',
					'min_size' => 0,
					'max_size' => 0,
					'mime_types' => '',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'projets',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'tutoriaux',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'outils',
			),
		),
	),
	'menu_order' => 3,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
	),
));

register_field_group(array (
	'key' => 'group_54f5ba9a7e3f2',
	'title' => 'Classer ma documentation',
	'fields' => array (
		array (
			'key' => 'field_',
			'label' => '',
			'name' => '',
			'prefix' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_53a0585c4859b',
			'label' => 'Classer ma documentation',
			'name' => 'classer_ma_documentation',
			'prefix' => '',
			'type' => 'taxonomy',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'taxonomy' => 'category',
			'field_type' => 'checkbox',
			'allow_null' => 0,
			'load_save_terms' => 1,
			'return_format' => 'id',
			'multiple' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'projets',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'outils',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'tutoriaux',
			),
		),
	),
	'menu_order' => 10,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
	),
));

register_field_group(array (
	'key' => 'group_54f5ba9aa6f7f',
	'title' => 'Licence contenu',
	'fields' => array (
		array (
			'key' => 'field_543bf8a62f87f',
			'label' => 'La licence du contenu que vous produisez',
			'name' => '',
			'prefix' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'L\'intégralité des textes présentés sur cette plateforme sont sous licence CC0, y compris ceux que vous produisez vous même. Ils entrent dans le domaine publique et sont modifiables, récupérables, réutilisables à volonté, partout dans le monde. Gardez cela en tête et faites attention à ne pas copier/coller des textes dont vous n\'êtes pas l\'auteur.',
			'esc_html' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'lexique',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'tutoriaux',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'outils',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'projets',
			),
		),
	),
	'menu_order' => 30,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
	),
));

endif;

// Création de la page de configuration
// le plugin option page est configuré
if(function_exists('acf_add_options_page')):
	//la page d'option n'existe pas
	acf_add_options_page('Slider options');
if( function_exists('register_field_group') ):

	register_field_group(array (
		'key' => 'group_54fae74dce5df',
		'title' => 'Slider',
		'fields' => array (
			array (
				'key' => 'field_54fb4cd7154dd',
				'label' => 'Afficher le slider',
				'name' => 'afficher_le_slider',
				'prefix' => '',
				'type' => 'checkbox',
				'instructions' => 'Sur quel type de page souhaitez vous l\'affichage du slider ?',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array (
					'home_page' => 'Homepage',
					'page' => 'Pages descriptives',
					'post' => 'Autres pages (tuto, outils, projets...)',
				),
				'default_value' => array (
					'home_page: Homepage' => 'home_page: Homepage',
				),
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_54fb4ef8cc74e',
				'label' => 'Confirguer le slider',
				'name' => 'confirguer_le_slider',
				'prefix' => '',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'min' => '',
				'max' => '',
				'layout' => 'block',
				'button_label' => 'Ajouter une slide',
				'sub_fields' => array (
					array (
						'key' => 'field_54fb4f3fcc750',
						'label' => 'Image à afficher',
						'name' => 'slider_picture',
						'prefix' => '',
						'type' => 'image',
						'instructions' => '',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => 100,
							'class' => 'slider_picture',
							'id' => '',
						),
						'return_format' => 'array',
						'preview_size' => 'thumbnail',
						'library' => 'all',
						'min_width' => 1024,
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => 'jpg',
					),
					array (
						'key' => 'field_54fb5019cc752',
						'label' => 'Contenu du slide',
						'name' => 'slider_content',
						'prefix' => '',
						'type' => 'flexible_content',
						'instructions' => 'Choisissez une ressource sur le site ou créer vous même le contenu du slide',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'button_label' => 'Ajouter le contenu du slide',
						'min' => 1,
						'max' => 1,
						'layouts' => array (
							array (
								'key' => '54fb501e1570e',
								'name' => 'slide_ressource',
								'label' => 'Choisir une ressource',
								'display' => 'table',
								'sub_fields' => array (
									array (
										'key' => 'field_54fb5073cc753',
										'label' => 'Ressource liée',
										'name' => 'ressource_liee',
										'prefix' => '',
										'type' => 'relationship',
										'instructions' => 'Ira automatiquement chercher une courte description de la ressource pour remplir le slide',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array (
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'post_type' => array (
											0 => 'lexique',
											1 => 'tutoriaux',
											2 => 'projets',
											3 => 'outils',
										),
										'taxonomy' => '',
										'filters' => array (
											0 => 'search',
											1 => 'post_type',
											2 => 'taxonomy',
										),
										'elements' => array (
											0 => 'featured_image',
										),
										'max' => 1,
										'return_format' => 'object',
									),
								),
								'min' => '',
								'max' => '',
							),
							array (
								'key' => '54fb50d6cc756',
								'name' => 'slide_content',
								'label' => 'Saisir manuellement le contenu du slide',
								'display' => 'table',
								'sub_fields' => array (
									array (
										'key' => 'field_54fb5103cc757',
										'label' => 'Titre',
										'name' => 'titre',
										'prefix' => '',
										'type' => 'text',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array (
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'default_value' => '',
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'maxlength' => '',
										'readonly' => 0,
										'disabled' => 0,
									),
									array (
										'key' => 'field_54fb5111cc758',
										'label' => 'Courte description',
										'name' => 'courte_description',
										'prefix' => '',
										'type' => 'textarea',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array (
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'default_value' => '',
										'placeholder' => '',
										'maxlength' => 255,
										'rows' => '',
										'new_lines' => 'wpautop',
										'readonly' => 0,
										'disabled' => 0,
									),
									array (
										'key' => 'field_54fb5129cc759',
										'label' => 'Lien',
										'name' => 'lien',
										'prefix' => '',
										'type' => 'url',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array (
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'default_value' => '',
										'placeholder' => '',
									),
								),
								'min' => '',
								'max' => '',
							),
						),
					),
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options-slider-options',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
	));

	endif;
endif;