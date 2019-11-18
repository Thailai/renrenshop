<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group">
    <label class="col-lg control-label">上级分销商</label>
    <div class="col-sm-9 col-xs-12">
        <input type="hidden" value="<?php  echo $member['agentid'];?>" id='agentid' name='adata[agentid]' class="form-control"  />

        <?php if(cv('commission.agent.changeagent')) { ?>

        <?php if(cv('commission.agent.edit')) { ?>
        <div class='input-group'>
            <input type="text" name="parentagent" value="<?php  if(!empty($parentagent)) { ?><?php  echo $parentagent['nickname'];?>/<?php  echo $parentagent['realname'];?>/<?php  echo $parentagent['mobile'];?><?php  } ?>" id="parentagent" class="form-control" readonly />
            <div class='input-group-btn'>
                <button class="btn btn-default" type="button" onclick="chooseAgent()">选择上级分销商</button>
                <button class="btn btn-danger" type="button" onclick="clearAgent()">清除选择</button>
            </div>
        </div>
        <span id="parentagentavatar" class='help-block' <?php  if(empty($parentagent)) { ?>style="display:none"<?php  } ?>><img  style="width:100px;height:100px;border:1px solid #ccc;padding:1px" src="<?php  echo tomedia($parentagent['avatar'])?>"/></span>

        <div id="modal-module-menus-notice"  class="modal fade" tabindex="-1">
            <div class="modal-dialog" style='width: 920px;'>
                <div class="modal-content">
                    <div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>选择上级分销商</h3></div>
                    <div class="modal-body" >
                        <div class="row">
                            <div class="input-group">
                                <input type="text" class="form-control" name="keyword" value="" id="search-kwd-notice" placeholder="请输入分销商昵称/姓名/手机号" />
                                <span class='input-group-btn'><button type="button" class="btn btn-default" onclick="search_members();">搜索</button></span>
                            </div>
                        </div>
                        <div id="module-menus-notice" style="padding-top:5px;"></div>
                    </div>
                    <div class="modal-footer"><a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a></div>
                </div>

            </div>
        </div>

        <span class="help-block">修改后， 只有关系链改变, 以往的订单佣金都不会改变,新的订单才按新关系计算佣金 ,请谨慎选择</span>
        <?php  } else { ?>
        <div class='form-control-static'>
            <?php  if(!empty($parentagent)) { ?><img  style="width:100px;height:100px;border:1px solid #ccc;padding:1px" src="<?php  echo $parentagent['avatar'];?>"/><?php  } else { ?>无<?php  } ?>
        </div>
        <?php  } ?>

        <?php  } else { ?>
        <div class='form-control-static'>
            <input type="hidden" value="<?php  echo $member['agentid'];?>" id='agentid' name='adata[agentid]' class="form-control"  />
            <?php  if(!empty($parentagent)) { ?><img  style="width:100px;height:100px;border:1px solid #ccc;padding:1px" src="<?php  echo tomedia($parentagent['avatar'])?>"/><?php  } else { ?>无<?php  } ?>
        </div>
        <?php  } ?>

    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">是否固定上级</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('commission.agent.changeagent')) { ?>
        <?php if(cv('commission.agent.check')) { ?>
        <label class="radio-inline"><input type="radio" name="adata[fixagentid]" value="1" <?php  if($member['fixagentid']==1) { ?>checked<?php  } ?>>是</label>
        <label class="radio-inline" ><input type="radio" name="adata[fixagentid]" value="0" <?php  if($member['fixagentid']==0) { ?>checked<?php  } ?>>否</label>
        <span class="help-block">固定上级后，任何条件也无法改变其上级，如果不选择上级分销商，且固定上级，则上级永远为总店（是分销商）或无上线（非分销商）</span>
        <?php  } else { ?>
        <input type='hidden' name='adata[fixagentid]' value='<?php  echo $member['fixagentid'];?>' />
        <div class='form-control-static'><?php  if($member['fixagentid']==1) { ?>是<?php  } else { ?>否<?php  } ?></div>
        <?php  } ?>
        <?php  } else { ?>
        <input type='hidden' name='adata[fixagentid]' value='<?php  echo $member['fixagentid'];?>' />
        <div class='form-control-static'><?php  if($member['fixagentid']==1) { ?>是<?php  } else { ?>否<?php  } ?></div>
        <?php  } ?>

    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">分销商等级</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('commission.agent.edit')) { ?>
        <select name='adata[agentlevel]' class='form-control'>
            <option value='0'><?php echo empty($plugin_com_set['levelname'])?'普通等级':$plugin_com_set['levelname']?></option>
            <?php  if(is_array($agentlevels)) { foreach($agentlevels as $level) { ?>
            <option value='<?php  echo $level['id'];?>' <?php  if($member['agentlevel']==$level['id']) { ?>selected<?php  } ?>><?php  echo $level['levelname'];?></option>
            <?php  } } ?>
        </select>
        <?php  } else { ?>
        <input type="hidden" name="adata[agentlevel]" class="form-control" value="<?php  echo $member['agentlevel'];?>"  />

        <?php  if(empty($member['agentlevel'])) { ?>
        <?php echo empty($plugin_com_set['levelname'])?'普通等级':$plugin_com_set['levelname']?>
        <?php  } else { ?>
        <?php  echo pdo_fetchcolumn('select levelname from '.tablename('ewei_shop_commission_level').' where id=:id limit 1',array(':id'=>$member['agentlevel']))?>
        <?php  } ?>
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">累计佣金</label>
    <div class="col-sm-9 col-xs-12">
        <div class='form-control-static'> <?php  echo $member['commission_total'];?></div>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">已打款佣金</label>
    <div class="col-sm-9 col-xs-12">
        <div class='form-control-static'> <?php  echo $member['commission_pay'];?></div>
    </div>
</div>
<?php  if($member['agenttime']!='1970-01-01 08:00') { ?>
<div class="form-group">
    <label class="col-lg control-label">成为分销商时间</label>
    <div class="col-sm-9 col-xs-12">
        <div class='form-control-static'><?php  echo $member['agenttime'];?></div>
    </div>
</div>
<?php  } ?>
<div class="form-group">
    <label class="col-lg control-label">分销商权限</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('commission.agent.check')) { ?>
        <label class="radio-inline"><input type="radio" name="adata[isagent]" value="1" <?php  if($member['isagent']==1) { ?>checked<?php  } ?>>是</label>
        <label class="radio-inline" ><input type="radio" name="adata[isagent]" value="0" <?php  if($member['isagent']==0) { ?>checked<?php  } ?>>否</label>
        <?php  } else { ?>
        <input type='hidden' name='adata[isagent]' value='<?php  echo $member['isagent'];?>' />
        <div class='form-control-static'><?php  if($member['isagent']==1) { ?>是<?php  } else { ?>否<?php  } ?></div>
        <?php  } ?>

    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">审核通过</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('commission.agent.check')) { ?>
        <label class="radio-inline"><input type="radio" name="adata[status]" value="1" <?php  if($member['status']==1) { ?>checked<?php  } ?>>是</label>
        <label class="radio-inline" ><input type="radio" name="adata[status]" value="0" <?php  if($member['status']==0) { ?>checked<?php  } ?>>否</label>
        <input type='hidden' name='oldstatus' value="<?php  echo $member['status'];?>" />
        <?php  } else { ?>
        <input type='hidden' name='adata[status]' value='<?php  echo $member['status'];?>' />
        <div class='form-control-static'><?php  if($member['status']==1) { ?>是<?php  } else { ?>否<?php  } ?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">强制不自动升级</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('commission.agent.edit')) { ?>
        <label class="radio-inline" ><input type="radio" name="adata[agentnotupgrade]" value="0" <?php  if($member['agentnotupgrade']==0) { ?>checked<?php  } ?>>允许自动升级</label>
        <label class="radio-inline"><input type="radio" name="adata[agentnotupgrade]" value="1" <?php  if($member['agentnotupgrade']==1) { ?>checked<?php  } ?>>强制不自动升级</label>
        <span class="help-block">如果强制不自动升级，满足任何条件，此分销商的级别也不会改变</span>
        <?php  } else { ?>
        <input type="hidden" name="adata[agentnotupgrade]" class="form-control" value="<?php  echo $member['agentnotupgrade'];?>"  />
        <div class='form-control-static'><?php  if($member['agentnotupgrade']==1) { ?>强制不自动升级<?php  } else { ?>允许自动升级<?php  } ?></div>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">自选商品</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('commission.agent.edit')) { ?>
        <label class="radio-inline" ><input type="radio" name="adata[agentselectgoods]" value="0" <?php  if($member['agentselectgoods']==0) { ?>checked<?php  } ?>>系统设置</label>
        <label class="radio-inline"><input type="radio" name="adata[agentselectgoods]" value="1" <?php  if($member['agentselectgoods']==1) { ?>checked<?php  } ?>>强制禁止</label>
        <label class="radio-inline"><input type="radio" name="adata[agentselectgoods]" value="2" <?php  if($member['agentselectgoods']==2) { ?>checked<?php  } ?>>强制开启</label>
        <span class="help-block">系统设置： 跟随系统设置，系统关闭自选则为禁止，系统开启自选则为允许</span>
        <span class="help-block">强制禁止： 无论系统自选商品是否关闭或开启，此分销商永不能自选商品</span>
        <span class="help-block">强制允许： 无论系统自选商品是否关闭或开启，此分销商永可以自选商品</span>
        <?php  } else { ?>
        <input type="hidden" name="adata[agentselectgoods]" class="form-control" value="<?php  echo $member['agentselectgoods'];?>"  />
        <div class='form-control-static'><?php  if($member['agentnotselectgoods']==1) { ?>
            强制禁止
            <?php  } else if($member['agentselectgoods']==2) { ?>
            强制允许
            <?php  } else { ?>
            <?php  if($plugin_com_set['select_goods']==1) { ?>系统允许<?php  } else { ?>系统禁止<?php  } ?>
            <?php  } ?></div>
        <?php  } ?>
    </div>
