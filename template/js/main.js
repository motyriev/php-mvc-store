
/*Фильтры*/
$(document).ready(function(){
    $('.filter').on('change', '.filter input', function () {
        let checked = $('.filter input:checked'),
            data = '';
        checked.each(function () {
            data += this.value + ',';
        }); console.log(data);
        if(data){
            $.ajax({
                url: location.href,
                data:{filter:data},
                type: 'POST',
                beforeSend: function(){
                    $('.preloader').fadeIn(300, function() {
                        $('.box_items').hide();
                    });
                },
                success: function (res) {
                    $('.preloader').delay(500).fadeOut('slow',function () {
                        $('.box_items').html(res).fadeIn();});
                }
            })
        }
        else window.location = location.pathname;
    });
});

//сортировка товара
$(document).ready(function(){
    $('#user_pref').on('change', function(){
        let option = $('#user_pref option:selected').val()
        $.ajax({
            url: location.href,
            data:{sort:option},
            type: 'POST',
            beforeSend: function(){
                $('.preloader').fadeIn(300, function() {
                    $('.box_items').hide();
                });
            },
            success:function(res){
                $('.preloader').delay(500).fadeOut('slow',function () {
                    $('.box_items').html(res).fadeIn();});
            }
        });
    });
});

//Корзина
$(document).ready(function(){
            $('.to_cart').click(function(){
                var id = $(this).attr("data-id");
                $.post("/cart/add/" + id,
                {},
                function(data){
                $('.cart_count').html(data);
                });
                alert ('Товар добавлен в корзину');
                return false;
            });
});
//Поиск по сайту
$(document).ready(function(e){
        $("#search").keyup(function()
        {
            $("#here").show();
            var x = $(this).val();
            $.post(
                "/search/" + x,
                function(data){
                $("#here").html(data)
                });
                return false;
            });
});

/*табы товара*/
$(document).ready(function(){
    $.ionTabs("#tabs_1",{
        type: "none"
    });
});
