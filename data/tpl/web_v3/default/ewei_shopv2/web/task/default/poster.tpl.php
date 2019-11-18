<?php defined('IN_IA') or exit('Access Denied');?><h3 class="form-group-title">通知模版设置</h3>
<div class="form-group">
    <label class="col-lg control-label">模版id</label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if(!empty($res)) { ?>
        <input type="text" class="form-control " name="templateid" value="<?php  echo $res['templateid'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " name="templateid" value="">
        <?php  } ?>
        <span class="help-block">模版搜索关键字：业务处理通知/OPENTM207574677</span>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['templateid'];?></div>
        <?php  } ?>
    </div>
</div>

<h3 class="form-group-title">领取海报推送</h3>
<div class="form-group">
    <label class="col-lg control-label"></label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <textarea class="form-control " rows="5" name="getposter" data-html="true" data-toggle="popover" data-content="<?php  echo $tooltip;?>" data-placement="right"><?php  if(!empty($res)) { ?><?php  echo $res['getposter']['value'];?><?php  } else { ?>
            亲爱的[任务执行者昵称]，恭喜您成功领取[任务名称]!
            下面是您的专属任务海报,好友扫描海报后即可提升您的人气值。
            人气值达到[任务目标]即可解锁任务奖励。
            [关注奖励列表]
            当前海报有效期至：[海报有效期]<?php  } ?></textarea>
        <div class="help-block">
            可用代码 : &lt;a href='链接'&gt;进入商城&lt;/a&gt;(href链接内容只识别单引号内容)
        </div>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['getposter']['value'];?></div>
        <?php  } ?>
    </div>
</div>

<!--新用户扫描成功通知(任务执行者)-->
<br/>
<h3 class="form-group-title">新用户扫描成功通知(任务执行者)</h3>

<div class="form-group">
    <label class="col-lg control-label"></label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if($res) { ?>
        <input type="text" class="form-control " name="succestaskerfirst" data-html="true" data-toggle="popover" data-content="<?php  echo $tooltip;?>" data-placement="right" value="<?php  echo $res['successtasker']['first']['value'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " name="succestaskerfirst" data-html="true" data-toggle="popover" data-content="<?php  echo $tooltip;?>" data-placement="right" value="恭喜您，[海报扫描者昵称]关注了您的海报，为您增加了1点人气值。">
        <?php  } ?>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['successtasker']['first']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="succestaskerfirstcolor" value="<?php  echo $res['successtasker']['first']['color'];?>" style="width:32px;height:32px;">
        <?php  } else { ?>
        <input type="color" name="succestaskerfirstcolor" value="#ff465a" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">任务名称</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if($res) { ?>
        <input type="text" class="form-control " name="succestaskername" data-html="true" data-toggle="popover" data-content="<?php  echo $tooltip;?>" data-placement="right" value="<?php  echo $res['successtasker']['keyword1']['value'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " name="succestaskername" data-html="true" data-toggle="popover" data-content="<?php  echo $tooltip;?>" data-placement="right" value="[任务名称]">
        <?php  } ?>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['successtasker']['keyword1']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="succestaskernamecolor" value="<?php  echo $res['successtasker']['keyword1']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="succestaskernamecolor" value="#000000" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">通知类型</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if($res) { ?>
        <input type="text" class="form-control " name="succestaskertype" data-html="true" data-toggle="popover" data-content="<?php  echo $tooltip;?>" data-placement="right" value="<?php  echo $res['successtasker']['keyword2']['value'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " name="succestaskertype" data-html="true" data-toggle="popover" data-content="<?php  echo $tooltip;?>" data-placement="right" value="成功增加人气值">
        <?php  } ?>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['successtasker']['keyword2']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="succestaskertypecolor"  value="<?php  echo $res['successtasker']['keyword2']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="succestaskertypecolor" value="#000000" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label"></label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <textarea name="succestaskerremark" rows="5" class="form-control" data-html="true" data-toggle="popover" data-content="<?php  echo $tooltip;?>" data-placement="right"><?php  if($res) { ?><?php  echo $res['successtasker']['remark']['value'];?><?php  } else { ?>您已经成功采集到[完成数量]点人气值，还需采集[还需完成数量]点人气值就可以获得超级大礼包啦！！<?php  } ?></textarea>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['successtasker']['remark']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="succestaskerremarkcolor" value="<?php  echo $res['successtasker']['remark']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="succestaskerremarkcolor" value="#ff6600" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>

