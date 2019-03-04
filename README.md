# PattonWebz Customizer Info Control
A simple control for using when you want to output a small informational section within the customizer.

## Using the class

The control works just like any other custom class control in that you register a setting for it and the control and place it inside a section.

The class looks at 2 specific keys that you pass into the args array when registering the control. The `title` key and the `html` key.

The passed in value for `title` is wrapped inside an `<h1>` tag and the `html` is wrapped inside of a `<p>` tag at output time.

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

You can optionally override the wrappers added by passing in an `'override_wrapper' => 'true'` argument. This will output just raw `html` so you need to include your own wrappers and any title you may want directly in the html string.

# Licence Information
This package is licensed under GNU GPLv2 or later licence.

Copyright 2019 © William Patton.
