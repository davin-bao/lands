<?php

return array(

	'does_not_exist'    => 'User does not exist.',
	'password_does_not_match' => 'The passwords provided do not match.',

	'create' => array(
		'error'   => 'User was not created, please try again.',
		'success' => 'User created successfully.',
        'help_block'    => 'Select a group to assign to the user, remember that a user takes on the permissions of the group they are assigned.'
	),

    'edit' => array(
        'impossible' => 'You cannot edit yourself.',
        'error'      => 'There was an issue editing the user. Please try again.',
        'success'    => 'The user was edited successfully.'
    ),

    'delete' => array(
        'message' => 'Delete this User ?',
        'impossible' => 'You cannot delete yourself.',
        'error'      => 'There was an issue deleting the user. Please try again.',
        'success'    => 'The user was deleted successfully.'
    )

);
