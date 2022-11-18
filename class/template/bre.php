 <!-- 您的位置 - common -->
 <div class="common-position">
        <div class="crumbs">
            <div class="wrap">
                <em>您的位置：</em>
                {loop bread() as $bread}
                <a href="{$bread.link}">{$bread.channelname}</a>
               {/loop}
            </div>
        </div>
    </div>