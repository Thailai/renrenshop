<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
    <label class="col-lg control-label">任务说明标题</label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <input class="form-control" type="text" name="taskinfotitle" value="<?php  if(!empty($res['taskinfotitle'])) { ?><?php  echo $res['taskinfotitle'];?><?php  } else { ?>任务说明<?php  } ?>" >
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(!empty($res['taskinfotitle'])) { ?><?php  echo $res['taskinfotitle'];?><?php  } else { ?>暂无标题<?php  } ?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">任务说明</label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
            <?php  if(!empty($res['taskinfo'])) { ?>
            <?php  echo tpl_ueditor('taskinfo',unserialize($res['taskinfo']),array('height'=>'300'))?>
            <?php  } else { ?>
            <?php  echo tpl_ueditor('taskinfo','暂无说明',array('height'=>'300'))?>
            <?php  } ?>
        <?php  } else { ?>
        <textarea id='detail' style='display:none'><?php  if(!empty($res['taskinfo'])) { ?><?php  echo $res['taskinfo'];?><?php  } else { ?>暂无说明<?php  } ?></textarea>
        <a href='javascript:preview_html("#detail")' class="btn btn-default">查看内容</a>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">任务等级标题</label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <input class="form-control" type="text" name="taskranktitle" value="<?php  if(!empty($res['taskranktitle'])) { ?><?php  echo $res['taskranktitle'];?><?php  } else { ?>等级<?php  } ?>" >
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(!empty($res['taskranktitle'])) { ?><?php  echo $res['taskranktitle'];?><?php  } else { ?>暂无等级标题<?php  } ?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">任务等级类型</label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <select class="input-sm form-control input-s-sm inline" name="taskranktype" >
            <option value="0" >等级类型</option>
            <option value="1" <?php  if($res['taskranktype']==1) { ?>selected="selected"<?php  } ?>>阿拉伯数字</option>
            <option value="2" <?php  if($res['taskranktype']==2) { ?>selected="selected"<?php  } ?>>罗马数字</option>
            <option value="3" <?php  if($res['taskranktype']==3) { ?>selected="selected"<?php  } ?>>英文字母</option>
        </select>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(!empty($res['taskranktype'])) { ?><?php  if($res['taskranktype']==1) { ?>阿拉伯数字<?php  } else if($res['taskranktype']==2) { ?>罗马数字<?php  } else if($res['taskranktype']==3) { ?>英文字母<?php  } ?><?php  } ?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">同时领取不同类型海报</label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <label class="radio-inline">
            <input type="radio" name="is_posterall" value="1" <?php  if(!empty($res)&&$res['is_posterall']==1) { ?>checked<?php  } ?> /> 启用
        </label>
        <label class="radio-inline">
            <input type="radio" name="is_posterall" value="0"  <?php  if(empty($res)||$res['is_posterall']==0) { ?>checked<?php  } ?> /> 禁用
        </label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if($res['is_posterall']==0) { ?>禁用<?php  } else { ?>启用<?php  } ?></div>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">是否添加底部菜单</label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <label class="radio-inline">
            <input type="radio" name="menu_state" value="1" <?php  if(!empty($res)&&$res['menu_state']==1) { ?>checked<?php  } ?> /> 启用
        </label>
        <label class="radio-inline">
            <input type="radio" name="menu_state" value="0" <?php  if(empty($res)||$res['menu_state']==0) { ?>checked<?php  } ?> /> 禁用
        </label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if($res['menu_state']==0) { ?>禁用<?php  } else { ?>启用<?php  } ?></div>
        <?php  } ?>
    </div>
</div>
