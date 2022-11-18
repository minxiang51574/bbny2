/*
 * @Author: Mx
 * @Date: 2022-11-14 23:45:27
 * @Description:逻辑处理
 */
(function ($) {
  $(document).ready(function () {
    console.log("111111");

    // 轮播图
    $(".bannerList .slideBox").slide({
      titCell: ".hd ul",
      mainCell: ".bd ul",
      autoPage: true,
      effect: "fold",
      autoPlay: true,
      delayTime: 500,
    });

    $(".lib87467138_4wap1 .banner").slick({
      infinite: true,
      autoplay: true,
      dots: true,
      arrows: false,
    });


// 导航栏悬停
    $(function () {
      $(".lib40917467_3 .t-nav ul li").each(function () {
        var dhej = $(this).find(".erjp a").size();
        if (dhej > 0) {
          $(this).hover(
            function () {
              $(this).find(".erjp").show();
              $(".erjsv").show();
              $(this).addClass("on");
            },
            function () {
              $(this).find(".erjp").hide();
              $(".erjsv").hide();
              $(this).removeClass("on");
            }
          );
        }
      });
      
    });
    // 搜索

    $("#search_btn").click(function () {
      var text = $("#sear_text").val();
      window.location.href = "/search?search_key=" + text;
    });
    // 留言 走message控制器
    $("#sub_message #submit_message").click(function () {
      console.log(1111111111112);
      var name = $("#sub_message #name").val();
      var phone = $("#sub_message #phone").val();
      var message = $("#sub_message #message").val();
      console.log(name,phone,message);
    
      if (name && phone && message) {
        let regex = /^(13[0-9]{9})|(15[0-9]{9})|(17[0-9]{9})|(18[0-9]{9})|(19[0-9]{9})$/
        if (regex.test(phone)) {
          $.ajax({
            url:'/message',
            type:"post",
            data:{
                id:66618126,
                phone,
                name,
                description:message
            },
            success:function(res){
                if(!res){
                    return
                }
                alert(res)
            }
        })
        } else {
          alert('请输入正确的手机格式')
        }
      } else {
        alert('请填写完整信息')
      }
    });

    // 留言 mp单独处理走message控制器
    $("#sub_message_mp #submit_message").click(function () {
      console.log(1111111111112);
      var name = $("#sub_message_mp #name").val();
      var phone = $("#sub_message_mp #phone").val();
      var message = $("#sub_message_mp #message").val();
      console.log(name,phone,message);
    
      if (name && phone && message) {
        let regex = /^(13[0-9]{9})|(15[0-9]{9})|(17[0-9]{9})|(18[0-9]{9})|(19[0-9]{9})$/
        if (regex.test(phone)) {
          $.ajax({
            url:'/message',
            type:"post",
            data:{
                id:66618126,
                phone,
                name,
                description:message
            },
            success:function(res){
                if(!res){
                    return
                }
                alert(res)
            }
        })
        } else {
          alert('请输入正确的手机格式')
        }
      } else {
        alert('请填写完整信息')
      }
    });

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

  // header处理
  $(function () {
    $(".lib40917467_3wap1header .icon_toggle").on("click", function () {
      $(".searchbar").toggleClass("open");
    });
    $(".lib40917467_3wap1header .nav_toggle").on("click", function () {
      $(this).toggleClass("showhide");
      $(".nav").toggleClass("showslide");
      $(".overlay").toggleClass("active");
      $(".searchbar").removeClass("open");
      $(".wrap").toggleClass("posfix");
      if ($(".lib40917467_3wap1header .nav").height() == 0) {
        $("body").css({ position: "fixed", width: "100%" });
      } else {
        $("body").css("position", "static");
      }
    });
    $(".lib40917467_3wap1header .overlay").on("click", function () {
      $(this).toggleClass("active");
      $(".nav").removeClass("showslide");
      $(".nav_toggle").removeClass("showhide");
    });
    $(".lib40917467_3wap1header .nav").on("click", function () {
      $(this).removeClass("showhide");
    });
    $(".lib40917467_3wap1header .nav_add").on("click", function () {
      var cn = $(this).parent().hasClass("cur");
      if (cn == false) {
        $(this).parent().addClass("cur");
        $(this).parent().find(".subnav").slideDown();
        $(this).parent().siblings().removeClass("cur");
        $(this).parent().siblings().find(".subnav").removeClass("showhide");
        $(this).parent().siblings().find(".subnav").slideUp();
      } else {
        $(this).parent().removeClass("cur");
        $(this).parent().find(".subnav").slideUp();
      }
    });
    $(".lib40917467_3wap1header .nav .wrap_nav ul li .subnav").each(
      function () {
        var plus = $(this).find("a").text();
        if (plus == "") {
          $(this).parent().find(".nav_add").hide();
        }
      }
    );
  });
})(jQuery);
