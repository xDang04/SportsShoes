<div class="home mt-5 px-5 py-10 mr-8 bg-[#F4F6FA] h-auto rounded">
    <div class="ad-r col-span-2">
        <h1 class="text-center text-cyan-500 pb-10  text-4xl " style="font-family: 'Courier New', Courier, monospace">List DANH MỤC</h1>
        <div class="justify-between mx-40 flex items-center">
            <h1 class="text-[20px] font-semibold text-sky-600 my-5">Danh sách Cates</h1>

            <a href="index.php?act=Add_cate" class=" bg-yellow-300 text-center  py-2 px-2 rounded-md hover:bg-[#BAAACE] hover:text-white mx-4 font-semibold text-[#551AA9] my-5">ADD
                Cate</a>
        </div>

        <table class="table mx-auto border-2 shadow-2xl shadow-cyan-500/50 border-cyan-500/50">
            <tr class="border-2 border-cyan-500/50  text-[#551AA9] ">
                <th class="border-2 border-cyan-500/50  px-14 py-2">CATE_ID</th>
                <th class="border-2 border-cyan-500/50 px-14 py-2">Cate_NAME</th>
                <th class="border-2 border-cyan-500/50 px-40 py-2">Image</th>
                <th class="border-2 border-cyan-500/50 px-14 py-2">
                    Action
                </th>
            </tr>

            <?php
            foreach ($ListCategory as $ListCate) {
                extract($ListCate);
                $View_Update_Cate = "index.php?act=View_Update_Cate&id=" . $id;
                $Delete_cate = "index.php?act=Delete_cate&id=" . $id;
                $image = "../upload/" . $image;
            ?>

                <tr class="text-[#551AA9] ">
                    <td class="border-2 border-cyan-500/50 py-4 px-2 text-center">
                        <?= $id ?>
                    </td>
                    <td class="border-2 border-cyan-500/50 py-4 px-2 text-center">
                        <?= $categories_name ?>
                    </td>
                    <td class="border-2 border-cyan-500/50 py-2 px-2 text-center ">
                        <img src="<?= $image ?>" alt="" width="50px" class="text-center inline-block">
                    </td>

                    <td class="border-2 border-cyan-500/50 py-4 px-2 text-center">
                        <a class="py-1 px-4 bg-[#1E74A4] hover:bg-[#BAAACE] hover:text-white text-white rounded-md mx-2" href="<?= $View_Update_Cate ?>">Sửa</a>
                        <a onclick="return confirm('Bạn có muốn xóa không')" class="text-white hover:bg-[#BAAACE] hover:text-white bg-[#AC3131] py-1 px-4 rounded-md mx-2" href="<?= $Delete_cate ?>">Xóa</a>
                    </td>
                </tr>
            <?php
            }
            ?>

        </table>
    </div>
</div>
</div>
</div>
</body>

</html>