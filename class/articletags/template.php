<?php if(!defined('ClassCms')) {exit();}?>
<div style="padding-top:5px">
    <span id="{$name}_taglist">
    {if !count($tags) && !$disabled}
        <div class="layui-input-inline" style="position: relative;width:100px;padding-bottom:3px"><input type="text" name="{$name}[]" value="" class="layui-input" style="width:100%;height:30px;font-size:12px;padding-right:22px"><i class="layui-icon layui-icon-close" style="position:absolute;right:4px;top:4px;font-size:16px;cursor:pointer"></i></div>
    {/if}
    {loop $tags as $tag}
        <div class="layui-input-inline" style="position: relative;width:100px;padding-bottom:3px"><input {if $disabled}readonly{/if} type="text" name="{$name}[]" value="{$tag}" class="layui-input" style="width:100%;height:30px;font-size:12px;padding-right:22px"><i class="layui-icon layui-icon-close" style="position:absolute;right:4px;top:4px;font-size:16px;cursor:pointer"></i></div>
    {/loop}
    </span>
    {if !$disabled}
        <button type="button" class="layui-btn layui-btn-sm layui-btn-primary layui-border-blue {$name}_tagadd"><i class="layui-icon layui-icon-add-1"></i></button>
        {if $channel && $auth.list}
        <button type="button" class="layui-btn layui-btn-sm layui-btn-primary layui-border-blue {$name}_tagshow"><i class="layui-icon layui-icon-note"></i></button>
        {/if}
    {/if}
