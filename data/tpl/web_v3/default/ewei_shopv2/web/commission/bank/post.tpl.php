<?php defined('IN_IA') or exit('Access Denied');?><form <?php if(cv('commission.set.edit')) { ?>action="" method="post"<?php  } ?>  class="form-horizontal form-validate" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
<input type="hidden" name="r" value="commission.bank.<?php  if(empty($item['id'])) { ?>add<?php  } else { ?>edit<?php  } ?>" />
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h4 class="modal-title"><?php  if(!empty($item['id'])) { ?>编辑<?php  } else { ?>添加<?php  } ?>支持的银行</h4>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label class="col-sm-2 control-label must">银行名称</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if(cv('commission.set.edit')) { ?>
                    <input type="text" name="bankname" class="form-control" value="<?php  echo $item['bankname'];?>" data-rule-required='true'/>
                    <?php  } else { ?>
                    <div class='form-control-static'><?php  echo $item['bankname'];?></div>
                    <?php  } ?>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-2 control-label">状态</label>
                <div class="col-sm-9 col-xs-12">
                    <?php if(cv('commission.set.edit')) { ?>
                    <label class="radio-inline"><input type="radio"  name="status" value="1" <?php  if($item['status'] ==1) { ?> checked="checked"<?php  } ?> /> 启用</label>
                    <label class="radio-inline"><input type="radio"  name="status" value="0" <?php  if(empty($item['status'])) { ?> checked="checked"<?php  } ?> /> 禁用</label>
                    <?php  } else { ?>
                    <?php  if($item['status']==1) { ?>启用<?php  } else { ?>禁用<?php  } ?>
                    <?php  } ?>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <?php if(cv('commission.set.edit')) { ?>
            <button class="btn btn-primary" type="submit">提交</button>
            <?php  } ?>
            <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
        </div>
    </div>
</div>
</form>

