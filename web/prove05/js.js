function validateCreateUser(){
	var scrname = document.getElementById('scrname').value;
	var usrname = document.getElementById('usrname').value;
	var password = document.getElementById('pass').value;

	var hasScreenName = false;
	var hasUserName = false;
	var hasPassword = false;
	
	if ( scrname == '')
	{
		alert("screen name required");
		return false;
	}
	else
	{
		hasScreenName = true;
	}
	
	if ( usrname == '')
	{
		alert("Username required");
		return false;
	}
	else
	{
		hasUserName = true;
	}
	
	if ( password == '')
	{
		alert("password required");
		return false;
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