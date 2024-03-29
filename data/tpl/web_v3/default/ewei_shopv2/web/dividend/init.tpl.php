<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">

    .page-content.step-two .inner{
        width: 574px;
        margin: 0 auto;
    }

    .page-content.step-two.step-two-b{
        display: none;
        text-align: center;
        padding-top: 70px;
        color: #000;
    }
    .step-two-b .progressbar{
        width: 350px;
        position: relative;
        border-top: 1px solid #f0f0f0;
        display: inline-block;
        margin-top: 50px;
    }
    .step-two-b .progressbar .line{
        width: 0%;
        height: 7px;
        background: #ffc730;
        border-radius: 4px;
        position: relative;
        left: 0;
        top: -4px;
        z-index: 9;
        transition: width 1s linear;
    }

</style>

<div class="page-header">
    当前位置：
    <span class="text-primary">初始化团队分红</span>
</div>
<div class="page-content step">
    <div class="alert alert-primary">
        <p><b>初始化说明</b></p>
        <p>为确保您的关系树显示完整，请先点击初始化。</p>
    </div>
</div>

<!--第二步 01-->
<div class="page-content step-two step-two-a" style="margin-top: 20px;">
    <div class="inner">
        <div class="button" style="padding: 36px 0 36px 200px;">
            <input type="submit" data-pagecount="<?php  echo $page_count;?>" value="立即初始化" class="btn btn-primary init"/>
        </div>
    </div>
</div>

<!--第二步 02-->
<div class="page-content step-two step-two-b" style="margin-top: 20px;">
    <div class="inner">
        <img src="../addons/ewei_shopv2/plugin/app/static/images/upload.png"  id="showimgurl" style="width: 100px;height: 100px;"></br>
        <div class="progressbar"><div class="line" data-width="1"></div></div>
        <div style="margin: 40px 0 120px">正在初始化，请等待...</div>
    </div>
</div>



<script type="text/javascript">


    // 第二步 上传
    $(".init").click(function () {

        $('.step-two-b').css('display','block');
        $('.step-two-a').css('display','none');
        var pagecount=$(this).data("pagecount");

//        ajax_init
        for (var i = 1; i <= pagecount; i++) {
            ajax_init(i,pagecount);
            progress(parseInt(100/pagecount*i));

        }
    });
    

    //控制进度条
    function progress(num) {
        var width=$(".step-two-b .progressbar .line").data("width");
        var settime=setInterval(function () {
            width++;
            $('.step-two-b .progressbar .line').css('width',width+'%');
            if(width==num){
                $(".step-two-b .progressbar .line").data("width",width);
                clearInterval(settime);
            }
        },10);
    }

    //ajax提交
    function ajax_init(pindex,pagecount) {
        setTimeout(function() {
            $.ajax({
                url:"<?php  echo webUrl('dividend/init')?>",
                type:'post',
                data:{page:pindex},
                async : false,
                dataType: 'json',
                success:function(data){
                    if(pagecount==data.result.pindex && data.status==1){
                        setTimeout(function () {
                            $('.step-two-b').css('display','none');
                            tip.msgbox.suc("初始化成功！");
                            location.reload();
                        },1000);
                    }

                    if(data.status==-1){
                        tip.msgbox.suc(data.result.message,"<?php  echo webUrl('dividend/init')?>");
                    }
                    return true;
                }
            });
        },1000);
    }

</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>