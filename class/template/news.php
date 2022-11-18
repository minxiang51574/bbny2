<!--
 * @Author: Mx
 * @Date: 2022-11-14 21:42:11
 * @Description: 企业动态 新闻资讯
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

    <!-- 您的位置 - common -->
    {file bre}
    <!-- 内页方案 -->
    <div class="lib62156920_3">
        <div class="nav">
            <div class="lib62156920_3category">
                <div class="categoryBg">
                    <div class="cate"><span data-id="79899"></span>
                        <ul>
                            {loop nav(66618111,999) as $nav}
                            <li class="clearfix">
                                <a class="{if $nav.active}active {/if}" href="{$nav.link}">{$nav.channelname}</a>
                            </li>
                            {/loop}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="container clearfix">
                <div class="row">
                    <div class="col-12">
                        <div class="lib62156920_3list2">
                            <div class="classify2 clearfix" data-pcount="11" data-total="62">
                                <ul>
                                    {$test.all=1}
                                    {$test.page=page}{//开启分页}
                                    {$test.pagesize=12}{//每页显示10条}
                                    {$articles=a($test)}
                                    {loop $articles as $article}
                                    <li>
                                        <a href="{$article.link}">
                                            <div class="image">
                                                <div class="img" style="background-image: url({$article.pic});">
                                                </div>
                                            </div>
                                            <div class="text">
                                                <div class="textCon">
                                                    <h3>{$article.title}</h3>
                                                    <p>
                                                        {$article.content}
                                                    </p>
                                                </div>
                                                <div class="moreBox clearfix"><span class="time">
                                                        {date(Y-m-d,$article.datetime)}
                                                    </span><span class="column"></span><span class="more">Read More
                                                        &gt;</span></div>
                                            </div>
                                        </a>
                                    </li>
                                    {/loop}

                                </ul>
                            </div>
                            {$pages=pagelist()}
                            {$pageinfo=pageinfo()}
                            <div class="pagination">
                                {if isset($pageinfo.prev.link)}
                                <a class="prepage" href="{$pageinfo.prev.link}"
                                    style="color: rgb(51, 51, 51);">上一页<span>←</span></a>
                                {else}
                                <a class="prepage" style="color: rgb(51, 51, 51);">上一页<span>←</span></a>
                                {/if}
                                <div class="jump-menus">
                                    <select name="page_select" id="food_selection" onchange="location.href=this.value">
                                        {loop $pages as $page}
                                        <option label="{$page.title}" value="{$page.link}"><a
                                                href="{$page.link}">{$page.title}</a></option>
                                        {/loop}
                                    </select>/ {$pageinfo.page}
                                </div>
                                {if isset($pageinfo.next.link)}
                                <a class="nextpage" style="color: rgb(153, 153, 153);"
                                    href="{$pageinfo.next.link}">下一页<span>→</span></a>
                                {else}
                                <a class="nextpage" style="color: rgb(153, 153, 153);">下一页<span>→</span></a>

                                {/if}
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 底部 - common  -->
    {file footer}
</body>

</html>