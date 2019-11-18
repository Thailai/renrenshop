<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">
    当前位置：<span class="text-primary">入口设置</span>
</div>
<div class="page-content">
    <form class="form-horizontal form-validate"  role="form" method="post" >
        <div class="form-group">
            <label class="col-lg control-label">直接链接</label>
            <div class="col-sm-9 col-xs-12">
                <p class='form-control-static'>
                    <a href='javascript:;' class="js-clip" title='点击复制链接' data-url="<?php  echo mobileUrl('task',null,true)?>" ><?php  echo mobileUrl('task',null,true)?></a>
                    <span style="cursor: pointer;" data-toggle="popover" data-trigger="hover" data-html="true"
                          data-content="<img src='<?php  echo $qrcode;?>' width='130' alt='链接二维码'>" data-placement="auto right">
                        <i class="glyphicon glyphicon-qrcode"></i>
                    </span>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label">背景图片</label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('task.edit')) { ?>
                <?php  echo tpl_form_field_image2('bgimg',$bgimg['bgimg'])?>
                <?php  } else { ?>
                <?php  if(!empty($bgimg['bgimg'])) { ?>
                <div class='form-control-static'>
                    <img src="<?php  echo tomedia($bgimg['bgimg'])?>" style='width:100px;border:1px solid #ccc;padding:1px' />
                </div>
                <?php  } ?>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label must">会员中心入口</label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('task.edit')) { ?>
                <label class="radio-inline">
                    <input type="radio" name="open" value="1" <?php  if($bgimg['open']) { ?>checked="checked"<?php  } ?>>开启
                </label>
                    <label class="radio-inline">
                        <input type="radio" name="open" value="0" <?php  if(!$bgimg['open']) { ?>checked="checked"<?php  } ?>>关闭
                    </label>
                <?php  } else { ?>

                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label must">关键词</label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('task.edit')) { ?>
                <input type='text' class='form-control' name='keyword' value="<?php  echo $set['keyword'];?>" data-rule-required="true" />
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $set['keyword'];?></div>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label">封面标题</label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('task.edit')) { ?>
                <input type='text' class='form-control' name='title' value="<?php  echo $set['title'];?>" />
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $set['title'];?></div>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label">封面图片</label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('task.edit')) { ?>
                <?php  echo tpl_form_field_image2('thumb',$set['thumb'])?>
                <?php  } else { ?>
                <?php  if(!empty($set['thumb'])) { ?>
                <div class='form-control-static'>
                    <img src="<?php  echo tomedia($set['thumb'])?>" style='width:100px;border:1px solid #ccc;padding:1px' />
                </div>
                <?php  } ?>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label">封面描述</label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('task.edit')) { ?>
                <textarea name='desc' class='form-control' rows="5"><?php  echo $set['desc'];?></textarea>
                <?php  } else { ?>
                <div class='form-control-static'><?php  echo $set['desc'];?></div>
                <?php  } ?>
            </div>
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


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
