<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">
    当前位置：<span class="text-primary">结算单信息
        <small>结算单号: <?php  echo $data['billno'];?></small></span>
</div>
<div class="page-content">
    <div class="page-sub-toolbar">
        <span class=''>
		<?php if(cv('globonus.bonus.build')) { ?>
			<a class="btn btn-primary btn-sm" href="<?php  echo webUrl('globonus/bonus/build')?>">创建结算单</a>
		<?php  } ?>
	</span>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div style="border: 1px solid #e7eaec" class="summary_box float-e-margins">
                <div class="summary_title">
                    <span class="text-default title_inner">分红</span>
                    <?php  if($data['paytype']==2) { ?>
                    <span class="text-default pull-right" style="margin: 0px 30px 0 0">按周结算</span>
                    <?php  } else { ?>
                    <span class="text-default pull-right">按月结算</span>
                    <?php  } ?>
                </div>
                <div class="summary flex">
                    <div class="flex1 flex column">
                        <h2 class="no-margins tcount text-danger"><?php  echo $data['bonusmoney_pay'];?>元</h2>
                        应分红: <?php  echo $data['bonusmoney'];?> 元
                    </div >
                </div>
            </div>
            </div>
            <div class="col-sm-4">
                <div style="border: 1px solid #e7eaec" class="summary_box float-e-margins">
                    <div class="summary_title">
                        <span class="text-default title_inner">订单</span>
                    </div>
                    <div class="summary flex">
                        <div class="flex1 flex column">
                            <h2 class="no-margins tcount text-danger"><?php  echo $data['ordermoney'];?> 元</h2>
                            订单总数: <?php  echo $data['ordercount'];?> 个
                        </div >
                    </div>
                </div>
            </div>

        <div class="col-sm-4">
            <div style="border: 1px solid #e7eaec" class="summary_box float-e-margins">
                <div class="summary_title">
                    <span class="text-default title_inner">股东已结算</span>
                </div>
                <div class="summary flex">
                    <div class="flex1 flex column">
                        <h2 class="no-margins tcount"><?php  echo $data['partnercount1'];?>个</h2>
                        股东数量: <?php  echo $data['partnercount'];?>
                    </div >
                </div>
            </div>
        </div>
    </div>

    <form action="./index.php" method="get" class="form-horizontal" role="form" id="form1">
        <input type="hidden" name="c" value="site"/>
        <input type="hidden" name="a" value="entry"/>
        <input type="hidden" name="m" value="ewei_shopv2"/>
        <input type="hidden" name="do" value="web"/>
        <input type="hidden" name="id" value="<?php  echo $id;?>"/>
        <input type="hidden" name="r" value="globonus.bonus.detail"/>

        <div class="page-toolbar row m-b-sm m-t-sm">

            <div class="col-sm-5">
                <?php if(cv('globonus.bonus.confirm')) { ?>
                    <?php  if(empty($data['status'])) { ?>
                    <div class="input-group">
                        <div class="input-group-select">
                            <select id='paymoneylevel' class='form-control  input-sm select-md' style="width:100px;float:left;">
                                <option value=''>等级</option>
                                <option value='0'><?php echo empty($set['levelname'])?'普通等级': $set['levelname']?></option>
                                <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
                                <option value='{$level[' id
                                ']}'><?php  echo $level['levelname'];?></option>
                                <?php  } } ?>
                            </select>
                        </div>
                        <input type="text" class="form-control input-sm" id="paymoney" value="" placeholder="最终分红"/>
                         <span class="input-group-btn">
                           <button class="btn btn-sm btn-primary" id="btnset" type="button"> 统一设置</button>
                        </span>
                    </div>
                    <?php  } ?>
                <?php  } ?>
            </div>

            <div class="col-sm-7 pull-right">
                <div class="input-group">
                    <div class="input-group-select">
                        <select name='status' class='form-control' style="width:120px;">
                            <option value=''>等级</option>
                            <option value='0' <?php  if($_GPC['level']=='0') { ?>selected<?php  } ?>><?php echo empty($set['levelname'])?'普通等级': $set['levelname']?></option>
                            <?php  if(is_array($levels)) { foreach($levels as $level) { ?>
                            <option value='{$level[' id
                            ']}' <?php  if($_GPC['level']==$level['id']) { ?>selected<?php  } ?>><?php  echo $level['levelname'];?></option>
                            <?php  } } ?>
                        </select>
                    </div>
                    <div class="input-group-select">
                        <select name='status' class='form-control' style="width:100px;">
                            <option value='' <?php  if($_GPC['status']=='') { ?>selected<?php  } ?>>状态</option>
                            <option value='0' <?php  if($_GPC['status']=='0') { ?>selected<?php  } ?>>未打款</option>
                            <option value='1' <?php  if($_GPC['status']=='1') { ?>selected<?php  } ?>>已打款</option>
                        </select>
                    </div>
                    <input type="text" class="form-control" name="keyword" value="<?php  echo $_GPC['keyword'];?>"
                           placeholder="股东昵称/姓名/手机号"/>
                     <span class="input-group-btn">

                                            <button class="btn btn-primary" type="submit"> 搜索</button>
                                                                                        <?php if(cv('globonus.bonus.detail.export')) { ?>
                            <button type="submit" name="export" value="1" class="btn btn-success">导出</button>
                            <?php  } ?>
                    </span>
                </div>

            </div>
        </div>


    </form>

    <table class="table table-hover  table-responsive ">
        <thead class="navbar-inner">
        <tr>
            <?php  if(empty($data['status']) || $data['status']==1 ) { ?>
            <th style="width:25px;"><input type='checkbox' class="checkall"/></th>
            <?php  } ?>

            <th style='width:190px;'>单号</th>
            <th style='width:100px;'>姓名/手机</th>
            <th style='width:80px;'>等级</th>
            <th style='width:80px;'>分红比例</th>
            <th style='width:80px;'>计算分红</th>
            <th style='width:80px;'>实际分红</th>
            <th style='width:80px;'>最终分红</th>
            <th style='width:70px;'>状态</th>
        </tr>
        </thead>
    </table>

    <div style="max-height:500px;overflow:auto;border:none; overflow-x:hidden;">
        <table class="table table-hover  table-responsive " style="table-layout: fixed;border:none;">
            <tbody>
            <?php  if(is_array($list)) { foreach($list as $row) { ?>
            <tr>
                <?php  if((empty($data['status']) || $data['status']==1)) { ?>
                <td style="width:25px;">
                    <?php  if($row['status']!=1) { ?>
                    <input type='checkbox' class="checkitem" value="<?php  echo $row['id'];?>"/>
                    <?php  } ?>
                </td>
                <?php  } ?>

                <td style='width:190px;' data-toggle='tooltip' title='<?php  echo $row['nickname'];?>'  style='width:80px;'>
                <?php  echo $row['payno'];?> <br/>
                <?php if(cv('member.list.view')) { ?>
                <a href="<?php  echo webUrl('member/list/detail',array('id' => $row['mid']));?>" target='_blank'>
                    <img src='<?php  echo tomedia($row['avatar'])?>' style='width:30px;height:30px;padding1px;border:1px solid #ccc' />
                    <?php  echo $row['nickname'];?>
                </a>
                <?php  } else { ?>
                <img src='{$row[' avatar']}' style='width:30px;height:30px;padding1px;border:1px solid #ccc' />
                <?php  echo $row['nickname'];?>
                <?php  } ?>
                </td>

                <td style='width:100px;'><?php  echo $row['realname'];?><br/><?php  echo $row['mobile'];?></td>
                <td style='width:80px;'><?php  if(empty($row['levelname'])) { ?>
                    <?php echo empty($set['levelname'])?'普通等级': $set['levelname']?>
                    <?php  } else { ?><?php  echo $row['levelname'];?>
                    <?php  } ?>
                </td>
                <td style='width:80px;'><?php  echo $row['bonus'];?>%</td>
                <td style='width:80px;'><?php  echo $row['money'];?></td>
                <td style='width:80px;'><?php  echo $row['realmoney'];?></td>
                <td style='width:80px;'>
                    <?php if(cv('globonus.bonus.confirm')) { ?>
                    <?php  if(empty($data['status'])) { ?>
                    <a class="paymoneyset-<?php  echo $row['partnerlevel'];?>" href='javascript:;' data-toggle='ajaxEdit'
                       data-href="<?php  echo webUrl('globonus/bonus/paymoney',array('type'=>'partner','id'=>$row['billid'],'bpid'=>$row['id'] ))?>"><?php  echo $row['paymoney'];?></a>
                    <?php  } else { ?>
                    <?php  echo $row['paymoney'];?>
                    <?php  } ?>
                    <?php  } else { ?>
                    <?php  echo $row['paymoney'];?>
                    <?php  } ?>
                </td>
                <td style='width:70px;'><?php  if(empty($row['status'])) { ?>
                    <span class="label label-default">等待</span>
                    <?php  } else if($row['status']==-1) { ?>
                    <span class="label label-danger">失败</span> <a data-toggle='tooltip' title='<?php  echo $row['reason'];?>'><i
                            class="fa fa-question-circle"></i></a>
                    <?php  } else if($row['status']==1) { ?>
                    <span class="label label-primary">成功</span>
                    <?php  } ?>
                </td>
            </tr>
            <?php  } } ?>
            </tbody>
        </table>
    </div>

    <div class="form-group" style="margin-top:20px;">
        <div class="col-sm-12">

            <?php if(cv('globonus.bonus.confirm')) { ?>
                <?php  if($data['status']==0) { ?>
                <input type="button" id="btnconfirm" value="确认结算单" class="btn btn-success"/>
                <?php  } ?>
            <?php  } ?>

            <?php if(cv('globonus.bonus.pay')) { ?>
                <?php  if($data['status']==1) { ?>
                <input type="button" id="btnpay" value="开始结算" class="btn btn-primary"/>
                <?php  } ?>
            <?php  } ?>
            <a class="btn btn-default" href="<?php  echo webUrl('globonus/bonus/status'.$data['status'])?>">返回列表</a>
        </div>
    </div>
