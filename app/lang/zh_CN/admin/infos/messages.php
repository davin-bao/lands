<?php

return array(

	'already_exists'    => 'News already exists!',
	'does_not_exist'    => 'News does not exist.',
	'login_required'    => 'The login field is required',
	'password_required' => 'The password is required.',
	'password_does_not_match' => 'The passwords provided do not match.',

	'create' => array(
		'error'   => 'News was not created, please try again.',
		'success' => 'News created successfully.',
        'help_block'    => 'Select a group to assign to the user, remember that a user takes on the permissions of the group they are assigned.'
	),

    'update' => array(
        'error'   => 'News was not updated, please try again',
        'success' => 'News updated successfully.'
    ),

    'delete' => array(
        'message' => 'Delete this News ?',
        'error'      => 'There was an issue deleting the news. Please try again.',
        'success'    => 'The news was deleted successfully.'
    ),

  'validation' => array(
    'required' => ' :attribute 不能为空.',
  )

);
