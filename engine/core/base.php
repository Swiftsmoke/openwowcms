<?php
/************************************************************************
*                           engine/core/base.php
*                            -------------------
* 	 Copyright (C) 2011 - 2012
*
* 	 This package is free software: you can redistribute it and/or modify
*    it under the terms of the GNU General Public License as published by
*    the Free Software Foundation, either version 3 of the License, or
*    (at your option) any later version.
*
* 	 Updated: $Date 2012/12/26 10:53 $
*
************************************************************************/
interface BaseUser {
	function CoreSQL($id);
	function return_expansion($id);
	function print_Char_Dropdown($accountguid);
	function getUserGM($userid);
	function getUserInfo($username,$userid=false);
	function confirmUserPass($username, $password);
	function usernameTaken($username);
	function usernameBanned($username);
	function convertPass($username,$passwordraw);
	function updatePass($username,$password);
	function updateGMlevel($userid,$value,$realm=false);
	function addNewUser($username, $password, $email);
	function addIngameBan($userguid);
	function removeIngameBans($userguid);
	function sendmail($playername, $playerguid, $subject, $item, $realmid=0, $stack=1, $money=0, $externaltext=false);
}
?>