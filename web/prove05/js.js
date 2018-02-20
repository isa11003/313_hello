function validateCreateUser(){
	var scrname = document.getElementById('scrname').value;
	var usrname = document.getElementById('usrname').value;
	var password = document.getElementById('pass').value;
	var passwordV = document.getElementById('passV').value;

	var hasScreenName = false;
	var hasUserName = false;
	var hasPassword = false;
	var passwordsMatch = false;
	
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
	
	if (password != passwordV)
	{	
		alert("Passwords don't match");
		return false;
	}
	else{
	
		passwordsMatch = true;
	}
	
	if ( hasPassword && hasScreenName && hasUserName && passwordsMatch)
		return true;
	else
		return false;
}

function validatePost(){
	var text = document.getElementById("messagePost").value;
	
	if (text == '')
	{
		alert("Cannot make an empty post");
		return false;
	}
	else
		return true;
}

function validateLogin(){
	
	var usrname = document.getElementById('usrname').value;
	var password = document.getElementById('pass').value;

	
	var hasUserName = false;
	var hasPassword = false;
	
	
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
	
	if ( hasPassword && hasUserName)
		return true;
	else
		return false;
}