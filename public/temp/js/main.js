// // Header Mobile
// $('.header-icon .bar-actions.bar').click(function () {
//     if($('.header-icon__active').hasClass('d-none')){
//         $('.header-icon__active').removeClass('d-none')
//         $('.header-icon__active').addClass('d-flex')
//     }else{
//         $('.header-icon__active').removeClass('d-flex')
//         $('.header-icon__active').addClass('d-none')
//     }
// })
// var bar_mobile = $('.header-responsive .bar-actions.bar')
// var overlay_mobile = $('.layout-site .over-lay')
// var header_mobile = $('.header-nav.mobile')
// bar_mobile.click(function () {
//     overlay_mobile.css('right','0');
//     overlay_mobile.css('transition','.5s all');
//     header_mobile.css('transform','translateX(0)')
// })
// overlay_mobile.click(function () {
//     $(this).css('right','');
//     header_mobile.css('transform','translateX(-100%)')
// })
//
//
//
//
// // Main
// document.getElementById('backtotop').addEventListener('click', function() {
//     // Cuộn lên đầu trang
//     window.scrollTo({
//         top: 0,
//         behavior: 'smooth' // Hiệu ứng cuộn mượt (smooth scroll)
//     });
// });
//
// $(document).ready(function() {
//
//     // Xử lý Click Thêm Active
//     function addActive(event, selector) {
//         // Xóa class 'active' khỏi tất cả các thẻ có class 'active'
//         $(selector).removeClass('active');
//         // Thêm class 'active' vào thẻ được click
//         $(event.target).addClass('active');
//     }
//     $('.category-item').click(function(event) {
//         addActive(event, '.category-item');
//     });
//     $('.main-content__cate').each(function() {
//         var itemId = $(this).attr('id');
//         $('#' + itemId + ' .cate-child__item').click(function(event) {
//             addActive(event, '#' + itemId + ' .cate-child__item');
//         });
//     });
//     $(' .list-video').click(function(event) {
//         event.preventDefault()
//         $(' .list-video').removeClass('active');
//         $(this).addClass('active')
//     });
//
//
//     // Xử lý chuyển Tab bài viết theo danh mục
//     // Xử lý sự kiện click
//     $(".main-content__cate .cate-child__item").click(function() {
//         var cateID = $(this).closest('.main-content__cate').attr('id'); // Lấy ID của phần tử cha gần nhất có class main-content__cate
//         var itemId = $(this).attr("id"); // Lấy ID của tab được click
//         // Ẩn tất cả các swiper-content bên trong phần tử cha main-content__cate
//         $("#" + cateID + " .swiper-content").addClass("d-none");
//         $("#" + cateID + " .swiper-content").removeClass("d-block");
//         // Hiển thị swiper-content tương ứng với tab được click
//         $("#" + itemId + ".swiper-content").removeClass("d-none");
//         $("#" + itemId + ".swiper-content").addClass("d-block");
//
//     });
//
// });
//
//
//
//
