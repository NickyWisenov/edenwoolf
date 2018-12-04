$(document).ready(function () {

	// Blog Categories Collapse function
	$(".category-collapse-button").on('click', function () {
		
		if (!$(this).hasClass('open')) {
			$(".category").css({
				'width': '100vw',
				'margin-left': '0px'
			});

			$(this).addClass('open');
			$('body').css({
				'overflow': 'hidden'
			})
		} else {
			$(".category").css({
				'width': '0px'
			});

			$(".category").removeAttr('style');

			$(this).removeClass('open');

			$('body').css({
				'overflow': ''
			})
		}
	});
	// Share blogs in the blogs index page
	$(".blog-container").on('click', '.fb>i',function () {
		window.open('https://www.facebook.com/sharer/sharer.php?u=localeden.com/blogs/' + $(this).parents().closest(".share-buttons").attr('data-blogId'), 
	        'facebook-share-dialog', 
	        'width=626,height=436'); 
	  	return false;
	});

	$(".blog-container").on('click', '.in>i', function () {
		window.open('https://www.linkedin.com/shareArticle?mini=true&url=localeden.com/blogs/' + $(this).parents().closest(".share-buttons").attr('data-blogId'),
			'linkedin-share-dialog',
			'width=626, height=436');
		return false;
	});

	$(".blog-container").on('click', '.tw>i', function () {
		window.open('http://twitter.com/share?text=Share on this&url=localeden.com/blogs/' + $(this).parents().closest(".share-buttons").attr('data-blogId') + '&hashtags=edenwolf,share',
			'twitter-share-dialog',
			'width=626, height=436');
		return false;
	});


	// Share blogs in the detail view
	$(".detail-view-sec").on('click', '.fb>img',function () {
		window.open('https://www.facebook.com/sharer/sharer.php?u=localeden.com/blogs/' + $(this).parents().closest(".share-buttons").attr('data-blogId'), 
	        'facebook-share-dialog', 
	        'width=626,height=436'); 
    	return false;
	});

	$(".detail-view-sec").on('click', '.in>img', function () {
		window.open('https://www.linkedin.com/shareArticle?mini=true&url=localeden.com/blogs/' + $(this).parents().closest(".share-buttons").attr('data-blogId'),
			'linkedin-share-dialog',
			'width=626, height=436');
		return false;
	});

	$(".detail-view-sec").on('click', '.tw>img', function () {
		window.open('http://twitter.com/share?text=Share on this&url=localeden.com/blogs/' + $(this).parents().closest(".share-buttons").attr('data-blogId') + '&hashtags=edenwolf,share',
			'twitter-share-dialog',
			'width=626, height=436');
		return false;
	});
     

    $.ajax({
    	url: 'https://graph.facebook.com/?ids=http://localeden.com/blogs/54',
    	success: function (data) {
    		console.log(data);
    	}
    });

	$(".report-btn").on('click', function () {
		$.ajax({
			url: '/blogs/report?commentId=' + $(this).attr('data-id'),
			method: 'GET',
			success: function (data) {
				if(data == true) {
					alert('Comment is reported');
				}
			}
		})
	});

	$(".like-btn").on('click', function () {
		$.ajax({
			url: '/blogs/like?commentId=' + $(this).attr('data-id'),
			method: 'GET',
			success: function (data) {
				if(data == true) {
					alert('You like the comment!');
					location.reload();
				}
			}
		})
	})
});

