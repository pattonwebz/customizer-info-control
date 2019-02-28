# PattonWebz Customizer Info Control
A simple control for using when you want to output a small informational section within the customizer.

## Using the class

```
// The control must go in a defined section.
$wp_customize->add_section(
	'a_section',
	array(
		'title' => __( 'A Section', 'pattonwebz' ),
	)
);

// It should also have a setting defined with a custom setting 'type'.
// This can be any unique string you want - you won't be attaching custom actions to it.
$wp_customize->add_setting(
	'an_info_control',
	array(
		'type' => 'display_only',
	)
);

// Add the control with it's title and html content.
$wp_customize->add_control(
	new \PattonWebz\Customizer\Control\InfoControl(
		$wp_customize,
		'an_info_control',
		array(
			'section' => 'a_section',
			'title'   => __( 'Custom Info Control', 'pattonwebz' ),
			'html'    => __( 'This control has ability to output a title and custom html content.', 'pattonwebz' ),
		)
	)
);
```
# Licence Information
This package is licensed under GNU GPLv2 or later licence.

Copyright 2019 © William Patton.
