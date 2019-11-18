<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">
    当前位置：<span class="text-primary">任务默认设置</span>
</div>
    <div class="page-content">
            <ul class="nav nav-arrow-next nav-tabs" id="settingTab">
                <li class="active"><a href="#tab_syssett">系统设置</a></li>
                <li ><a href="#tab_setting">海报通知设置</a></li>
            </ul>

        <form class="form-horizontal form-validate"  role="form" method="post" id="poster_form">
            <div class="tab-content">
                <div class="tab-pane active" id="tab_syssett"  ><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('task/default/system', TEMPLATE_INCLUDEPATH)) : (include template('task/default/system', TEMPLATE_INCLUDEPATH));?></div>
                <div class="tab-pane" id="tab_setting"  ><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('task/default/poster', TEMPLATE_INCLUDEPATH)) : (include template('task/default/poster', TEMPLATE_INCLUDEPATH));?></div>
            </div>
            <?php if(cv('task.default.edit|task.default.add')) { ?>
            <div class="form-group">
                <label class="col-lg control-label"></label>
                <div class="col-sm-10 col-xs-12">
                    <button type="submit" class="btn btn-primary">提交</button>
                </div>
            </div>
            <?php  } ?>
        </form>
    </div>
<script type="text/javascript">
    require(['bootstrap'],function(){
        $('#settingTab a').click(function (e) {
            e.preventDefault();
            $('#tab').val( $(this).attr('href'));
            $(this).tab('show');
        })
    });
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