</div>
{if !$disabled && $auth.list}
    <table id="{$name}_articletable" class="layui-table" style="width:100%;max-width:500px;display:none" lay-size="sm">
    <thead class="action">
        <tr>
            <td>
                <span class="refresh"><a style="color:#1E9FFF;cursor: pointer;"><i class="layui-icon layui-icon-refresh"></i> </a></span>
                {if $autotags}<span class="autotags" rel="0" style="display:none"><a style="cursor:pointer;padding-left:5px"><i class="layui-icon layui-icon-transfer"></i> </a></span>{/if}
                <span class="next" style="float:right;padding-left: 10px"><a style="color: #1E9FFF;cursor: pointer;">下一页&gt;</a></span>
                <span class="page" style="float:right;padding-left: 10px">0/0</span>
                <span class="prev" style="float:right"> <a style="color: #1E9FFF;cursor: pointer;">&lt;上一页</a></span>
            </td>
        </tr>
    </thead>
    <tbody class="article_list" id="{$name}_tbody">
        <tr>
            <td></td>
        </tr>
    </tbody>
    </table>
    <input id="{$name}_choose_page" type="hidden" value="1">
    {if $autotags}<input id="{$name}_searchtitle" type="hidden" value="">{/if}
    <input id="{$name}_choose_pagecount" type="hidden" value="0">
    <div class="layui-clear"></div>
{/if}
<script>
layui.use(['index','sortable'],function(){
    var $ = layui.$;
    function strwidth(str){
        length=0;
        for(i=0;i<str.length;i++){
            if(str.charAt(i).charCodeAt(0)>255) {
                length += 2;
            }else {
                length++;
            }
        }
        length=length*10;
        if (length<100) {length=100;}
        if (length>200) {length=200;}
        return length;
    }
    function autowidth(){
        $('#{$name}_taglist div').each(function(){
            $(this).width(strwidth($(this).find('input').val())+'px');
        });
    }
    autowidth();
    {if !$disabled}
        function {$name}_loadtags(){
            layui.admin.req({type:'post',url:"{$ajax_url}",data:{page:$('#{$name}_choose_page').val(){if $autotags},searchtitle:$('#{$name}_searchtitle').val(){/if}},async:true,beforeSend:function(){
                $('#{$name}_articletable span.refresh').html('<i class="layui-icon layui-icon-loading-1 layui-icon layui-anim layui-anim-rotate layui-anim-loop"></i>');
            },done: function(res){
                $('#{$name}_articletable span.refresh').html('<a style="color: #1E9FFF;cursor: pointer;"><i class="layui-icon layui-icon-refresh"></i> </a>');
                if (res.error==0)
                {
                    $('#{$name}_articletable tbody.article_list td').html(res.html);
                    $('#{$name}_choose_pagecount').val(res.pagecount);
                    if (res.pagecount==0)
                    {
                        $('#{$name}_articletable span.page').html('0/0');
                    }else{
                        $('#{$name}_articletable span.page').html($('#{$name}_choose_page').val()+'/'+res.pagecount);
                    }
                }
            }});
        }
        $('#{$name}_articletable thead').on('click','span.refresh',function(){
            {if $autotags}
            if ($('#{$name}_articletable .autotags').attr('rel')=='1') {
                $('#{$name}_searchtitle').val($('input[name=title]').val());
            }
            {/if}
            {$name}_loadtags();
        });
        {if $autotags}
        $('#{$name}_articletable thead').on('click','span.autotags',function(){
            if ($('#{$name}_articletable .autotags').attr('rel')=='0') {
                if($('input[name=title]').val()==''){
                    layui.layer.msg('标题为空,未能自动匹配');
                    return ;
                }
                $('#{$name}_searchtitle').val($('input[name=title]').val());
                $('#{$name}_articletable .autotags').attr('rel','1');
                $('#{$name}_articletable .autotags a').css('color','#1E9FFF');
            }else{
                $('#{$name}_searchtitle').val('');
                $('#{$name}_articletable .autotags a').css('color','#333');
                $('#{$name}_articletable .autotags').attr('rel','0');
            }
            {$name}_loadtags();
        });
        {/if}
        $('#{$name}_articletable thead').on('click','span.prev',function(){
            if (parseInt($('#{$name}_choose_page').val())>1)
            {
                $('#{$name}_choose_page').val(parseInt($('#{$name}_choose_page').val())-1);
                {$name}_loadtags();
            }
        });
        $('#{$name}_articletable thead').on('click','span.next',function(){
            if (parseInt($('#{$name}_choose_page').val())<parseInt($('#{$name}_choose_pagecount').val()))
            {
                $('#{$name}_choose_page').val(parseInt($('#{$name}_choose_page').val())+1);
                {$name}_loadtags();
            }
            
        });
        function addtag(tag){
            if (tag!='') {
                tagcheck=0;
                $('#{$name}_taglist div input').each(function(){
                    if ($(this).val()==tag) {
                        $(this).focus();
                        tagcheck=1;
                    }
                });
                if (tagcheck) {
                    return false;
                }
            }
            $('#{$name}_taglist').append('<div class="layui-input-inline" style="position: relative;width:100px;padding-bottom:3px"><input {if isset($disabled) && $disabled}readonly{/if} type="text" name="{$name}[]" value="'+tag+'" class="layui-input" style="width:100%;height:30px;font-size:12px;padding-right:22px"><i class="layui-icon layui-icon-close" style="position:absolute;right:4px;top:4px;font-size:16px;cursor:pointer"></i></div>');
            if (tag=='') {
                $('#{$name}_taglist input').last().focus();
            }
        }
        $('#{$name}_taglist').on('input','input',function(){
            $(this).parent().width(strwidth($(this).val())+'px');
        });
        $('#{$name}_taglist').on('keyup','input',function(event){
            if (event.which==13) {
                if ($(this).parent().next().length>0) {
                    $(this).parent().next().find('input').focus();
                }else{
                    addtag('');
                }
            }else if(event.which==8 || event.which==46){
                if ($(this).val().length==0 && $(this).parent().siblings().length>0) {
                    $(this).parent().prev().find('input').focus();
                    $(this).parent().remove();
                }
            }
        });
        $('#{$name}_taglist').on('click','.layui-icon',function(){
            $(this).parent().remove();
        });
        $('#{$name}_tbody').on('click','button',function(){
            addtag($(this).text());
        });
        $('.{$name}_tagadd').click(function(){
            addtag('');
        });
        new Sortable({$name}_taglist, {handle: '.layui-icon'});
        $('.{$name}_tagshow').click(function(){
            if ($(this).hasClass('layui-btn-primary')) {
                $(this).addClass('cms-btn').removeClass('layui-btn-primary');
                {if $autotags}
                $('#{$name}_searchtitle').val('');
                $('#{$name}_articletable .autotags a').css('color','#333');
                $('#{$name}_articletable .autotags').attr('rel','0');
                if($('input[name=title]').length==1){
                    $('#{$name}_articletable .autotags').show();
                }else{
                    $('#{$name}_articletable .autotags').hide();
                }
                {/if}
                {$name}_loadtags();
                $('#{$name}_articletable').show();
            }else{
                $(this).addClass('layui-btn-primary').removeClass('cms-btn');
                $('#{$name}_articletable').hide();
            }
        });
    {/if}
});
</script>