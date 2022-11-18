<html>
{file header}

<body>

  {file nav}
  <!-- banner - common-->
  {file nav_banner}


  {file hot}
  {file bre}

  <!-- 产品列表 -->
  <div class="productBox">
    <div class="main">
      <div class="container ">
        <div class="row">
          <div class="col-12">
            <div class="product-list">
              <div class="classify clearfix">
                <ul>
                  {$test.all=1}
                  {$test.page=page}{//开启分页}
                  {$test.pagesize=12}{//每页显示10条}
                  {$articles=a($test)}
                  {loop $articles as $article}
                  <li>
                    <a href="{$article.link}">
                      <div class="image">
                        <img width="360" height="205" class="img" src="{$article.pic}" alt="">
                      </div>
                      <div class="text">
                        <div class="textCon">
                          <p>{date(Y-m-d,$article.datetime)}</p>
                          <h3>{$article.title}</h3>
                        </div>
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
                <a class="prepage" href="{$pageinfo.prev.link}" style="color: rgb(51, 51, 51);">上一页<span>←</span></a>
                {else}
                <a class="prepage" style="color: rgb(51, 51, 51);">上一页<span>←</span></a>
                {/if}
                <div class="jump-menus">
                  <select name="page_select" id="food_selection" onchange="location.href=this.value">
                    {loop $pages as $page}
                    <option label="{$page.title}" value="{$page.link}"><a href="{$page.link}">{$page.title}</a></option>
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
  </div>

  <!-- 底部 - common  -->
  {file footer}

</body>

</html>