// JavaScript Document
function validate()
{
var nn=document.getElementById('new').value;
var nnn=document.getElementById('renew').value;
if(nn==nnn)
{
return true;
}
else
{
alert('Password ntizihura. emeza neza');
renew.focus();
renew.style="border-color:red;";
return false;
}
}