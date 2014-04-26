<?php

return array(

	'already_exists'    => 'Business already exists!',
	'does_not_exist'    => 'Business does not exist.',
	'login_required'    => 'The login field is required',
	'password_required' => 'The password is required.',
	'password_does_not_match' => 'The passwords provided do not match.',

	'create' => array(
		'error'   => 'Business was not created, please try again.',
		'success' => 'Business created successfully.',
        'help_block'    => 'Select a group to assign to the user, remember that a user takes on the permissions of the group they are assigned.'
	),

    'update' => array(
        'error'   => 'Business was not updated, please try again',
        'success' => 'Business updated successfully.'
    ),

    'delete' => array(
        'message' => 'Delete this business ?',
        'error'      => 'There was an issue deleting the business. Please try again.',
        'success'    => 'The business was deleted successfully.'
    ),

  'validation' => array(
    'required' => ' :attribute 不能为空.',
  )

);
