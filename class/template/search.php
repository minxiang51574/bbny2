<html>

{file header}

<body>

  {file nav}


  {file nav_banner}



  {file hot}
  {file bre}

                {$articlelist.modulehash=product}{//搜索article文章模型}
                {$articlelist.page=page}{//开启分页}
                {$articlelist.pagesize=1}{//每页显示10条}
                <?php
                //只搜索标题:
                $articlelist['where']['title%']=htmlspecialchars($_GET['search_key']);
                // print_r($articlelist)
                ?>
                {$articles=a($articlelist)}

  <div class="serachBox">
    <div class="main">
      <div class="search_con">
        <div class="search_list">
          <div class="result">相关搜索结果：共计{count($articles)}个</div>
          {if count($articles)}

          <div class="search news_both" data-pcount="1" data-total="76">
            <ul class="ulist">
             {loop $articles as $article}
              <li><a href="{$article.link}">
                  <div class="pic"><i style="background:url({$article.pic}) no-repeat center; background-size: cover;"></i>
                  </div>
                  <div class="dt_con">
                    <h5>{$article.title}</h5>
                    <p class="dt_p">
                    {$article.description}
                    </p>
                    <em>
                      <i class="date">{date(Y-m-d,$article.datetime)}</i>
                    </em>
                  </div><span>查看详情</span>
                </a></li>
                {/loop}
                
            </ul>
            <div id="changpage"></div>
          </div>
          {else}
                <div class="tips"><img src="https://sjzz.ilhjy.cn/u0rkpw/202003/icon1583465772669.png"> 请更换关键词重新搜索 </div>
           {/if}
    {file pagination}

        </div>
      </div>

    </div>
  </div>

  <!-- 底部 - common  -->
  {file footer}

</body>

</html>