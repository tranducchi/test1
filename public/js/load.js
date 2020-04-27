$(document).ready(function(){
    $('.icon-load').hide();
    var page = 2;
    $('#load').click(function(){
        loadMoreData(page);
        page++;
    })
    function loadMoreData(page){
    $('.icon-load').show();
    $('#load').hide();
	  $.ajax(
	        {
	            url: '?page=' + page,
	            type: "get",
	        })
	        .done(function(data)
	        {
	            $('.icon-load').hide();
                $('#load').show();
	            var datas = $('.listarticle').append($(data).find('.listarticle').html());
	         
	        })
	}
     $( "html body #content" ).on( "click", function() {
        $('.play').toggleClass('hide',3000)
    });
})