</div>

<script>
    window.partners = [];
    window.current = 0;

    $(function () {

        $('.checkall').click(function () {
            var checked = $(this).prop('checked');
            $('.checkitem').prop('checked', checked);
        });

        $('#btnpay').click(function () {
            pay();
        });
        $('#btnset').click(function () {
            setpay();
        });
        $('#btnconfirm').click(function () {
            confirm();
        });
    });

    function confirm(){

        tip.confirm('结算单确认后，无法进行修改，确认吗？',function(){

            $('#btnconfirm').button('loading');
            $.ajax({
                url: "<?php  echo webUrl('globonus/bonus/confirm')?>",
                type: 'post',
                dataType: 'json',
                data: {
                    id: "<?php  echo $data['id'];?>"
                },
                success: function (ret) {
                    $('#btnconfirm').button('reset');
                    var result = ret.result;
                    if (ret.status != 1) {
                        tip.msgbox.err(result.message);
                        return;
                    }
                    location.href = biz.url('globonus/bonus/status0');
                }
            });

        });

    }

    function setpay() {

        var level = $('#paymoneylevel').val();
        var value = $('#paymoney').val();
        if (level == '') {

            tip.msgbox.err("请选择要设置的股东等级!");
            return;
        }
        if (!$.isNumber(value) || parseFloat(value) <= 0) {

            tip.msgbox.err("请输入统一设置的分红!");
            return;

        }
        $('#btnset').button('loading');
        $.ajax({
            url: "<?php  echo webUrl('globonus/bonus/paymoney')?>",
            type: 'post',
            dataType: 'json',
            data: {
                type: 'level', id: "<?php  echo $data['id'];?>", level: level, value: value
            },
            success: function (ret) {
                $('#btnset').button('reset');
                var result = ret.result;
                if (ret.status != 1) {

                    tip.msgbox.err(result.message);
                    return;
                }
                $('.paymoneyset-' + level).html(value);
                tip.msgbox.suc('设置成功!');
            }
        });

    }
    function pay() {

        if ($('.checkitem:checked').length<=0) {
            tip.msgbox.err('请选择要结算的股东!');
            return;
        }
        $('.checkitem:checked').each(function(){
             window.partners.push( $(this).val() );
        });
        window.current = 0;

        tip.confirm('确认要进行分红结算?', function () {

            $('#btnpay').attr('disabled', true).val('正在进行结算...');
            $('.checkitem,.checkall').attr('disabled',true);
            $.ajax({
                url: "<?php  echo webUrl('globonus/bonus/pay')?>",
                type: 'post',
                dataType: 'json',
                data: {
                    id: "<?php  echo $data['id'];?>"
                },
                success: function (ret) {

                    var result = ret.result;
                    if (ret.status != 1) {
                        $('.checkitem,.checkall').removeAttr('disabled',true);
                        $('#btnpay').removeAttr('disabled').val('确认发放分红');
                        tip.msgbox.err(result.message);
                        return;
                    }
                    payp();
                }
            });
        });
    }
    function payp() {
        $.ajax({
            url: "<?php  echo webUrl('globonus/bonus/payp')?>",
            type: 'post',
            dataType: 'json',
            data: {
                id: "<?php  echo $data['id'];?>", 'bpid': window.partners[window.current]
            },
            success: function (ret) {
                var result = ret.result;
                $('#partnercount1').html(result.partnercount);
                window.current++;
                if (window.current > window.partners.length - 1) {
                    if (result.full) {
                        $('.checkitem,.checkall').removeAttr('disabled',true);
                        tip.alert('所有股东分红发送成功!', function () {
                            location.href = biz.url('globonus/bonus/status1');
                            return;
                        });
                    } else {

                        tip.alert('部分股东分红发送成功，请查看发放失败原因重新发放!', function () {
                            $('.checkitem,.checkall').removeAttr('disabled',true);
                            $('#btnpay').removeAttr('disabled').val('开始结算');
                            location.reload();
                        });
                    }
                    return;
                }
                payp();
            }
        });

    }

</script>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
