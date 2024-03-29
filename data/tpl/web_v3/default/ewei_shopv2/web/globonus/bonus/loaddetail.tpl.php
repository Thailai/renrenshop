<?php defined('IN_IA') or exit('Access Denied');?><div class="form-group-title">分红统计</div>
<div class="form-group">
    <label class="col-sm-2 control-label">时间段</label>
    <div class="col-sm-9 col-xs-12">
        <div class="form-control-static"><span id="times"><?php  echo date('Y-m-d',$data['starttime'])?> - <?php  echo date('Y-m-d',$data['endtime'])?></span></div>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">订单数量</label>
    <div class="col-sm-9 col-xs-12">
        <div class="form-control-static"><span id="ordercount" style="color:red"><?php  echo $data['ordercount'];?></span> 个</div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">订单金额</label>
    <div class="col-sm-9 col-xs-12">
        <div class="form-control-static"><span id="ordermoney" style="color:red"><?php  echo $data['ordermoney'];?></span> 元</div>
    </div>
</div>

<?php  if(!empty($data['bonusrate']) || $data['bonusrate'] != 100) { ?>
<div class="form-group">
    <label class="col-sm-2 control-label">分红金额</label>
    <div class="col-sm-9 col-xs-12">
        <div class="form-control-static"><span id="bonusordermoney" style="color:red"><?php  echo $data['bonusordermoney'];?></span> 元 (分红比例:<?php  echo $data['bonusrate'];?>%)</div>
    </div>
</div>
<?php  } ?>

<div class="form-group">
    <label class="col-sm-2 control-label">股东数量</label>
    <div class="col-sm-9 col-xs-12">
        <div class="form-control-static"><span id="partnercount" style="color:red"><?php  echo $data['partnercount'];?></span> 个</div>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">预计分红</label>
    <div class="col-sm-9 col-xs-12">
        <div class="form-control-static"><span id="bonusmoney" style="color:red"><?php  echo $data['bonusmoney'];?></span> 元</div>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">最终分红</label>
    <div class="col-sm-9 col-xs-12">
        <input type="text" id='bonusmoney1' name="bonusmoney" class="form-control"  data-rule-required='true'
               <?php  if($data['old']) { ?>
               value="<?php  echo $data['bonusmoney_send'];?>" disabled="true"
        <?php  } else { ?>
        value="<?php  echo $data['bonusmoney'];?>"
        <?php  } ?>
        />
        <span class="help-block">如果您的最终分红和预计分红不一致，则实际给股东的分红会按照预计分红及最终分红比例进行分红</span>
    </div>
</div>


<?php  if(!$data['old']) { ?>
<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-9 col-xs-12">
        <input type="button" id="btn" value="生成分红结算单" class="btn btn-primary" />
    </div>
</div>
<?php  } else { ?>
<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-9 col-xs-12">
       <div class="form-control-static"><span style="color:red">此时间段已经生成了结算单，请到明细查看</span><br/>
       <a href="<?php  echo webUrl('globonus/bonus/detail',array('id'=>$data['billid']))?>" class="btn btn-warning">立即查看</a>
       </div>
    </div>
</div>


<?php  } ?>