</div>

<?php  if($diyform_flag_commission == 1) { ?>
    <div class='form-group-title'>自定义表单信息</div>

    <?php  $datas = iunserializer($member['diycommissiondata'])?>
    <?php  if(is_array($cfields)) { foreach($cfields as $key => $value) { ?>
    <div class="form-group">
        <label class="col-lg control-label"><?php  echo $value['tp_name']?></label>
        <div class="col-sm-9 col-xs-12">
            <div class="form-control-static">
                <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('diyform/diyform', TEMPLATE_INCLUDEPATH)) : (include template('diyform/diyform', TEMPLATE_INCLUDEPATH));?>
            </div>
        </div>
    </div>
    <?php  } } ?>
<?php  } ?>


<script language='javascript'>

    function search_members() {
        if ($.trim($('#search-kwd-notice').val()) == '') {
            Tip.focus('#search-kwd-notice', '请输入关键词');
            return;
        }
        $("#module-menus-notice").html("正在搜索....")
        $.get('<?php  echo webUrl('commission/agent/query')?>', {
            keyword: $.trim($('#search-kwd-notice').val()), 'op': 'query', selfid: "<?php  echo $id;?>"
        }, function (dat) {
            $('#module-menus-notice').html(dat);
        });
    }
    function select_member(o) {
        $("#agentid").val(o.id);
        $("#parentagentavatar").show();
        $("#parentagentavatar").find('img').attr('src', o.avatar);
        $("#parentagent").val(o.nickname + "/" + o.realname + "/" + o.mobile);
        $("#modal-module-menus-notice .close").click();
    }
    function chooseAgent() {
        popwin = $('#modal-module-menus-notice').modal();
    }
    function clearAgent() {
        tip.confirm("确定清除上级分销商吗？(保存后生效)", function () {
            $('#agentid').val('');
            $('#parentagent').val('');
            $('#parentagentavatar').hide();
        });
    }

</script>
