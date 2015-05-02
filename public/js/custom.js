$(function(){
	//pjax
	$(document).pjax('a[data-pjax]', '#pjax-container', { "fragment": "#pjax-container" });

	//play file using mediaelementjs player
	$('#pjax-container').on('click', 'a.play', function(ev){
		ev.preventDefault();
		var mp3_url = $(this).data('audio');
		if ($('mejs-audio').length){
			$('.player audio').player.setSrc(mp3_url);
			$('.player audio').player.pause();
			$('.player audio').player.play();
		} else {
			$('.player audio').attr('src', mp3_url).mediaelementplayer({
				audioWidth: $(document).width(),
				features: ['playpause','loop','current','progress','duration','volume', 'fasterslower'],
				success: function(media, node, player) {
					media.addEventListener('loadeddata', function() {
			            console.log('addEventListener - loadeddata')  
			            player.play();          
			        }, false);
				}
			});
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
