<!-- 热门关键词 - common -->
<div class="content hotKeyword-text-box">
    <div class="content-wrap">
        <div class="wrap">
            <div class="hotKeyword-text">
                <h5>热门关键词:</h5>
                <ul>
                    <div class="tagcloud">

                        {$articlelist.modulehash=tags}
                        {$articles=a($articlelist)}
                        {loop $articles as $article}
                        <li><a href="/search?search_key={$article.title}">{$article.title}</a></li>
                        {/loop}


                </ul>

                <div class="phone cell">{$.0.phone} </div>
            </div>
            <form class="hotKeyword-input" action="/search" method="get">
                <input class="" name="search_key" placeholder="请输入关键字" type="text">
                <i class="basec searchBtn" type="submit" value="">
                    <input type="hidden" name="" value="">
            </form>
        </div>
    </div>
</div>