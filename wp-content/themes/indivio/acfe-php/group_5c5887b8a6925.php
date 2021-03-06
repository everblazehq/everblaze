<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5c5887b8a6925',
	'title' => 'Block: Info',
	'fields' => array(
		array(
			'key' => 'field_5d4831cc287f7',
			'label' => 'Info Blocks',
			'name' => 'info_blocks',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Add block',
			'sub_fields' => array(
				array(
					'key' => 'field_5d4831f9287f8',
					'label' => 'Type',
					'name' => 'block_info_type',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '40',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'default' => 'Default',
						'country' => 'Country',
						'faceit' => 'FaceIt',
					),
					'default_value' => array(
						0 => 'default',
					),
					'allow_null' => 0,
					'multiple' => 0,
					'ui' => 0,
					'return_format' => 'value',
					'ajax' => 0,
					'placeholder' => '',
				),
				array(
					'key' => 'field_5d4832a1287f9',
					'label' => 'Content',
					'name' => 'block_info_content',
					'type' => 'group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '60',
						'class' => '',
						'id' => '',
					),
					'layout' => 'block',
					'sub_fields' => array(
						array(
							'key' => 'field_5d4832e7287fa',
							'label' => 'Title',
							'name' => 'title',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5d483305287fb',
							'label' => 'Text',
							'name' => 'text',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5d4831f9287f8',
										'operator' => '==',
										'value' => 'default',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
						array(
							'key' => 'field_5d483324287fc',
							'label' => 'Country',
							'name' => 'country',
							'type' => 'country',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5d4831f9287f8',
										'operator' => '==',
										'value' => 'country',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'AF' => 'Afghanistan',
								'AX' => 'Åland Islands',
								'AL' => 'Albania',
								'DZ' => 'Algeria',
								'AS' => 'American Samoa',
								'AD' => 'Andorra',
								'AO' => 'Angola',
								'AI' => 'Anguilla',
								'AQ' => 'Antarctica',
								'AG' => 'Antigua & Barbuda',
								'AR' => 'Argentina',
								'AM' => 'Armenia',
								'AW' => 'Aruba',
								'AC' => 'Ascension Island',
								'AU' => 'Australia',
								'AT' => 'Austria',
								'AZ' => 'Azerbaijan',
								'BS' => 'Bahamas',
								'BH' => 'Bahrain',
								'BD' => 'Bangladesh',
								'BB' => 'Barbados',
								'BY' => 'Belarus',
								'BE' => 'Belgium',
								'BZ' => 'Belize',
								'BJ' => 'Benin',
								'BM' => 'Bermuda',
								'BT' => 'Bhutan',
								'BO' => 'Bolivia',
								'BA' => 'Bosnia & Herzegovina',
								'BW' => 'Botswana',
								'BR' => 'Brazil',
								'IO' => 'British Indian Ocean Territory',
								'VG' => 'British Virgin Islands',
								'BN' => 'Brunei',
								'BG' => 'Bulgaria',
								'BF' => 'Burkina Faso',
								'BI' => 'Burundi',
								'KH' => 'Cambodia',
								'CM' => 'Cameroon',
								'CA' => 'Canada',
								'IC' => 'Canary Islands',
								'CV' => 'Cape Verde',
								'BQ' => 'Caribbean Netherlands',
								'KY' => 'Cayman Islands',
								'CF' => 'Central African Republic',
								'EA' => 'Ceuta & Melilla',
								'TD' => 'Chad',
								'CL' => 'Chile',
								'CN' => 'China',
								'CX' => 'Christmas Island',
								'CC' => 'Cocos (Keeling) Islands',
								'CO' => 'Colombia',
								'KM' => 'Comoros',
								'CG' => 'Congo - Brazzaville',
								'CD' => 'Congo - Kinshasa',
								'CK' => 'Cook Islands',
								'CR' => 'Costa Rica',
								'CI' => 'Côte d’Ivoire',
								'HR' => 'Croatia',
								'CU' => 'Cuba',
								'CW' => 'Curaçao',
								'CY' => 'Cyprus',
								'CZ' => 'Czechia',
								'DK' => 'Denmark',
								'DG' => 'Diego Garcia',
								'DJ' => 'Djibouti',
								'DM' => 'Dominica',
								'DO' => 'Dominican Republic',
								'EC' => 'Ecuador',
								'EG' => 'Egypt',
								'SV' => 'El Salvador',
								'GQ' => 'Equatorial Guinea',
								'ER' => 'Eritrea',
								'EE' => 'Estonia',
								'ET' => 'Ethiopia',
								'EZ' => 'Eurozone',
								'FK' => 'Falkland Islands',
								'FO' => 'Faroe Islands',
								'FJ' => 'Fiji',
								'FI' => 'Finland',
								'FR' => 'France',
								'GF' => 'French Guiana',
								'PF' => 'French Polynesia',
								'TF' => 'French Southern Territories',
								'GA' => 'Gabon',
								'GM' => 'Gambia',
								'GE' => 'Georgia',
								'DE' => 'Germany',
								'GH' => 'Ghana',
								'GI' => 'Gibraltar',
								'GR' => 'Greece',
								'GL' => 'Greenland',
								'GD' => 'Grenada',
								'GP' => 'Guadeloupe',
								'GU' => 'Guam',
								'GT' => 'Guatemala',
								'GG' => 'Guernsey',
								'GN' => 'Guinea',
								'GW' => 'Guinea-Bissau',
								'GY' => 'Guyana',
								'HT' => 'Haiti',
								'HN' => 'Honduras',
								'HK' => 'Hong Kong SAR China',
								'HU' => 'Hungary',
								'IS' => 'Iceland',
								'IN' => 'India',
								'ID' => 'Indonesia',
								'IR' => 'Iran',
								'IQ' => 'Iraq',
								'IE' => 'Ireland',
								'IM' => 'Isle of Man',
								'IL' => 'Israel',
								'IT' => 'Italy',
								'JM' => 'Jamaica',
								'JP' => 'Japan',
								'JE' => 'Jersey',
								'JO' => 'Jordan',
								'KZ' => 'Kazakhstan',
								'KE' => 'Kenya',
								'KI' => 'Kiribati',
								'XK' => 'Kosovo',
								'KW' => 'Kuwait',
								'KG' => 'Kyrgyzstan',
								'LA' => 'Laos',
								'LV' => 'Latvia',
								'LB' => 'Lebanon',
								'LS' => 'Lesotho',
								'LR' => 'Liberia',
								'LY' => 'Libya',
								'LI' => 'Liechtenstein',
								'LT' => 'Lithuania',
								'LU' => 'Luxembourg',
								'MO' => 'Macau SAR China',
								'MK' => 'Macedonia',
								'MG' => 'Madagascar',
								'MW' => 'Malawi',
								'MY' => 'Malaysia',
								'MV' => 'Maldives',
								'ML' => 'Mali',
								'MT' => 'Malta',
								'MH' => 'Marshall Islands',
								'MQ' => 'Martinique',
								'MR' => 'Mauritania',
								'MU' => 'Mauritius',
								'YT' => 'Mayotte',
								'MX' => 'Mexico',
								'FM' => 'Micronesia',
								'MD' => 'Moldova',
								'MC' => 'Monaco',
								'MN' => 'Mongolia',
								'ME' => 'Montenegro',
								'MS' => 'Montserrat',
								'MA' => 'Morocco',
								'MZ' => 'Mozambique',
								'MM' => 'Myanmar (Burma)',
								'NA' => 'Namibia',
								'NR' => 'Nauru',
								'NP' => 'Nepal',
								'NL' => 'Netherlands',
								'NC' => 'New Caledonia',
								'NZ' => 'New Zealand',
								'NI' => 'Nicaragua',
								'NE' => 'Niger',
								'NG' => 'Nigeria',
								'NU' => 'Niue',
								'NF' => 'Norfolk Island',
								'KP' => 'North Korea',
								'MP' => 'Northern Mariana Islands',
								'NO' => 'Norway',
								'OM' => 'Oman',
								'PK' => 'Pakistan',
								'PW' => 'Palau',
								'PS' => 'Palestinian Territories',
								'PA' => 'Panama',
								'PG' => 'Papua New Guinea',
								'PY' => 'Paraguay',
								'PE' => 'Peru',
								'PH' => 'Philippines',
								'PN' => 'Pitcairn Islands',
								'PL' => 'Poland',
								'PT' => 'Portugal',
								'PR' => 'Puerto Rico',
								'QA' => 'Qatar',
								'RE' => 'Réunion',
								'RO' => 'Romania',
								'RU' => 'Russia',
								'RW' => 'Rwanda',
								'WS' => 'Samoa',
								'SM' => 'San Marino',
								'ST' => 'São Tomé & Príncipe',
								'SA' => 'Saudi Arabia',
								'SN' => 'Senegal',
								'RS' => 'Serbia',
								'SC' => 'Seychelles',
								'SL' => 'Sierra Leone',
								'SG' => 'Singapore',
								'SX' => 'Sint Maarten',
								'SK' => 'Slovakia',
								'SI' => 'Slovenia',
								'SB' => 'Solomon Islands',
								'SO' => 'Somalia',
								'ZA' => 'South Africa',
								'GS' => 'South Georgia & South Sandwich Islands',
								'KR' => 'South Korea',
								'SS' => 'South Sudan',
								'ES' => 'Spain',
								'LK' => 'Sri Lanka',
								'BL' => 'St. Barthélemy',
								'SH' => 'St. Helena',
								'KN' => 'St. Kitts & Nevis',
								'LC' => 'St. Lucia',
								'MF' => 'St. Martin',
								'PM' => 'St. Pierre & Miquelon',
								'VC' => 'St. Vincent & Grenadines',
								'SD' => 'Sudan',
								'SR' => 'Suriname',
								'SJ' => 'Svalbard & Jan Mayen',
								'SZ' => 'Swaziland',
								'SE' => 'Sweden',
								'CH' => 'Switzerland',
								'SY' => 'Syria',
								'TW' => 'Taiwan',
								'TJ' => 'Tajikistan',
								'TZ' => 'Tanzania',
								'TH' => 'Thailand',
								'TL' => 'Timor-Leste',
								'TG' => 'Togo',
								'TK' => 'Tokelau',
								'TO' => 'Tonga',
								'TT' => 'Trinidad & Tobago',
								'TA' => 'Tristan da Cunha',
								'TN' => 'Tunisia',
								'TR' => 'Turkey',
								'TM' => 'Turkmenistan',
								'TC' => 'Turks & Caicos Islands',
								'TV' => 'Tuvalu',
								'UM' => 'U.S. Outlying Islands',
								'VI' => 'U.S. Virgin Islands',
								'UG' => 'Uganda',
								'UA' => 'Ukraine',
								'AE' => 'United Arab Emirates',
								'GB' => 'United Kingdom',
								'UN' => 'United Nations',
								'US' => 'United States',
								'UY' => 'Uruguay',
								'UZ' => 'Uzbekistan',
								'VU' => 'Vanuatu',
								'VA' => 'Vatican City',
								'VE' => 'Venezuela',
								'VN' => 'Vietnam',
								'WF' => 'Wallis & Futuna',
								'EH' => 'Western Sahara',
								'YE' => 'Yemen',
								'ZM' => 'Zambia',
								'ZW' => 'Zimbabwe',
							),
							'placeholder' => 'Select a country',
							'default_value' => array(
								0 => 'NL',
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 1,
							'return_format' => 'array',
						),
						array(
							'key' => 'field_5d483377287fd',
							'label' => 'FaceIt',
							'name' => 'faceit',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_5d4831f9287f8',
										'operator' => '==',
										'value' => 'faceit',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'matches' => 'Matches',
								'win_rate' => 'Win Rate %',
								'win_streak' => 'Longest Win Streak',
								'recent_results' => 'Recent Results',
								'avg_kd_ratio' => 'Average K/D Ratio',
								'avg_hs' => 'Average Headshots %',
							),
							'default_value' => array(
							),
							'allow_null' => 0,
							'multiple' => 0,
							'ui' => 0,
							'return_format' => 'value',
							'ajax' => 0,
							'placeholder' => '',
						),
					),
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/block-info',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
	'acfe_display_title' => '',
	'acfe_autosync' => array(
		0 => 'php',
		1 => 'json',
	),
	'acfe_permissions' => '',
	'acfe_form' => 0,
	'acfe_meta' => '',
	'acfe_note' => '',
	'modified' => 1571835653,
));

endif;