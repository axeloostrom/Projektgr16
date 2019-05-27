//Start of function validating the input email from Registersite.
function validateRegisterEmail(inputText) 
{
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; //A variable is created which contains all the necessary features an email must contain.
	if(mailformat.test(inputText.value))
	{
		validateRegisterText(); //If succesful, calls another jsfunction.
	}
	else //If email is not acceptable it raises an error and displays it to the user.
	{
		alert("You have entered an invalid email address!");
		return false;
	}
}
//End of function validating the input email.

//Start of function validating the login email from Loginsite.
function validateLoginEmail(inputText) 
{
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; //A variable is created which contains all the necessary features an email must contain.
	if(mailformat.test(inputText.value))
	{
		validateLoginInput(); //If succesful, calls another jsfunction.
	}
	else //If email is not acceptable it raises an error and displays it to the user.
	{
		alert("You have entered an invalid email address!");
		return false;
	}
}
//End of function validating the input email.

//Start of function validating the comment from the indexsite.
function validateIndexComment(input) 
{
	if (input.value == "" || onlySpaces(input.value)==true)
	{
		alert("You must enter a valid input!")
		return false;
	}
		alert("Thank you!")
		return true;
}
//End of function validating the comment email.

//Start of function validating the password from the registersite.
function validateRegisterText() 
{
	var regPassword = document.forms["regForm"]["reg_password"].value; //Creates new variable for the "usrname"-input from form "usrForm" (Index.php)
	if (regPassword.length <8  || onlySpaces(regPassword)==true)
	{
		alert("Your password needs to be at least 8 digits, not including spaces.")
		return false;
	}
	else 
	{
		alert("Input Valid. We will now check whether the email is available.")
	}
}
//End of function validating the input email.

//Start of function validating the password from the loginsite.
function validateLoginInput() 
{
	var loginPassword = document.forms["loginForm"]["login_password"].value; //Creates a new variable for the "usrname"-input from form "loginForm" (Login.php)
	if (loginPassword == "" || onlySpaces(loginPassword)==true)
	{
		alert("You must enter a password")
		return false;
	}
	else 
	{
		alert("Thank you. We will now check if your email and password is correct.")
	}
}
//End of function validating the password from the loginsite.
//End of function checking for spaces. If strings just contains spaces it returns true, else false.
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
