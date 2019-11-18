<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">
    当前位置：<span class="text-primary">银行设置</span>
</div>
<div class="page-content">
    <div class="page-toolbar">
        <span class='pull-left'>
            <?php if(cv('commission.set.edit')) { ?>
                <a class='btn btn-primary btn-sm' data-toggle='ajaxModal' href="<?php  echo webUrl('commission/bank/add')?>"><i class="fa fa-plus"></i> 添加支持的银行</a>
            <?php  } ?>
        </span>
    </div>
    <form action="" method="post">
    <?php  if(count($list)>0) { ?>
    <table class="table table-hove table-responsive">
        <thead class="navbar-inner">
        <tr>
            <th style='width:100px'>顺序</th>
            <th style='width:200px'>银行名称</th>
            <th style='width:200px;'>状态</th>
            <th style='width:200px'>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php  if(is_array($list)) { foreach($list as $item) { ?>
        <tr>
            <td>
                <?php if(cv('commission.set.edit')) { ?>
                <a href='javascript:;' data-toggle='ajaxEdit' data-href="<?php  echo webUrl('commission/bank/displayorder',array('id'=>$item['id']))?>" ><?php  echo $item['displayorder'];?></a>
                <?php  } else { ?>
                <?php  echo $row['displayorder'];?>
                <?php  } ?>
            <td><?php  echo $item['bankname'];?></td>

            <td>
                <span class='label <?php  if($item['status']==1) { ?>label-success<?php  } else { ?>label-default<?php  } ?>'
                <?php if(cv('commission.set.edit')) { ?>
                data-toggle='ajaxSwitch'
                data-switch-value='<?php  echo $item['status'];?>'
                data-switch-value0='0|禁用|label label-default|<?php  echo webUrl('commission/bank/status',array('status'=>1,'id'=>$item['id']))?>'
                data-switch-value1='1|启用|label label-success|<?php  echo webUrl('commission/bank/status',array('status'=>0,'id'=>$item['id']))?>'
                <?php  } ?>>
                <?php  if($item['status']==1) { ?>启用<?php  } else { ?>禁用<?php  } ?></span>

            </td>
            <td style="text-align:left;">
                <?php if(cv('commission.set.edit')) { ?>
                <a href="<?php  echo webUrl('commission/bank/edit', array('id' => $item['id']))?>" data-toggle='ajaxModal' class="btn btn-default btn-sm" >
                    <i class='fa fa-edit'></i><?php if(cv('commission.set.edit')) { ?>修改<?php  } else { ?>查看<?php  } ?>
                </a>
                <?php  } ?>
                <?php if(cv('commission.set.edit')) { ?>
                <a data-toggle='ajaxRemove' href="<?php  echo webUrl('commission/bank/delete', array('id' => $item['id']))?>"class="btn btn-default btn-sm" data-confirm='确认要删除此银行吗?'><i class="fa fa-trash"></i> 删除</a>
                <?php  } ?>
            </td>
        </tr>
        <?php  } } ?>

        </tbody>
    </table>

    <?php  } else { ?>
    <div class='panel panel-default'>
        <div class='panel-body' style='text-align: center;padding:30px;'>
            暂时没有支持的银行!
        </div>
    </div>
    <?php  } ?>
</form>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>