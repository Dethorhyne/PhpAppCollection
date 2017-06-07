$( document ).ready(function() {
	/*
	#FormInputTitle
	#FormInputDesc
	#FormInputBody
	#FormInputCat
	#FormInputPriv
	
	*/
	$("#SubmitButton").click(function(event)
	{
		var errorsExist = false;
		ClearWarnings();
		var TitleLen = $("#FormInputTitle").val().length;
		var DescLen = $("#FormInputDesc").val().length;
		var BodyLen = $("#FormInputBody").val().length;
		
		var CategoryVal = $('#FormInputCat').find(":selected").attr("value");
		
		if(TitleLen < 5 || TitleLen > 50)
		{
			$("#FormInputTitle").addClass("InputErrorForm");
			$("#FormInputTitle + span").html("Duljina opisa treba biti između 5 i 50 znakova.");
			$("#FormInputTitle + span").addClass("InputErrorMessage");
			var errorsExist = true;
		}
		if(DescLen < 10 || DescLen > 100)
		{
			$("#FormInputDesc").addClass("InputErrorForm");
			$("#FormInputDesc + span").html("Duljina naslova treba biti između 10 i 100 znakova.");
			$("#FormInputDesc + span").addClass("InputErrorMessage");
			var errorsExist = true;
		}
		if(BodyLen < 10 || BodyLen > 1000)
		{
			$("#FormInputBody").addClass("InputErrorForm");
			$("#FormInputBody + span").html("Duljina tijela treba biti između 10 i 1000 znakova.");
			$("#FormInputBody + span").addClass("InputErrorMessage");
			var errorsExist = true;
		}
		if(CategoryVal == -1)
		{
			$("#FormInputCat").addClass("InputErrorForm");
			$("#FormInputCat + span").html("Molimo odaberite ispravnu kategoriju.");
			$("#FormInputCat + span").addClass("InputErrorMessage");
			var errorsExist = true;
		}
		
		if(errorsExist)
		{
			event.preventDefault(); // cancel default behavior
			return;
		}
		
		if (document.getElementById("FormInputPriv").checked==true)
		{
			if(confirm('Jeste li sigurni da ovu vijest želite objaviti kao privatnu?'))
			{
				
			}
			else
			{
				event.preventDefault();	
			}
		}
	});
});

function ClearWarnings()
{
	$("#FormInputTitle").removeClass("InputErrorForm");
	$("#FormInputTitle + span").removeClass("InputErrorMessage");
	$("#FormInputTitle + span").html("");
	$("#FormInputDesc").removeClass("InputErrorForm");
	$("#FormInputDesc + span").removeClass("InputErrorMessage");
	$("#FormInputDesc + span").html("");
	$("#FormInputBody").removeClass("InputErrorForm");
	$("#FormInputBody + span").removeClass("InputErrorMessage");
	$("#FormInputBody + span").html("");
	$("#FormInputCat").removeClass("InputErrorForm");
	$("#FormInputCat + span").removeClass("InputErrorMessage");
	$("#FormInputCat + span").html("");
}