<script type="text/javascript">

function MaxLengthTextarea(objettextarea,maxlength)
{	
	var test;
	test = maxlength - objettextarea.value.length;
	document.getElementById("test").value = test;
	
	if (objettextarea.value.length > maxlength)
	{
		objettextarea.value = objettextarea.value.substring(0, maxlength);
    }
}

function EnterFunction()
{
	if (event.keyCode == 13)
	{
		document.getElementById("send").click();
	}
}

function testCara(max)
{
	document.getElementById("test").value = max;
}
		
</script>