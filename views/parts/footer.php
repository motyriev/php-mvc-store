</div>
<div id="footer">
    <p id='copy'>&copy; Hi-tech Shop 2019
    <p>
</div>

<script type="text/javascript">
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

</script>
</body>
</html>
