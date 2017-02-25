$(document).ready(function ()
{
	$('#tags').tagsInput(
	{
		autocomplete_url:'http://myserever.com/api/autocomplete'
		autocomplete:{selectFirst:true,width:'100px',autoFill:true}

	})
}