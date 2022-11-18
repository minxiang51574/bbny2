<!--
 * @Author: Mx
 * @Date: 2022-11-14 21:42:11
 * @Description: 专属定制
-->
<html>
{file header}


<body>

    {file nav}
    <!-- banner - common-->
    {file nav_banner}
    <!-- 热门关键词 - common -->
    {file hot}
    <!-- 您的位置 - common -->
    {file bre}

    <!-- 内页方案 -->
    <div class="lib11380064_4">
        <div class="main">
            <div class="news_con">
                {file left_contact}
                <div class="news_main">
                    <!-- ReadedDataConfig  详情 [{ "path": "/service/cms_article/detail.html", "method": "post", "queryString":["art_id=<%=art_id%>"], "objName": "detail" }] -->
                    <div class="lib11380064_4news_info_detail" data-lib="page/news_info1/news_info_detail">
                        <!--文章详情-->
                        <div class="content">
                            <div class="news_tit">
                                <h3 class="news_hot" data-id="79894" data-artid="292562">{$title}</h3>
                                <div class="news_label"><span>日期：{date(Y-m-d,$datetime)}</span></div>
                            </div>
                            <div class="news_pro">
                                <div class="news_pcon">
                                    {$content}
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="jdtjs">
                                <div class="det_page">
                                    <div><span>上一篇</span>
                                        {$prevquery.cid=$cid}
                                        {$prevquery.all=0}
                                        {$prevquery.order=id asc}
                                        <?php
                                        $prevquery['where']['id>'] = $id;
                                        ?>
                                        {$prev=cms:article:getOne($prevquery)}
                                        {if $prev}
                                        <a href="{$prev.link}" title="{$prev.title}">{$prev.title}</a>
                                        {else}
                                        没有了
                                        {/if}

                                    </div>
                                    <div><span>下一篇</span>
                                        {$nextquery.cid=$cid}
                                        {$nextquery.all=0}
                                        {$nextquery.order=id desc}
                                        <?php
                                        $nextquery['where']['id<'] = $id;
                                        ?>
                                        {$next=cms:article:getOne($nextquery)}
                                        {if $next}
                                        <a href="{$next.link}" title="{$next.title}">{$next.title}</a>
                                        {else}
                                        没有了
                                        {/if}
                                    </div>
                                </div>
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
                                            <a href="/newsInfo?art_id=340614&amp;menu_id=79919&amp;menu=CB87B73E-E97D-0C02-B6E2-D9022303B8B8"
                                                class="dt_tit">{$article.title}
                                            </a>
                                            <a href="/newsInfo?art_id=340614&amp;menu_id=79919&amp;menu=CB87B73E-E97D-0C02-B6E2-D9022303B8B8"
                                                class="dt_more">查看详情 &gt;
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



    <!-- 底部 - common  -->
    {file footer}
</body>

</html><!-- 脚本开始 -->