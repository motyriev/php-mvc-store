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