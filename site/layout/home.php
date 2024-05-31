<style>
    * {
        margin: 0px;
        padding: 0px;
        font-family: cursive;
    }

    .slide-show {
        margin: auto;
        width: 1440px;
        height: 600px;
        margin-top: 50px;
    }

    .slide {
        width: 100%;
        height: 100%;
    }

    .slide {
        display: none;
        width: 100%;
        height: 100%;
    }

    .slide>img {
        width: 100%;
        height: 100%;
    }

    .box {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    /* button {
        width: 100px;
        height: 40px;
        margin: 10px 10px;
        background-color: white;
        color: red;
        border: solid 1px red;
        transition: all ease 0.5s;
        cursor: pointer;
    }

    button:hover {
        background-color: red;
        color: white;
        border-radius: 4px;
    } */
</style>
<div class="swiper mx-auto max-w-[1660px]">
    <!-- Additional required wrapper -->
    <div class="slide-show">
        <div class="slide"><img src="../upload/banner1.jpg" alt="" /></div>
        <div class="slide"><img src="../upload/banner2.jpg" alt="" /></div>
        <div class="slide"><img src="../upload/banner3.jpg" alt="" /></div>
        <div class="slide"><img src="../upload/banner4.png" alt="" /></div>
    </div>
    <div class="box">
        <!-- <button onclick="pre()">Preview</button> -->
        <!-- <button onclick="next()">Next</button> -->
    </div>
    <script>
        const slideList = document.getElementsByClassName("slide");
        const slideshow = setInterval(next, 1500);
        console.log("slide");
        let picture = 0;
        slideList[picture].style.display = "block";
        function pre() {
            slideList[picture].style.display = "none";
            picture--;
            if (picture < 0) {
                picture = slideList.length - 1;
            }
            slideList[picture].style.display = "block";
        }
        function next() {
            slideList[picture].style.display = "none";
            picture++;
            if (picture > slideList.length - 1) {
                picture = 0;
            }
            slideList[picture].style.display = "block";
        }
        function pause() {
            clearInterval(slideshow);
        }
        function play() {
            slideshow = setInterval(next, 1500);
        }

    </script>

    <div class="swiper-pagination"></div>

    <div class="swiper-button-prev">
        <!-- <button onclick="pre()">
            < </button> -->
    </div>
    <div class="swiper-button-next">
        <!-- <button onclick="next()"> > </button> -->
    </div>
    <!-- <script src=" https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script> -->
    <script>
        //     const swiper = new Swiper('.swiper', {
        //         // Optional parameters

        //         loop: true,

        //         // If we need pagination
        //         pagination: {
        //             el: '.swiper-pagination',
        //             clickable: true,
        //         },

        //         // Navigation arrows
        //         navigation: {
        //             nextEl: '.swiper-button-next',
        //             prevEl: '.swiper-button-prev',
        //         },

        //     });
        // </script>
</div>
<div class="dmnb my-10 max-w-[1080px] mx-auto grid grid-cols-2  items-center"
    style="font-family: 'Times New Roman', Times, serif;">
    <div class=""><button class="border-2 border-black py-1 px-5 font-black flex items-center">Danh mục<svg
                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-activity mx-2" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z" />
            </svg></button>
    </div>
    <div class="text-right ">
        <!-- <span><a href="">Trước</a></span> -->
        <span>|</span>
        <!-- <span><a href="">Sau</a></span> -->
    </div>
</div>
<div class="grid grid-cols-4 max-w-6xl mx-auto gap-2  my-20">
    <!-- danh mục -->
    <?php
    foreach ($dsdm as $dm) {
        extract($dm);
        $image = $img_path . $dm['image'];
        $linkdm = "index.php?act=san_pham&iddm=" . $id;
        echo '
                        <div class="">
                        <a href="' . $linkdm . '"><img style="width:282px ; height:300px" src="' . $image . '"></a>
                        <h3 class="text-center my-5 text-xl ">' . $categories_name . '</h3></div>
                    ';
    }
    ?>
</div>
<div class="dmnb my-5 max-w-5xl mx-auto grid grid-cols-3  items-center"
    style="font-family: 'Times New Roman', Times, serif;">
    <div class="flex">
        <!-- <span><a href="">Trước</a></span> -->

    </div>
    <span class="text-center text-[20px] border-2 py-2 px-3 font-black">SẢN PHẨM CAO CẤP</span>
    <div class="text-right">
        <!-- <span><a href="">Sau</a></span> -->
    </div>
</div>
<img src="../upload/ip15.jpg" alt="" class=" rounded-lg mx-auto w-full">
<hr class="my-10 w-4/5 mx-auto">
<div class="max-w-5xl mx-auto flex justify-between items-center">
    <div class="flex rounded-2xl font-black bg-[#EDF7FA] py-4 px-2 "
        style="font-family: 'Courier New', Courier, monospace;">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
        </svg>
        <span class=" mx-4 text-[#551AA9] text-[20px] items-center"
            style="font-family: 'Times New Roman', Times, serif;">Giới hạn</span>
    </div>
    <div class="flex ">
        <form class="border border-gray-500 p-2 w-[225px] rounded-md relative" action="index.php?act=san_pham"
            method="post">
            <input type="text" class="pl-2 border-0" placeholder="Tìm kiếm sản phẩm" name="kw">
            <button type="submit" name="timkiem" class="absolute right-[10px]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray"
                    class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </button>

        </form>
        <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray" class="w-10 h-10">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
        <span class=" mx-4"><input class="px-20 py-3" type="text" placeholder="Tìm kiếm sản phẩm"></span> -->

    </div>
</div>
<div class="LV grid grid-cols-3 mt-10 mx-auto max-w-6xl gap-10" style="font-family: 'Courier New', Courier, monospace;">
    <?php
    $new_product = loadall_product_trangchu();
    $i = 0;
    foreach ($new_product as $product) {
        extract($product);
        $image2 = $img_path . $product['image2'];

        echo '
        
                <div class="colums text-center transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:border-2 hover:border-violet-900 duration-300 group px-4 py-4">
                    <img src=" ' . $image2 . '";" alt="" class="text-center bg-[#F3F3F5] w-[85%] w-[259px] h-[259px]  mx-auto" />
                        <h3 class="my-2 inline-block ">
                            <a href="" class="text-xl my-4 font-bold">' . $product_name . '</a>
                        </h3>
                <div class="text-xl my-2">
  <span class="text-violet-900 font-bold">' . number_format($product_price, 0, ',', '.') . ' VNĐ</span>
</div>

                <button class="border-2 border-violet-900 px-4 py-3 my-4 text-violet-900 font-bold group-hover:bg-violet-900 group-hover:text-white transition delay-300 duration-300 ease-in-out">
            <form action="index.php?act=addtocart" method="post">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="hidden" name="product_name" value="' . $product_name . '">
                <input type="hidden" name="image" value="' . $image2 . '">
                <input type="hidden" name="product_price" value="' . $product_price . '">
                <input type="submit" name="addtocart"  value="MUA HÀNG">
            </form>
            
                </button>
                </div>
                
                ';
        $i += 1;
    }
    ?>

</div>
<div class="max-w-6xl my-10 mx-auto flex justify-between items-center"
    style="font-family: 'Courier New', Courier, monospace;">
    <div class="flex rounded-2xl font-black bg-[#EDF7FA] py-4 px-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
        </svg>

        <span class=" mx-4 text-[#551AA9] text-[20px] items-center">Tin Tức</span>
    </div>
    <div class="flex ">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="gray"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
        <span class=" mx-4">Tìm kiếm</span>
    </div>
</div>
<div class="max-w-6xl mx-auto">
    <div class="flex">
        <img style="width:436px; height:270px" srcset="../upload/g15.jpg" alt="">
        <div class="ml-10">
            <h3 class="font-bold text-xl">Giày bóng chuyền Wave Lightning</h3>
            <div class="my-4">
                <span class="inline-block bg-[#142850]  px-2 py-1 rounded-full text-white">2022</span>
                <span class="text-[#8695A4] text-xl ml-4">Dashboard</span>
            </div>
            <p class=" hover:underline">Wave Lightning là dòng giày bóng chuyền được rất nhiều các VĐV chuyên nghiệp lựa
                chọn sử dụng.
                Ngay từ phiên bản đầu tiên mẫu giày này đã gây ấn tượng lớn với người chơi bởi trọng lượng nhẹ và sự
                linh hoạt trong
                từng bước chạy cùng với đó là sự êm ái, bảo vệ chân tối đa cho các VĐV.
                Wave Lightning Z7 MID là mẫu giày mới được Mizuno cho ra mắt với những cải tiến nổi bật hơn ở phần gót
                giày
                và đế giày nhằm giúp nâng cao hiệu suất thi đấu cho các VĐV, đặc biệt hỗ trợ lực cho mỗi pha bật nhảy.
                Gót giày của Wave Lightning Z7 MID được làm tròn hơn kết hợp với các rãnh phần đế trước cho phép các VĐV
                phản ứng
                nhanh hơn, di chuyển linh hoạt và đổi hướng nhanh chóng trong từng bước chạy. Phần đế ngoài được tăng
                cường độ bám,
                ổn định hơn so với phiên bản tiền nhiệm. Đặc biệt là cổ giày cao hơn, giúp ổn định cổ chân và bảo vệ tối
                đa mắt cá
                chân của các VĐV mỗi khi thi đấu. </p>
        </div>
    </div>
    <hr class="my-10 bg-[#E0E0E0]">


    <div class="flex">
        <img style="width:436px; height:270px" srcset="../upload/giaythoitrang.webp" alt="">
        <div class="ml-10">
            <h3 class="font-bold text-xl">GIÀY THỜI TRANG NAM CROCS PACER LITERIDE 360 - BLACK/SLATE GREY</h3>
            <div class="my-4">
                <span class="inline-block bg-[#142850]  px-2 py-1 rounded-full text-white">2023</span>
                <span class="text-[#8695A4]  ml-4">Illustration</span>
            </div>
            <p class=" hover:underline">Cảm nhận bước đột phá mới về sự thoải mái với bộ sưu tập Crocs LiteRide.
                Những đôi giày được tích hợp lớp đệm LiteRide ™ êm ái làm tăng thêm độ mềm mại cho bàn chân.
                Kiểu dáng thể thao, năng động giúp bạn tận hưởng những bước đi thư thả nhất trên từng chặng đường.</p>
        </div>
    </div>
    <hr class="my-10 bg-[#E0E0E0]">

</div>
<div class="font-bold text-xl mb-20 mx-auto max-w-6xl">
    <span class="hover:bg-violet-900 hover:text-white px-4 mx-2 py-2">1</span>
    <span class="hover:bg-violet-900 hover:text-white px-4 ml-2 py-2">2</span>
    <span class="hover:bg-violet-900 hover:text-white px-4 py-2">
        Tiếp »</span>
</div>