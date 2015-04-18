$(function(){
	$(document).pjax('a[data-pjax]', '#pjax-container', { "fragment": "#pjax-container" });
	$('#pjax-container').on('click', 'a.play', function(ev){
		ev.preventDefault();
		var mp3_url = $(this).data('audio');

		if ( $('.sm2-bar-ui').hasClass('playing') ){
			window.sm2BarPlayers[0].actions.stop();
			$('.sm2-bar-ui li.selected').parent().append('<li><a href="'+mp3_url+'">'+$(this).data('title')+'</a></li>');
			window.sm2BarPlayers[0].actions.next();
		} else {
			$('.sm2-bar-ui li a').attr("href", mp3_url).text( $(this).data('title') );
			$('.sm2-inline-status ul.sm2-playlist-bd li').text( $(this).data('title') );
			$('.sm2-bar-ui').removeClass('hidden');
			window.sm2BarPlayers[0].actions.play();
		}

	});
	
});

