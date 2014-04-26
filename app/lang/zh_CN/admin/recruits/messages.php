<?php

return array(

	'already_exists'    => 'User already exists!',
	'does_not_exist'    => 'User does not exist.',
	'login_required'    => 'The login field is required',
	'password_required' => 'The password is required.',
	'password_does_not_match' => 'The passwords provided do not match.',

	'create' => array(
		'error'   => 'User was not created, please try again.',
		'success' => 'User created successfully.',
        'help_block'    => 'Select a group to assign to the user, remember that a user takes on the permissions of the group they are assigned.'
	),

    'update' => array(
        'error'   => 'Role was not updated, please try again',
        'success' => 'Role updated successfully.'
    ),

    'delete' => array(
        'message' => 'Delete this Recruit ?',
        'error'      => 'There was an issue deleting the recruit. Please try again.',
        'success'    => 'The recruit was deleted successfully.'
    ),

  'validation' => array(
    'required' => ' :attribute 不能为空.',
    'numeric' => ' :attribute 必须为数字.',
  )

);
