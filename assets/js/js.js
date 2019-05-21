//Start of function validating the input email.
function validateIndexEmail(inputText) 
{
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; //A variable is created which contains all the necessary features an email must contain.
	if(mailformat.test(inputText.value))
	{
		validateIndexText();
	}
	else //If email is not acceptable it raises an error and displays it to the user.
	{
		alert("You have entered an invalid email address!");
		return false;
	}
}
//End of function validating the input email from Indexsite.


//Start of function validating the input email from Registersite.
function validateRegisterEmail(inputText) 
{
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; //A variable is created which contains all the necessary features an email must contain.
	if(mailformat.test(inputText.value))
	{
		validateRegisterText();
	}
	else //If email is not acceptable it raises an error and displays it to the user.
	{
		alert("You have entered an invalid email address!");
		return false;
	}
}
//End of function validating the input email.



//Start of function validating the rest of the inputs.
function validateIndexText() 
{
	var comment = document.forms["usrForm"]["comment"].value; //create new variable for the "comment"-input from form "usrForm" (Index.php)
	var name = document.forms["usrForm"]["usrname"].value; //create new variable for the "usrname"-input from form "usrForm" (Index.php)
	if (name == "" || onlySpaces(name)==true)
	{
		alert("You must enter a name")
		return false;
	}
	else if (comment == "" || onlySpaces(comment)==true)
	{
		alert("You must enter a name")
		return false;
	}
	else 
	{
		alert("Tack för din kommentar!")
	}
}

function validateRegisterText() 
{
	var regName = document.regForm.reg_usrname.value; //create new variable for the "reg_usrname"-input from form "regForm" (Register.php)
	var regPassword = document.regForm.reg_password.value; //create new variable for the "usrname"-input from form "usrForm" (Index.php)
	
	if (regName == "" || onlySpaces(regName)==true)
	{
		alert("You must enter a name")
		return false;
	}
	else if (regPassword == "" || onlySpaces(regPassword)==true)
	{
		alert("You must enter a password")
		return false;
	}
	else 
	{
		alert("Tack för din kommentar!")
	}
}

function onlySpaces(str)
{
	for (i = 0; i < str.length; i++) 
	{	if (str.charAt(i) != ' ')
		{
			return false;
		}
	}
	return true;
}

