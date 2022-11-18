<!--
 * @Author: Mx
 * @Date: 2022-11-14 21:42:11
 * @Description: 网站首页
-->
<!DOCTYPE html>
<html lang="en">

{file header}

<body>

    {file nav_2}

    <!-- 轮播 -->
    <div class="bannerList">
        <div class="slideBox">
            <div class="bd">
                <ul style="width: 100%;">
                    {$pics=explode(;,$.0.banner)|array_filter()}
                    {loop $pics as $pic}
                    <li style="width: 100%;">
                        <a href="#"><img src="{$pic}" /></a>
                    </li>
                    {/loop}
                </ul>
            </div>
            <div class="hd">
                <ul></ul>
            </div>
        </div>
    </div>
    <!-- 轮播< 992 -->
    <div class="lib87467138_4wap1">
        <div class="banner">
            {$pics=explode(;,$.0.banner)|array_filter()}
            {loop $pics as $pic}
            <div class="bannerImg" style=" background: url({$pic}) no-repeat; background-size: cover;  ">
                <a href="#"></a>
            </div>
            {/loop}

        </div>
    </div>
    <!-- 新闻快讯-->
    <div class="newsFlash">
        <div class="wrap">
            <div class="newsFlash-logo">
                <div class="title">新闻快讯</div>
                <div class="sub-title">News Flash</div>
            </div>

            <div style="display:flex">
                {$test.cid=66618111}
                {$test.where.recommend=1}
                {$test.all=1}
                {$test.pagesize=2}
                {$articles=a($test)}
                {loop $articles as $article}
                <div class="newsFlash-item-time">
                    <div class="newsFlash-time-top">{date(d,$article.datetime)}</div>
                    <div class="newsFlash-time-bottom">{date(Y-m,$article.datetime)}</div>
                </div>
                <div class="newsFlash-item-context">
                    <div class="newsFlash-context-top"> {text($article.title,15,...)}</div>
                    <div class="newsFlash-context-bottom">
                        {text($article.description,36,...)}
                    </div>
                </div>
                {/loop}

            </div>

        </div>
    </div>
    <!-- 合作伙伴 -->
    <div class="cooperativePartner">
        <div class="wrap">
            <div class="cooperationContent">
                <ul>
                    <li class="cooperation-first">
                        <p class="coop-title">合作伙伴</p>
                        <p class="coop-subtitle">cooperative partner</p>
                        <p class="coop-content">行业期许 我们的最大动力</p>
                        <p class="blankLine"></p>
                    </li>
                    {$testp.cid=66618122}
                    {$testp.all=1}
                    {$testp.pagesize=8}
                    {$articles=a($testp)}
                    {loop $articles as $article}
                    <li><img src="{$article.pic}" alt=""></li>
                    {/loop}
                </ul>
            </div>
        </div>
    </div>
    <!-- 合作伙伴2 -->
    <!-- <div class="cooperativePartnerWap">
        <p class="title">合作伙伴</p>
        <p class="coop-content">行业期许 我们的最大动力</p>
        <ul>
            {$testp.cid=66618122}
            {$testp.all=1}
            {$testp.pagesize=8}
            {$articles=a($testp)}
            {loop $articles as $article}
            <li><img src="{$article.pic}" alt=""></li>
            {/loop}
        </ul>
    </div> -->
    <!-- 关于我们  -->
    <div class="aboutUs">
        <div class="wrap">
            <div class="about-content">
                <div class="wrap-title">关于我们<span class="warp-subtitle">ABOUT US</span></div>
                <p class="wrap-introduce">
                    {text($.66618116.description,356,...)}
                </p>

                <button class="wrap-more">查看更多 ></button>
            </div>
            <div class="videoBox">
                <!-- <video width="320" height="240" controls>
                    <source src="{$.66618116.video}" type="video/mp4">

                    <source src="{$.66618116.video}" type="video/ogg">

                    <source src="{$.66618116.video}" type="video/webm">

                    您的浏览器不支持 video 标签。

                </video> -->
                <!-- <i class="iconfont icon-yunhang videopaly"></i> -->
                <!-- <video src="{$.66618116.video}"></video> -->
            </div>
        </div>
    </div>
    <!-- 关于我们2  -->
    <div class="aboutUsWap">
        <div class="about-content">
            <div class="wrap-title">关于我们</div>
            <p class="wrap-introduce">
                {text($.66618116.description,356,...)}
            </p>

            <button class="wrap-more">查看更多 ></button>
        </div>
    </div>
    <!-- 产品介绍 -->
    <div class="productIntro">
        <div class="wrap">
            <div class="cooperation-first productCotent">
                <p class="coop-title">产品介绍</p>
                <p class="coop-subtitle">Product Introduction</p>
                <p class="blankLine"></p>
            </div>
            <ul class="productList">
                {$product.cid=66618107}
                {$product.all=1}
                {$product.where.recommend=1}
                {$product.pagesize=20}
                {$articles=a($product)}
                {loop $articles as $article}
                <li>
                    <div class="mask">
                        <p class="details">查看详情</p>
                    </div><img src="{$article.pic}" alt="">
                    <p class="product-title">
                        < {text($article.title,8)}>
                    </p>
                </li>
                {/loop}

            </ul>
        </div>
    </div>
    <!-- 产品介绍2 -->
    <div class="productIntroWap">
        <div class="cooperation-first productCotent">
            <p class="coop-title">产品介绍</p>
            <p class="coop-subtitle">Product Introduction</p>
            <p class="blankLine"></p>
        </div>
        <div class="productListWap">
            <ul>
                {$product.cid=66618107}
                {$product.all=1}
                {$product.where.recommend=1}
                {$product.pagesize=20}
                {$articles=a($product)}
                {loop $articles as $article}
                <li class="clearfix">
                    <img src="{$article.pic}" alt="">
                    <p class="product-title">
                        < {text($article.title,8)}>
                    </p>
                </li>
                {/loop}

            </ul>
        </div>
    </div>
    <!-- 工艺介绍 -->
    <div class="processIntro">
        <div class="wrap">
            <div class="processCotent process-left ">
                <div class="wrap-title">工艺介绍<span class="warp-subtitle">Process Introduction</span></div>
                <div class="process-step">
                    <ul>
                        {$process.cid=66618123}
                        {$process.all=1}
                        {$process.order=sort asc}
                        {$process.pagesize=5}
                        {$processdata=a($process)}
                        {loop $processdata as $article}
                        <li style="display:flex;">
                            <div class="process-step-num">0{$article.key}</div>
                            <div class="process-step-text">
                                <p>{$article.title}</p>
                                <p>{$article.description}</p>
                            </div>
                        </li>
                        {/loop}

                    </ul>
                </div>
            </div>
            {$parenta=cms:channel:get(66618123)}
            <div div class="processCotent process-right"><img src="{$parenta.pic}" alt=""></div>
        </div>
    </div>
    <!-- 研发 -->
    <div class="research">
        <div class="wrap">
            <ul class="researchContent">
                {$robot.cid=66618124}
                {$robot.all=1}
                {$robot.pagesize=3}
                {$robotdata=a($robot)}
                {loop $robotdata as $article}
                <li>
                    <div class="research-img">
                        <img width="100%" height="100%" src="{$article.icon}" alt="">
                    </div>
                    <p class="research-title">{$article.title}</p>
                    <div class="research-details">
                        <p>{$article.content}</p>
                    </div>
                    <img src="{$article.pic}" alt="">
                </li>
                {/loop}

            </ul>
        </div>
    </div>
    <!-- 提交信息 客户案例 -->
    <div class="submitMes">
        <div class="wrap">
            <div class="submitContent">
                <div class="submit-lable">姓名：<input type="text"></div>
                <div class="submit-lable">电话：<input type="text" class="submit-num"></div>
                <div class="submit-lable">留言内容：<input type="text" class="submit-message"><button>提交</button>
                </div>
            </div>
            <div class="cooperation-first productCotent">
                <p class="coop-title">客户案例</p>
                <p class="coop-subtitle">Customer Cases</p>
                <p class="blankLine"></p>
            </div>
            <div class="submitList">
                <ul>
                    {$kuhu.cid=66618110}
                    {$kuhu.all=1}
                    {$kuhu.where.recommend=1}
                    {$kuhu.pagesize=20}
                    {$articles=a($kuhu)}
                    {loop $articles as $article}
                    <li>
                        <img width="100%" src="{$article.pic}" alt="">
                        <p class="submit-text">{$article.title}</p>
                    </li>
                    {/loop}

                </ul>
            </div>
        </div>
    </div>

    <div class="submitMesWap">
        {file submitMesWap}
    </div>

    <!-- 公司新闻 -->
    <div class="companyNews">
        <div class="wrap">
            <div class="companyContent">
                <div class="cooperation-first productCotent">
                    <p class="coop-title">公司新闻</p>
                    <p class="coop-subtitle">Company News</p>
                    <p class="blankLine"></p>
                </div>
                <div class="companyDetails">
                    {$news.cid=66618111}
                    {$news.all=1}
                    {$news.start=0}
                    {$news.where.recommend=1}
                    {$news.pagesize=1}
                    {$articles=a($news)}
                    {loop $articles as $article}
                    <div class="companyDetails-left">
                        <img src="{$article.pic}" alt="">
                        <p class="details-title">{$article.content}</p>

                        <button class="details-button"><a href="{$article.link}">查看更多></a></button>
                    </div>
                    {/loop}
                    <div class="companyDetails-right">
                        {$news.cid=66618111}
                        {$news.all=1}
                        {$news.start=1}
                        {$news.where.recommend=1}
                        {$news.pagesize=3}
                        {$articles=a($news)}
                        {loop $articles as $article}
                        <div class="companyList">
                            <div class="curren-content curren-left">
                                <p>{date(m-d,$article.datetime)}</p>
                                <p class="curren-content-eh">{date(Y,$article.datetime)}</p>
                            </div>
                            <div class="curren-content curren-right">
                                <p class="details-title">{text($article.title,20)}</p>
                                <p class="details-text">{$article.description}</p>
                            </div>
                        </div>
                        {/loop}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="companyNewsWap lib46083756_11wap1">
        <div class="sys_tit1 sysWapTitle">
            <h2>公司新闻</h2>
            <p>news</p>
        </div>
        <div class="nav">
            <ul></ul>
        </div>
        <div class="list">
            <div class="slidebox">
                <ul>
                    {$news.cid=66618111}
                    {$news.all=1}
                    {$news.start=0}
                    {$news.where.recommend=1}
                    {$news.pagesize=1}
                    {$articles=a($news)}
                    {loop $articles as $article}
                    <li style="min-height:150px">
                        <a href="/newsInfo?art_id=340672&amp;menu=71B0C8B3-44DA-E1F7-2610-70CDD3C0EBB6">
                            <div class="pic" style="
                                    background: url({$article.pic}) no-repeat center;
                                    background-size: cover;">
                                <img src="{$article.pic}" alt="">
                            </div>
                            <div class="textcon">
                                <p class="maintitle">
                                    {$article.content}
                                </p>
                                <!-- <p class="subtitle">
                                      
                                        </p> -->
                                <!-- <p class="time">
                                        <span class="date"> 25 </span><span class="month"> 2021-10 </span>
                                    </p> -->
                            </div>
                        </a>
                    </li>
                    {/loop}

                    {$news.cid=66618111}
                    {$news.all=1}
                    {$news.start=1}
                    {$news.where.recommend=1}
                    {$news.pagesize=3}
                    {$articles=a($news)}
                    {loop $articles as $article}
                    <li>
                        <a href="/newsInfo?art_id=340671&amp;menu=CB87B73E-E97D-0C02-B6E2-D9022303B8B8">
                            <div class="pic" style="
                    background: url(img/space.png) no-repeat center;
                    background-size: cover;
                  " data-url="//cdn.ilhjy.cn/514612381_shop_ilhjy_cn/public_html/runtime/uploads/8b0fc786929d2f54e7f2d4f36ee9882e.png">
                            </div>
                            <div class="textcon">
                                <p class="maintitle">
                                    {text($article.title,20)}
                                </p>
                                <p class="subtitle">
                                    {$article.description}
                                </p>
                                <p class="time">
                                    <span class="date"> {date(m-d,$article.datetime)}</span>
                                    <span class="month"> {date(Y,$article.datetime)}</span>

                                </p>
                            </div>
                        </a>
                    </li>
                    {/loop}
                </ul>
            </div>
        </div>
        <div class="more">
            <a class="partner-more" href="/news?menu_id=79899">read more</a>
        </div>
        <div class="clear"></div>
    </div>
    <!-- 底部 - common  -->
    {file footer}
</body>

</html>