<?php

return array(

	'already_exists'    => 'Recruit already exists!',
	'does_not_exist'    => 'Recruit does not exist.',
	'login_required'    => 'The login field is required',
	'password_required' => 'The password is required.',
	'password_does_not_match' => 'The passwords provided do not match.',

	'create' => array(
		'error'   => 'Recruit was not created, please try again.',
		'success' => 'Recruit created successfully.',
        'help_block'    => 'Select a group to assign to the Recruit, remember that a Recruit takes on the permissions of the group they are assigned.'
	),

    'update' => array(
        'error'   => 'Recruit was not updated, please try again',
        'success' => 'Recruit updated successfully.'
    ),

    'delete' => array(
        'message' => 'Delete this Recruit ?',
        'error'      => 'There was an issue deleting the recruit. Please try again.',
        'success'    => 'The recruit was deleted successfully.'
    ),

  'validation' => array(
    'required' => ' :attribute is empty.',
    'numeric' => ' :attribute must be a number.',
  )

);
