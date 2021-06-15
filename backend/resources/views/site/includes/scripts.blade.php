<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('site/assets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('site/assets/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('site/assets/vendor/bootstrap/js/popper.js')}}"></script>
<script type="text/javascript" src="{{asset('site/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('site/assets/vendor/select2/select2.min.js')}}"></script>
<script type="text/javascript">
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
    $(".selection-2").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect2')
    });
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('site/assets/vendor/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('site/assets/js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('site/assets/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('site/assets/vendor/lightbox2/js/lightbox.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('site/assets/vendor/sweetalert/sweetalert.min.js')}}"></script>
<script type="text/javascript">
    $('.block2-btn-addcart').each(function(){
        let nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
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
</script>

<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('site/assets/vendor/parallax100/parallax100.js')}}"></script>
<script type="text/javascript">
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="{{asset('site/assets/js/main.js')}}"></script>

@yield('script')
