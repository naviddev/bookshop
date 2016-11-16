jQuery(document).ready(function ($) {
    $('.add_shoping').one('click', function (e) {
        e.preventDefault();
        var $this = $(this);
        var $container = $this.attr('href');
        res1 = $url.concat('/user/shopping/add/');
        res2 = res1.concat($container);
        $.ajax({
            url:res2,
            type: 'GET',

            success: function(data) {

                location.reload(true);
            },

        });
    })
});
$(document).ready(function(){
    var loginForm = $("#loginForm");
    loginForm.submit(function(e) {
        e.preventDefault();
        var formData = loginForm.serialize();
        $('#form-errors-email').html("");
        $('#form-errors-password').html("");
        $('#form-login-errors').html("");
        $("#email-div").removeClass("has-error");
        $("#password-div").removeClass("has-error");
        $("#login-errors").removeClass("has-error");
        res = $url.concat('/login');
        $.ajax({
            url:res,
            type: 'POST',
            data: formData,
            success: function(data) {
                $('#modal1').modal('close');
                location.reload(true);
            },
            error: function(data) {
                console.log(data.responseText);
                var obj = jQuery.parseJSON(data.responseText);
                if (obj.email) {
                    $("#email-div").addClass("has-error");
                    $('#form-errors-email').html(obj.email);
                }
                if (obj.password) {
                    $("#password-div").addClass("has-error");
                    $('#form-errors-password').html(obj.password);
                }
                if (obj.error) {
                    $("#login-errors").addClass("has-error");
                    $('#form-login-errors').html(obj.error);
                }
            }
        });
    });
});
