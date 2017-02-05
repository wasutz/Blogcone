$(document).ready(function() {
    $('.like-button').on('click', function (e) {
    	var likes = $(this).parent().find('.likes-count');
        var likeButton = $(this).parent().find('.like-button');

        $.ajax({
            type: 'POST',
           	contentType: "application/json",
			dataType: 'json',
            url: $(this).parent().attr('action'),

            success: function(data) {
            	console.log(data);
                
              	likes.text(data.length);
                likeButton.removeClass('glyphicon-heart-empty');
                likeButton.addClass('glyphicon-heart');
            },

            error: function(msg) {
            	console.log('Error');
            }
        });
    });
});