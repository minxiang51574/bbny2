{if isset($_POST['phone']) && !empty($_POST['phone'])}
{$newarticle=array()}
{$newarticle['cid']=66618126} {//提交的数据存储到某个栏目中}
{$newarticle['phone']=htmlspecialchars($_POST["phone"])}
{$newarticle['name']=htmlspecialchars($_POST["name"])}
{$newarticle['description']=htmlspecialchars($_POST["description"])}
{$newarticle['update_time']=date(Y-m-d)}
{$id=cms:article:add($newarticle)}
{if $id}
    留言成功
{else}
    留言失败
{/if}
{/if}