<!--新用户扫描成功通知(海报扫描者)-->

<h3 class="form-group-title">新用户扫描成功通知(海报扫描者)</h3>
<div class="form-group">
    <label class="col-lg control-label"></label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if($res) { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="successcanerfirst" value="<?php  echo $res['successscaner']['first']['value'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="successcanerfirst"  value="亲爱的[海报扫描者昵称]，您关注了[任务执行者昵称]的海报，为TA增加了1点人气值。">
        <?php  } ?>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['successscaner']['first']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="successcanerfirstcolor" value="<?php  echo $res['successscaner']['first']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="successcanerfirstcolor" value="#ff465a" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">任务名称</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if($res) { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="successcanername" value="<?php  echo $res['successscaner']['keyword1']['value'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="successcanername" value="关注奖励">
        <?php  } ?>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['successscaner']['keyword1']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="successcanernamecolor" value="<?php  echo $res['successscaner']['keyword1']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="successcanernamecolor" value="#000000" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">通知类型</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if($res) { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="successcanertype" value="<?php  echo $res['successscaner']['keyword2']['value'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="successcanertype" value="获得关注奖成功">
        <?php  } ?>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['successscaner']['keyword1']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="successcanertypecolor" value="<?php  echo $res['successscaner']['keyword2']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="successcanertypecolor" value="#000000" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label"></label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <textarea name="successcanerremark" rows="5" class="form-control" data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right"><?php  if($res) { ?><?php  echo $res['successscaner']['remark']['value'];?><?php  } else { ?>[关注奖励列表][积分奖励][余额奖励][奖励优惠卷]已经发送到您的账户中，点击进入查看。<?php  } ?></textarea>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['successscaner']['remark']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="successcanerremarkcolor" value="<?php  echo $res['successscaner']['remark']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="successcanerremarkcolor" value="#ff6600" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>

<!--任务完成通知-->
<br/>
<h3 class="form-group-title">任务完成通知</h3>

<div class="form-group">
    <label class="col-lg control-label"></label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if($res) { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="completefirst" value="<?php  echo $res['complete']['first']['value'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="completefirst" value="恭喜您，亲爱的[任务执行者昵称]，您的任务已经完成。">
        <?php  } ?>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['complete']['first']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="completefirstcolor" value="<?php  echo $res['complete']['first']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="completefirstcolor" value="#ff465a" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">任务名称</label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if($res) { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="completetaskname" value="<?php  echo $res['complete']['keyword1']['value'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="completetaskname" value="[任务名称]">
        <?php  } ?>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['complete']['keyword1']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="completetasknamecolor" value="<?php  echo $res['complete']['keyword1']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="completetasknamecolor" value="#000000" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">通知类型</label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if($res) { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="completetype" value="<?php  echo $res['complete']['keyword2']['value'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="completetype" value="任务完成通知">
        <?php  } ?>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['complete']['keyword2']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="completetypecolor" value="<?php  echo $res['complete']['keyword2']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="completetypecolor" value="#000000" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label"></label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <textarea class="form-control " rows="5" name="completeremark" data-html="true" data-toggle="popover" data-content="<?php  echo $tooltip;?>" data-placement="right"><?php  if($res) { ?><?php  echo $res['complete']['remark']['value'];?><?php  } else { ?>您已经成功采集到[完成数量]点人气值，任务已经完成！！快来点击进入领取您的奖励！！<?php  } ?></textarea>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['complete']['remark']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="completeremarkcolor" value="<?php  echo $res['complete']['remark']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="completeremarkcolor" value="#ff6600" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>


