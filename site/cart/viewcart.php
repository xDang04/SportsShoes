<?php
//  $_SESSION['cart'][0][4]=4;
if (isset($_POST['up'])) {
    $quantity = array();
    $idproduct = array();
    $quantity = $_POST['quantity'];
    $idproduct = $_POST['product_id'];
    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
        $_SESSION['cart'][$i][4] = $quantity[$i];
        // echo$_SESSION['cart'][$i][4]."<br>";
    }
    // echo "<script>window.location.href='?act=viewcart'</script>";
    // echo "<script>alert(1)</script>";


    // echo $_POST['update_quantity'];

}
if (isset($_SESSION['cart']) && ($_SESSION['cart'] != [])) {
    // echo var_dump($_SESSION['cart']); 


    ?>
    <!-- </div> -->
    <div class="items-center text-center text-[50px] font-bold ">
        Cart
    </div>
    <div class="logo max-w-[1080px] mx-auto grid justify-between items-center  my-5 mb-10">
        <form action="" method="post">
            <table class=" text-center mx-auto border-collapse border border-slate-300  ...">
                <tr>
                    <th class=" px-11 border border-slate-300 ...">STT</th>
                    <th class=" px-11 border border-slate-300 ...">Image</th>
                    <th class=" px-11 border border-slate-300 ...">Product Name</th>
                    <th class=" px-11 border border-slate-300 ...">Price</th>
                    <th class=" px-11 border border-slate-300 ...">Quantities</th>
                    <th class=" px-11 border border-slate-300 ...">Classify</th>
                    <th class=" px-11 border border-slate-300 ...">It's money.</th>
                    <th class=" px-11 border border-slate-300 ...">Delete</th>
                </tr>
                <?php
                $tong = 0;
                $i = 0;
                foreach ($_SESSION['cart'] as $product) {
                    $ttien = $product[3] * $product[4];
                    $tong += $ttien;
                    echo '<tr>  
                            <td class=" px-11 border border-slate-300 ..." >' . ($i + 1) . '</td>
                            <td class=" px-11 border border-slate-300 ..."><img src="' . $product[2] . '" ></td>
                            <td class=" px-11 border border-slate-300"><h3>' . $product[1] . '</h3></td>
                            <td class=" px-11 border border-slate-300 ...">' . number_format($product[3]) . '</td>
                            <td class=" px-11 border border-slate-300 ..."> 
                            <input class="w-9 h-12"  type="hidden" name="product_id[]" value="' . $product[0] . '">
                            <input class="w-9 h-12"  type="number" name="quantity[]" value="' . $product[4] . '">
                            <td class=" px-11 border border-slate-300 ...">' . $product[5] . ',' . $product[6] . '</td>
                            <td class=" px-11 border border-slate-300 ...">' . number_format($ttien) . '</td>
                            <td style="text-align:center"><a href="index.php?act=delcart&idcart=' . $i . '">Xóa</a></td>
             </tr>';
                    $i++;
                }
                ?>
                <tr>
                    <td colspan="6" class=" px-11 border border-slate-300 ...">Total Order</td>
                    <td style="background-color: #CCC;">
                        <?= number_format($tong); ?>
                    </td>
                    <td style="background-color: #CCC;"> <a href="index.php?act=delcart">Delete All</a></td>
                </tr>
            </table>
            <p class="flex justify-between"><a href="index.php?act=product" class=" pt-10 font-bold ">Continue ordering?</a>
                <input type="submit" class="mt-10 font-bold hover:bg-gray-300 rounded-lg mb-10" name='up'
                    value="Updates cart">
            </p>
        </form>
        <div class="items-center text-stast rounded-lg   font-bold mt-10 ">
            <a href="index.php?act=thanhtoan&tong=<?= $tong ?>" class=""> <button type="submit"
                    class="text-black py-4 px-10 bg-gray-300 rounded-lg mb-10 hover:bg-white hover:shadow-lg hover:shadow-cyan-500/50 hover:text-[#4F46E5]">
                    MOMO FINANCIALS</button> </a>
            <br>
            <a href="index.php?act=thanhtoan_COD&tong=<?= $tong ?>&COD" class=""> <button type="submit"
                    class="text-black py-4 px-10 bg-gray-300 rounded-lg mb-10  hover:bg-white hover:shadow-lg hover:shadow-cyan-500/50 hover:text-[#4F46E5]">
                    REFERENCE ON REGISTRATION</button> </a>
        </div>
    </div>
    </body>

    </html>
    <?php

} else {
    echo '<h1 class=" text-center text-[32px] border border-slate-300 ...">You havent added anything to your cart :

    <a class="text-center text-[32px] border border-slate-300 ..." href="index.php?act=product" >Back to Product Page</a>
    </h1>';
}
?>