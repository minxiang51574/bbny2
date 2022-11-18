<div class="list">
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