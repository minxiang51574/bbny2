/*
 * @Author: Mx
 * @Date: 2022-11-14 23:45:27
 * @Description:
 */
(function ($) {
  $(document).ready(function () {
    // 头部nav导航栏点击
    $(".header ul li a").each(function () {
      $(this).click(function () {
        $(".header .active").removeClass("active");
        console.log("click");
        $(this).addClass("active");
        // return false;
      });
    });
  });
})(jQuery);
