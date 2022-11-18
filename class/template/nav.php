<div
  class="lib40917467_3"
>
  <div class="t-nav">
    <div class="menu">
      <a class="logo" href="/"><img src="{$.0.logo_img}" alt="img"></a>
      <ul>

      
      {loop nav() as $nav}

        <li class="{if $nav.active} active{/if}">
          <a  href="{$nav.link}">{$nav.channelname}</a>
          {$navs2=nav($nav.id)}
                {if count($navs2)}
          <div class="erjp ">
          {loop $navs2 as $nav2}
                    <a href="{$nav2.link}">{$nav2.channelname}</a>
                    {/loop}
          </div>
          {/if}

        </li>
        {/loop}
      </ul>
    </div>
    <div class="erjsv"></div>
  </div>
</div>
<!-- 响应式处理 -->
<div class="lib40917467_3wap1 lib40917467_3wap1header">
    <div class="wrap">
        <div class="logo"><a href=""></a></div>
        <span class="nav_toggle"><em></em></span><span class="icon_toggle"><em></em></span>
    </div>
    <div class="nav">
        <div class="wrap_nav">
            <ul>
            <ul>
            {loop nav() as $nav}
            <li class="clearfix">
                    <a href="{$nav.link}">{$nav.channelname}</a>
                {if count($navs2)}
                    <div class="subnav">
                    {loop $navs2 as $nav2}
                    <a href="{$nav2.link}">{$nav2.channelname}</a>
                    {/loop}
                    </div>
                    <span class="nav_add"></span>
                {/if}
                </li>
            </li>
            {/loop}
            </ul>
            </ul>
        </div>
    </div>
    <div class="searchbar">
        <div class="search">
            <input type="text" name="search_key" placeholder="输入关键字" id="sear_text" />
            <input type="button" value="" class="bmit" id="search_btn" />
            <span class="icon"><em></em></span>
        </div>
    </div>
    <div class="overlay"></div>
</div>