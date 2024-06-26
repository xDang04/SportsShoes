<div class="home mt-5 mr-8 bg-[#F4F6FA] h-auto rounded">
    <!-- content -->
    <h1 class="text-center text-cyan-500 pt-6 pb-8  text-4xl " style="font-family: 'Courier New', Courier, monospace">List BÌNH LUẬN</h1>
    <div class="">
        <table class="table shadow-2xl shadow-cyan-500/50 mx-auto border-2 border-cyan-500/50mx-auto my-5">
            <tr class="border-2 border-cyan-500/50  text-[#551AA9] ">
                <th class="border-2 border-cyan-500/50  px-6 py-2">Shipment</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Content</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">DateComment</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">UserComment</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2">Review</th>
                <th class="border-2 border-cyan-500/50  px-6 py-2"></th>
            </tr>
            <?php
            if ((isset($ListComment)) && ($ListComment != [])) {
                foreach ($ListComment as $ListCm) {
                    extract($ListCm);
                    $product = Get_Product_By_Code($id_product);
                    $user = Get_Account_By_Code($id_user);
                    $delCm = "index.php?act=delete_comment&id=" . $id . "&id_product=" . $id_product;
            ?>
                    <tr class="border-2 border-cyan-500/50  px-6 py-2">
                        <td class="border-2 border-cyan-500/50 text-center px-6 py-2"><?= $product['product_name'] ?></td>
                        <td class="border-2 border-cyan-500/50 text-center  px-6 py-2"><?= $comment ?></td>
                        <td class="border-2 border-cyan-500/50 text-center px-6 py-2"><?= $DateComment ?></td>
                        <td class="border-2 border-cyan-500/50 text-center px-6 py-2"><?= $user['user_name'] ?></td>
                        <td class="border-2 border-cyan-500/50 text-center  px-6 py-2"><?= $stars ?><span> sao</span></td>
                        <td><a onclick="return confirm('Bạn có muốn xóa không')" class="text-white text-center hover:bg-[#BAAACE] hover:text-white bg-[#AC3131] py-1 px-4 rounded-md mx-2" href="<?= $delCm ?>">Xóa</a></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
</div>

</div>
</div>
</body>

</html>