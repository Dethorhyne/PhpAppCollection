<?php
function lang($phrase)
{
  static $lang = array (
'l_logout' => 'Logout',
'l_index' => 'Index',
'l_forum' => 'Forum',
'l_error' => 'Error',
'l_login' => 'Login',
'l_mustLogin' => 'You must be logged in',
'l_register' => 'Register',
'l_numPost' => 'Post count',
'l_numComment' =>'Comment count',
'l_addPost' => 'Add post',
'l_addComment' => 'Add comment',
'l_post' => 'Post',
'l_username' => 'Username',
'l_password' => 'Password',
'l_repeatPassword' => 'Repeat password',
'l_allowVisibleEmail' => 'Let other see your mail',
'l_loginSuccess' => 'Login successful',
'l_logoutSuccess' => 'Logout successful',
'l_usertype' => 'Usertype',
'l_passDontMatch' => 'Passwords do not match',
'l_alreadyLoggedIn' => 'You are already logged in',
'l_registerSuccess' => 'Registration successful',
'l_userDoesntExist' => 'This user does not exist',
'l_dateRegistered' => 'Registration date'
);
return $lang[$phrase];
}
?>