<!--多级任务完成通知-->
<br/>
<h3 class="form-group-title">多级任务完成通知</h3>

<div class="form-group">
    <label class="col-lg control-label"></label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if($res) { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="rankcompletefirst" value="<?php  echo $res['rankcomplete']['first']['value'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="rankcompletefirst" value="恭喜您，亲爱的[任务执行者昵称]，您的任务已经完成。">
        <?php  } ?>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['rankcomplete']['first']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="rankcompletefirstcolor" value="<?php  echo $res['rankcomplete']['first']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="rankcompletefirstcolor" value="#ff465a" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">任务名称</label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if($res) { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="rankcompletetaskname" value="<?php  echo $res['rankcomplete']['keyword1']['value'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="rankcompletetaskname" value="[任务名称]">
        <?php  } ?>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['rankcomplete']['keyword1']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="rankcompletetasknamecolor" value="<?php  echo $res['rankcomplete']['keyword1']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="rankcompletetasknamecolor" value="#000000" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">通知类型</label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if($res) { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="rankcompletetype" value="<?php  echo $res['rankcomplete']['keyword2']['value'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="rankcompletetype" value="任务完成通知">
        <?php  } ?>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['rankcomplete']['keyword2']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="rankcompletetypecolor" value="<?php  echo $res['rankcomplete']['keyword2']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="rankcompletetypecolor" value="#000000" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label"></label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <textarea class="form-control " rows="5" name="rankcompleteremark" data-html="true" data-toggle="popover" data-content="<?php  echo $tooltip;?>" data-placement="right"><?php  if($res) { ?><?php  echo $res['rankcomplete']['remark']['value'];?><?php  } else { ?>您已经成功采集到[完成数量]点[人气值名称]，[任务名称][任务阶段]已经完成！！快来点击进入领取您的奖励！！<?php  } ?></textarea>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['rankcomplete']['remark']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="rankcompleteremarkcolor" value="<?php  echo $res['rankcomplete']['remark']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="rankcompleteremarkcolor" value="#ff6600" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>

<!--任务完成后通知-->
<br/>
<h3 class="form-group-title">任务完成后通知</h3>

<div class="form-group">
    <label class="col-lg control-label"></label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if($res) { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="completedfirst" value="<?php  echo $res['completed']['first']['value'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="completedfirst" value="恭喜您，亲爱的[任务执行者昵称]，您的任务已经完成。">
        <?php  } ?>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['completed']['first']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="completefirstcolor" value="<?php  echo $res['completed']['first']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="completefirstcolor" value="#ff465a" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">任务名称</label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if($res) { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="completedtaskname" value="<?php  echo $res['completed']['keyword1']['value'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="completedtaskname" value="[任务名称]">
        <?php  } ?>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['completed']['keyword1']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="completedtasknamecolor" value="<?php  echo $res['complete']['keyword1']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="completedtasknamecolor" value="#000000" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">通知类型</label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if($res) { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="completedtype" value="<?php  echo $res['completed']['keyword2']['value'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="completedtype" value="任务完成通知">
        <?php  } ?>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['completed']['keyword2']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="completedtypecolor" value="<?php  echo $res['completed']['keyword2']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="completedtypecolor" value="#000000" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label"></label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <textarea class="form-control " rows="5" name="completedremark" data-html="true" data-toggle="popover" data-content="<?php  echo $tooltip;?>" data-placement="right"><?php  if($res) { ?><?php  echo $res['completed']['remark']['value'];?><?php  } else { ?>任务已经完成！！快来点击进入领取您的奖励！！<?php  } ?></textarea>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['completed']['remark']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="completedremarkcolor" value="<?php  echo $res['completed']['remark']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="completedremarkcolor" value="#ff6600" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">是否发送</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <label class="radio-inline">
            <input type="radio" name="is_completed" value="1" <?php  if(!empty($res)&&$res['is_completed']==1) { ?>checked<?php  } ?>> 启用
        </label>
        <label class="radio-inline">
            <input type="radio" name="is_completed" value="0" <?php  if(empty($res)||$res['is_completed']!=1) { ?>checked<?php  } ?>> 禁用
        </label>
        <?php  } else { ?>
        <div class='form-control-static'><?php  if(!empty($res)&&$res['is_completed']==1) { ?>启用<?php  } else { ?>禁用<?php  } ?></div>
        <?php  } ?>
    </div>
