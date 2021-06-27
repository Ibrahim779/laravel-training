<h5 class="m-text20 p-b-24">
    Cart Totals
</h5>
<!--  -->
<div class="flex-w flex-sb-m p-b-12">
    <span class="s-text18 w-size19 w-full-sm">
        Subtotal:
    </span>
    <span class="m-text21 w-size20 w-full-sm">
        ${{\App\Models\Cart::getTotal()}}
    </span>
</div>
<div class="flex-w flex-sb-m p-b-12">
    <span class="s-text18 w-size19 w-full-sm">
        shipping:
    </span>
    <span class="m-text21 w-size20 w-full-sm">
        $20.00
    </span>
</div>
<div class="flex-w flex-sb-m p-b-12">
    <span class="s-text18 w-size19 w-full-sm">
        discount:
    </span>
    <span class="m-text21 w-size20 w-full-sm">
        $10.00
    </span>
</div>
<div class="flex-w flex-sb-m p-t-26 p-b-30">
    <span class="m-text22 w-size19 w-full-sm">
        Total:
    </span>
    <span class="m-text21 w-size20 w-full-sm">
        ${{\App\Models\Cart::getTotal()}}
    </span>
</div>
