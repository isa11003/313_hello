function validateCreateUser(){
	var scrname = getElementById('scrname').value;
	var usrname = getElementById('usrname').value;
	var password = getElementById('pass').value;

	var hasScreenName = false;
	var hasUserName = false;
	var hasPassword = false;
	
	if ( scrname == '')
	{
		alert("screen name required");
	}
	else
	{
		hasScreenName = true;
	}
	
	if ( usrname == '')
	{
		alert("Username required");
	}
	else
	{
		hasUserName = true;
	}
	
	if ( password == '')
	{
		alert("password required");
	}
	else
	{
		hasPassword = true;
	}
	
	if ( hasPassword && hasScreenName && hasUserName)
		return true;
	else
		return false;
}