</div>

<!--扫描不成功通知（非新用户）-->

<h3 class="form-group-title">扫描不成功通知（非新用户）</h3>

<div class="form-group">
    <label class="col-lg control-label">任务名称</label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if($res) { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="failtaskname" value="<?php  echo $res['fail']['keyword1']['value'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="failtaskname" value="[任务名称]">
        <?php  } ?>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['fail']['keyword1']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="failtasknamecolor" value="<?php  echo $res['fail']['keyword1']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="failtasknamecolor" value="#000000" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">通知类型</label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if($res) { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="failtasknametype" value="<?php  echo $res['fail']['keyword2']['value'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="failtasknametype" value="不符合参与活动条件">
        <?php  } ?>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['fail']['keyword2']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="failtasknametypecolor" value="<?php  echo $res['fail']['keyword2']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="failtasknametypecolor" value="#000000" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label"></label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <textarea class="form-control " rows="5" name="failtasknameremark" data-html="true" data-toggle="popover" data-content="<?php  echo $tooltip;?>" data-placement="right"><?php  if($res) { ?><?php  echo $res['fail']['remark']['value'];?><?php  } else { ?>亲爱的[海报扫描者昵称] ，您不符合活动参与条件或已经参加过活动，无法为[任务执行者昵称]增加人气值。<?php  } ?></textarea>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['fail']['remark']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="failtasknameremarkcolor" value="<?php  echo $res['fail']['remark']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="failtasknameremarkcolor" value="#ff6600" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>



<!--扫描自己的海报-->
<br/>
<h3 class="form-group-title">扫描自己的海报</h3>

<div class="form-group">
    <label class="col-lg control-label">任务名称</label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if($res) { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="scanselftaskname" value="<?php  echo $res['self']['keyword1']['value'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="scanselftaskname" value="[任务名称]">
        <?php  } ?>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['self']['keyword1']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="scanselftasknamecolor" value="<?php  echo $res['self']['keyword1']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="scanselftasknamecolor" value="#000000" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">通知类型</label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <?php  if($res) { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="scanselftype" value="<?php  echo $res['self']['keyword2']['value'];?>">
        <?php  } else { ?>
        <input type="text" class="form-control " data-toggle="popover" data-html="true" data-content="<?php  echo $tooltip;?>" data-placement="right" name="scanselftype" value="扫描自己的海报是不会增加人气值的。">
        <?php  } ?>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['self']['keyword2']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="scanselftypecolor" value="<?php  echo $res['self']['keyword2']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="scanselftypecolor" value="#000000" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label"></label>
    <div class="col-sm-9 col-xs-10">
        <?php if(cv('task.default.edit|task.default.add')) { ?>
        <textarea class="form-control " rows="5" name="scanselfremark" data-html="true" data-toggle="popover" data-content="<?php  echo $tooltip;?>" data-placement="right"><?php  if($res) { ?><?php  echo $res['self']['remark']['value'];?><?php  } else { ?>快快把你的海报发送给你的小伙伴吧~<?php  } ?></textarea>
        <?php  } else { ?>
        <div class='form-control-static'><?php  echo $res['self']['remark']['value'];?></div>
        <?php  } ?>
    </div>
    <div class="col-sm-1 col-xs-2">
        <?php  if($res) { ?>
        <input type="color" name="scanselfremarkcolor" value="<?php  echo $res['self']['remark']['color'];?>" style="width:32px;height:32px;" />
        <?php  } else { ?>
        <input type="color" name="scanselfremarkcolor" value="#ff6600" style="width:32px;height:32px;" />
        <?php  } ?>
    </div>
</div>