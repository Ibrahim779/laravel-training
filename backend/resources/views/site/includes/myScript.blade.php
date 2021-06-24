<script type="text/javascript">
    $('.addToCart').each(function(){
        let nameProduct = $(this).parent().parent().parent().find('.block2-name').html()??$('.product-detail-name').html();
        $(this).on('click', function(e){
            e.preventDefault();
            $.ajax({
                type : 'post',
                url : "{{route('site.cart.store')}}",
                data : {
                    "_token": "{{ csrf_token() }}",
                    'productId' : $(this).attr('productId')
                },
                success : function (data) {
                    $('.cartCount').html(data.cartCount);
                }
            });
            swal(nameProduct, "is added to cart !", "success");
        });
    });

    $('.block2-btn-addwishlist').each(function(){
        let nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function(e){
            e.preventDefault();
            $.ajax({
                type : 'post',
                url : "{{route('site.wishList.store')}}",
                data : {
                    "_token": "{{ csrf_token() }}",
                    'productId' : $(this).attr('productId')
                },
                success : function (data) {
                    console.log(data);
                    $('.cartCount').html(data.cartCount);
                }
            });
            swal(nameProduct, "is added to wishlist !", "success");
        });
    });
    $('.deleteCart').each(function(){
        let productName = $(this).attr('productName');
        let cartId = $(this).attr('cartId');
        $(this).on('click', function(e){
            e.preventDefault();
            $.ajax({
                type : 'delete',
                url : "{{url('cart')}}/" + cartId,
                data : {
                    "_token": "{{ csrf_token() }}",
                },
                success : function (data) {
                    $('.cartCount').html(data.cartCount);
                }
            });
            swal(productName, "deleted !", "success");
        });
    });
</script>
