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