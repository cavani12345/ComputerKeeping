// JavaScript Document
function validate()
{
var a=document.getElementById('search').value;
if(a=='')
{
alert('Nimushyiremo icyo mushaka gushakisha');
search.focus();
search.style="border-color:red;";
return false;
}
else
{
return true;
}
}
function keepgivesearch()
{
var a=document.getElementById('keepgive').value;
	if(a=='')
	{
    alert('Nimwuzuze akazu mbere ya byose');
	keepgive.focus();
	keepgive.style="border-color:red;";
	return false;
	}
	else
	{
		return true;
	}
}