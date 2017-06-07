var TownOverlayActive = false;
$(document).ready(function() {
	
	
    var HorCenter = -4096 / 2 + $("main").width() / 2;
    var VerCenter = -4096 / 2 + $("main").height() / 2;

	$( "#map" ).animate({ 'left': HorCenter + 'px', 'top': VerCenter + 'px' }, 0);



    $("#map").draggable({
	  stop: function( event, ui ) {

		var p = $( "#map" );
		var posLeft = p.offset().left - p.parent().offset().left;
		var posTop = p.offset().top - p.parent().offset().top;
		var dimensionx = p.width();
		var dimensiony = p.height();
		var maxnegy = -dimensiony + document.documentElement.clientHeight;
		var maxnegx = -dimensionx + document.documentElement.clientWidth;


		if (posLeft > 0 && posTop > 0)
		{
		    p.animate({ 'left': 0 + 'px', 'top': 0 + 'px' }, 100);
		    return;
		}
		if (posLeft < maxnegx && posTop > 0) {
		    p.animate({ 'left': maxnegx + 'px', 'top': 0 + 'px' }, 100);
		    return;
		}
		if (posLeft > 0 && posTop < maxnegy) {
		    p.animate({ 'left': 0 + 'px', 'top': maxnegy + 'px' }, 100);
		    return;
		}
		if (posLeft < maxnegx && posTop < maxnegy) {
		    p.animate({ 'left': maxnegx + 'px', 'top': maxnegy + 'px' }, 100);
		    return;
		}
		if (posTop > 0)
		{
			p.animate({ 'top': 0 + 'px'}, 100);
		}
		if (posLeft > 0)
		{
			p.animate({ 'left': 0 + 'px'}, 100);
		}
		if (posTop < maxnegy) {
		    p.animate({ 'top': maxnegy + 'px' }, 100);
		}
		if (posLeft < maxnegx) {
		    p.animate({ 'left': maxnegx + 'px' }, 100);
		}
	  }
	}); 
});

$(document).on("click", ".TownName", function(){
	$( "#map" ).addClass("mapBlur");
	$("#TownOverlay").addClass("OverlayVisible");
	TownOverlayActive = true;
	var url = 'town.php?Town='+$(this).text();
	url = url.replace(RegExp(" ", "g"), "%20");
	$('#TownInfo').load(url, function() {
		$('#TownInfo').animate({ 'top': 5 + '%' }, 100);
	});
});

$(document).keyup(function(e) {
     if (e.keyCode == 27) {
		 if(TownOverlayActive)
		 {
			$( "#map" ).removeClass("mapBlur");
			$("#TownOverlay").removeClass("OverlayVisible");
			TownOverlayActive = false;
		 }
    }
});

$(document).on("click", "#CloseOverview", function(){
	$('#TownInfo').animate({ 'top': -80 + '%' }, 100);
	$( "#map" ).removeClass("mapBlur");
	$("#TownOverlay").removeClass("OverlayVisible");
	$('#TownInfo').empty();
	TownOverlayActive = false;
});


function spawnLoot(self, building)
{
	
	var dataKey = $('.'+self).data('lootboxid');
	
	var lootbox = $('code.'+dataKey);
	
	var url = 'loot.php?Building='+building;
	url = url.replace(RegExp(" ", "g"), "%20");
	
	
	lootbox.load(url, function() {});
}