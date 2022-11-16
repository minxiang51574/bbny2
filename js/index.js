/*
 * @Author: Mx
 * @Date: 2022-11-14 23:45:27
 * @Description:逻辑处理
 */
(function ($) {
  $(document).ready(function () {
    // 头部nav导航栏点击
    $(".header ul li a").each(function () {
      $(this).click(function () {
        $(".header .active").removeClass("active");
        $(this).addClass("active");
      });
    });

    $(".header .home").hover(
      function () {
        console.log("11");
        $(".header .home-nav").show();
        $(".header .navBg").show();
        $(this).parent().addClass("on");
      },
      function () {
        console.log("22");
        $(".header .home-nav").hide();
        $(".header .navBg").hide();
        $(this).parent().removeClass("on");
      }
    );

    // 关于我们 点击视频播放
    var videopaly = $(".aboutUs .videopaly");
    var video = $("video")[0];
    videopaly.click(function () {
      video.play();
      videopaly.hide(); // 隐藏播放按钮
      video.addEventListener("ended", function () {
        videopaly.show(); // 播放结束 显示播放按钮
      });
    });
  });
})(jQuery);
