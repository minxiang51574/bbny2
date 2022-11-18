<?php
if(!defined('ClassCms')) {exit();}
class articletags {
    function hook() {
        $hooks=array();
        $hooks[]=array('hookname'=>'tagWhere','hookedfunction'=>'cms:article:get','enabled'=>1,'requires'=>'args.1.tags');
        Return $hooks;
    }
    function install() {
        if(!C('cms:input:add','this:taginput')) {
            Return '安装失败';
        }
    }
    function tagWhere($config){
        if(!isset($config['tags']) || !is_array($config['tags']) || !count($config['tags'])){ return;}
        foreach ($config['tags'] as $column => $tags) {
            if(!is_array($tags)){$tags=explode(';',$tags);}
            for ($whereKey=1; $whereKey <1000; $whereKey++) {
                if(!isset($config['where'][$whereKey.';'])){break;}
            }
            $config['where'][$whereKey.';']=array();
            foreach ($tags as $tag) {
                if(!empty($tag)){
                    $config['where'][$whereKey.';'][]=array($column=>$tag);
                    $config['where'][$whereKey.';'][]=array($column.'%'=>$tag.';%');
                    $config['where'][$whereKey.';'][]=array($column.'%'=>'%;'.$tag.';%');
                    $config['where'][$whereKey.';'][]=array($column.'%'=>'%;'.$tag);
                }
            }
        }
        return array('cms:article:get',$config);
    }
    function autoTag($article,$columns=''){
        if(!$column=C('cms:form:build',@$article['_column']['id'])){
            return ;
        }
        $tags=array();
        if($column['channel']){
            $alltags=C('cms:article:get',array('cid'=>$column['channel'],'pagesize'=>9999,'column'=>'title'));
            if(empty($columns)){$columns='title';}
            $tagcolumns=explode('|',$columns);
            foreach ($tagcolumns as $key => $tagcolumn) {
                if(isset($article[$tagcolumn])){
                    foreach ($alltags as $key => $tag) {
                        if(isset($tag['title']) && stripos($article[$tagcolumn],$tag['title'])!==false){
                            $tags[]=$tag['title'];
                        }
                    }
                }
            }
        }
        return implode(';',array_unique($tags));
    }
    function taginput($action,$config=array()) {
        switch($action) {
            case "name":
                Return '文章标签';
            case "hash":
                Return 'articletags';
            case "group":
                Return '文章';
            case "sql":
                Return 'varchar(255)';
            case "form":
                if(!isset($config['auth']['list'])){
                    $config['auth']['list']=1;
                }
                $config['tags']=array();
                $tags=explode(';',$config['value']);
                foreach ($tags as $tag) {
                    if(!empty($tag)){$config['tags'][]=$tag;}
                }
                if(isset($config['source']) && ($config['source']=='admin_article_add' || $config['source']=='admin_article_edit')){
                    $config['autotags']=1;
                }else{
                    $config['autotags']=0;
                }
                V('template',$config);
                Return '';
            case "ajax":
                if($config['disabled']) {Return array('error'=>1,'msg'=>'无权限');}
                if(!$config['channel']){Return array('error'=>1,'msg'=>'未绑定栏目');}
                if(!$config['auth']['list']) {Return array('error'=>1,'msg'=>'无权限');}
                $pagesize=20;
                if(isset($_POST['searchtitle']) && !empty($_POST['searchtitle'])){
                    $pagesize=9999;
                }
                $articles=C('cms:article:get',array('cid'=>$config['channel'],'pagesize'=>$pagesize,'column'=>'title','page'=>intval($_POST['page'])));
                $pagecount=0;
                $html='';
                if(count($articles)==0) {
                    if(isset($_POST['searchtitle']) && !empty($_POST['searchtitle'])){
                        $html.='未能匹配 ';
                    }else{
                        $html.='暂无标签 ';
                    }
                }else {
                    pagelist();
                    $pageinfo=pageinfo();
                    if(isset($_POST['searchtitle']) && !empty($_POST['searchtitle'])){
                        $pageinfo['pagecount']=1;
                    }
                    if(isset($pageinfo['pagecount'])) {
                        $pagecount=$pageinfo['pagecount'];
                    }
                    if(!isset($articles[0]['title'])) {
                        $html.='无title字段 ';
                        $articles=array();
                    }elseif(isset($_POST['searchtitle']) && !empty($_POST['searchtitle'])){
                        foreach($articles as $key=>$article) {
                            if(stripos($_POST['searchtitle'],$article['title'])===false){
                                unset($articles[$key]);
                            }
                        }
                        if(count($articles)==0){
                            $html.='未能匹配 ';
                        }
                    }
                }
                foreach($articles as $article) {
                    $html.='<button type="button" class="layui-btn layui-btn-sm layui-btn-primary layui-border-blue">'.$article['title'].'</button> ';
                }
                Return array('error'=>0,'pagecount'=>$pagecount,'html'=>$html);
            case "post":
                $values=array();
                if(isset($_POST[$config['name']]) && is_array($_POST[$config['name']])){
                    foreach ($_POST[$config['name']] as $value) {
                        $value=trim($value);
                        if(!empty($value)){
                            if(stripos($value,';')!==false){
                                Return array('error'=>'不能包含 ; 符号');
                            }
                            $values[]=$value;
                        }
                    }
                    if($config['channel']){
                        foreach ($values as $key=>$value) {
                            if(!C('cms:article:getOne',array('cid'=>$config['channel'],'where'=>array('title'=>$value)))){
                                if($config['auth']['add']){
                                    if($config['autoadd']){
                                        if(!C('cms:article:add',array('cid'=>$config['channel'],'title'=>$value))){
                                            Return array('error'=>'保存失败:'.htmlspecialchars($value));
                                        }
                                    }
                                }else{
                                    Return array('error'=>'不存在:'.htmlspecialchars($value));
                                }
                            }
                        }
                        
                    }
                }
                if(count($values)){
                    return implode(';',$values);
                }
                return '';
            case "auth":
                Return array('list'=>'查看所有标签','add'=>'自动保存新标签');
            case "config":
                Return array(
                            array('configname'=>'标签栏目','hash'=>'channel','inputhash'=>'classchannel','tips'=>'将新增的标签保存至此栏目,栏目内需要有title字段存储标签名'),
                            array('configname'=>'自动保存','hash'=>'autoadd','inputhash'=>'switch','tips'=>'将新标签同步至标签栏目','defaultvalue'=>1)
                        );
        }
        Return false;
    }
}