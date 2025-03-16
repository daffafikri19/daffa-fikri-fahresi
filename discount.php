<?php 

function calculateDiscount($total) {
    if ($total >= 100000) {
        $discount = $total * 10 / 100;
        echo "Total belanja: Rp $total, Anda mendapatkan diskon 10% sebesar Rp $discount\n";
        return $total - $discount;
    } 
    else if ($total >= 50000) {
        $discount = $total * 5 / 100;
        echo "Total belanja: Rp $total, Anda mendapatkan diskon 5% sebesar Rp $discount\n";
        return $total - $discount;
    } 
    else {
        echo "Total belanja: Rp $total, Anda tidak mendapatkan diskon.\n";
        return $total;
    }
}
?>
