$(document).ready(function(){
    // add Categories
   $(".stop").hide();
    $('a.next').click(function(e)
    {
        sp = $('#speed').val();
        console.log(sp);
        var isSp = parseInt(sp);
        $("html, body").animate({ scrollTop: $(document).height()-$(window).height() }, isSp);
        $(".next").hide();
        $('.stop').show();
        e.preventDefault();
    });
    $('a.stop').click(function(e)
    {
        $('html,body').stop();
        $(".stop").hide();
        $('.next').show();
        e.preventDefault();
    });
    $images = $('#demo')
    $('#message').hide();
    $("#img").change(function(event){
        readURL(this);
    });

    function readURL(input) {

        if (input.files && input.files[0]) {
            
            $.each(input.files, function() {
                var reader = new FileReader();
                reader.onload = function (e) {           
                    $images.append('<img src="'+ e.target.result+'" />')
                }
                reader.readAsDataURL(this);
            });
            
        }
    }
    $('#category').validate({
        rules : {
            cat_name : {
                required : true,
                minlength:5,
                maxlength:200
            },
            des_cat : {
                required : true,
                minlength:20
            },
        },
        messages : {
            cat_name : {
                required : "Không được để trống tên chuyên mục",
                minlength : "Tiêu đề phải lớn hơn > 5 kí tự",
                maxlength:"Tiêu đề quá dài"
            },
            des_cat : {
                required : "Phần mô tả không được trống",
                minlength : "Mô tả phải có ít nhất 20 ký tự"
            },
        },
        submitHandler : function () {

            var cat_name = $('#cat_name').val();
            var des_cat = $('#des_cat').val();
            var parent_id = $('#parent_id').val();
            var _token = $("input[name='_token']").val();
            // var formData =new FormData($("#category")[0]);
            var all = {cat_name,des_cat,parent_id,_token}
            $.ajaxSetup({
                headers: {
        
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });       
            $.ajax({

                type:'post',
                url:'/admin/category',
                data:new FormData($("#category")[0]),
                contentType:false,
                processData:false,
                success:function(data){
                    $('#cat_name').val("");
                    $('#des_cat').val("");
                    $('#parent_id').val("");
                    $('#img').val("");
                    $('#demo').hide();
                    $('#message').fadeIn("fast", function(){        
                        $("#message").fadeOut(2000);
                    });
                }
     
             });
        }
    });
    // End add Category
});
