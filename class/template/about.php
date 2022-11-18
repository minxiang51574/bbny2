<!--
 * @Author: Mx
 * @Date: 2022-11-14 21:42:11
 * @Description: 产品介绍 九味牛tab
-->
<!DOCTYPE html>
<html lang="en">

{file header}

<body>


    {file nav}
    <!-- banner - common-->
    {file nav_banner}
    <!-- 热门关键词 - common -->
    {file hot}
    {file bre}

    <!-- 内页方案 -->
    <div class="lib11380064_4 ">
        <div class="main">
            <div class="news_con">
                {file left_contact}
                <div class="news_main">
                    <div class="lib11380064_4news_info_detail">
                        <!--文章详情-->
                        <div class="content">
                            <div class="news_tit">
                                <h3 class="news_hot" data-id="79894" data-artid="292562">{$.title}</h3>

                            </div>
                            <div class="news_pro">
                                <div class="news_pcon aboutP">
                                    {$.content}
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="news_hotnews_hot" data-lib="page/news_info1/news_hot">
                                <div class="news_list">
                                    <div class="title"><span>热门资讯</span><i> / hotnews</i></div>
                                    <ul>
                                        {$test.cid=66618111}
                                        {$test.where.recommend=1}
                                        {$test.all=1}
                                        {$test.pagesize=6}
                                        {$articles=a($test)}
                                        {loop $articles as $article}
                                        <li>
                                            <a href="{$article.link}" class="dt_tit">{$article.title}
                                            </a>
                                            <a href="{$article.link}" class="dt_more">查看详情 &gt;
                                            </a>
                                        </li>
                                        {/loop}
                                    </ul>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <!--文章详情-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="lib01530112_4wap1 lib01530112_4wap">
        <div class="news_pro">
            <div class="news_pro">
                <div class="news_pcon">
                    {$.content}
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>

    {file footer}

</body>

</html>