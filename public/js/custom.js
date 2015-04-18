$(function(){
	//pjax
	$(document).pjax('a[data-pjax]', '#pjax-container', { "fragment": "#pjax-container" });

	//play file using soundmanager2 bar-ui player
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

	//leanmodal
	$("a[rel*=leanModal]").leanModal();
	$('#new-podcast').ajaxForm({
		beforeSubmit: function(arr, $form, options){
			$('#message').addClass('hidden');
			$('input[type=submit]').attr('disabled', 'disabled');
			if( !$('#link').val() ){
				$('input[type=submit]').removeAttr('disabled');
				return false;
			}
		},
		success: function(response){
			$('#link').val('');
			$('input[type=submit]').removeAttr('disabled');
			if (response.status == 1){	
				$('#message').text('Podcast succesfully added! This modal is closing...').addClass('success');
				setTimeout(function(){ $('#lean_overlay').trigger('click'); }, 1000);
			} else {
				$('#message').text('We had a problem. Please try again.').addClass('error');
				$('#link').focus();
			}

			$('#message').removeClass('hidden');
			
		},
		dataType: "json"
	});
	$('#newform').on('open.leanModal', function(e) { $('#link').focus(); });
	
});

