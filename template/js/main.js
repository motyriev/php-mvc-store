/*табы продукта */
$(document).ready(function(){
$.ionTabs("#tabs_1",{
    type: "none"
});
});
/*Фильтры*/
$(document).ready(function(){
    $('.filter').on('change', '.filter input', function () {
        var checked = $('.filter input:checked'),
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
                        $('.features_items').hide();
                    });
                },
                success: function (res) {
                    $('.preloader').delay(500).fadeOut('slow',function () {
                        $('.features_items').html(res).fadeIn();});
                }
            })
        }
        else window.location = location.pathname;
    });
});
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
    
    $(document).ready(function(e)
    {
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