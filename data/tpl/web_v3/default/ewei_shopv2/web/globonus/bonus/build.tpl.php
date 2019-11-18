<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class="page-header">
    当前位置：<span class="text-primary">生成结算单</span>
</div>
<div class="page-content">
    <?php  if(empty($set['paytype'])) { ?>

    <div class="alert alert-danger">
        未设置分红发放周期，立即去<a href="<?php  echo webUrl('globonus/set',array('tab'=>'money'))?>">【设置】</a>
    </div>
    <?php  } else { ?>

    <form action="" method="post" class="form-horizontal form-validate" enctype="multipart/form-data">

        <div class="form-group">
            <label class="col-lg control-label">上次结算</label>
            <div class="col-sm-9 col-xs-12">
                <div class="form-control-static">
                    <?php  if(empty($bill)) { ?>
                    未发放
                    <?php  } else { ?>
                    时间: <?php  echo date('Y-m-d',$bill['starttime'])?> - <?php  echo date('Y-m-d',$bill['endtime'])?><br/><br/>
                    类型: <?php  if($bill['paytype']==1) { ?>
                    <label class="label label-success">按月</label>
                    <?php  } else if($bill['paytype']==2) { ?>
                    <label class="label label-warning">按周</label>
                    <?php  } ?>

                    <br/><br/>
                    状态: <?php  if($bill['status']==1) { ?>
                    <label class="label label-success">已发放</label>
                    <?php  } else { ?>
                    <label class="label label-default">未发放</label>
                    <?php  } ?>
                    <?php  } ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg control-label"><?php  if($set['paytype']==2) { ?>按周<?php  } else { ?>按月<?php  } ?>发放</label>
            <div class="col-sm-3 col-xs-12">
                <div class="input-group-select">
                    <select name="year" class='form-control input-sm select-sm' style="float:left;">
                        <?php  if(is_array($years)) { foreach($years as $y) { ?>
                        <option value="<?php  echo $y;?>" <?php  if($y==date('Y')) { ?>selected="selected"<?php  } ?>><?php  echo $y;?>年</option>
                        <?php  } } ?>
                    </select>
                </div>
                <div class="input-group-select">
                    <select name="month" class='form-control input-sm select-sm' style="float:left;">
                        <option value=''>月份</option>
                        <?php  if(is_array($months)) { foreach($months as $m) { ?>
                        <option value="<?php  echo $m;?>" <?php  if($m==date('m')+1) { ?>selected="selected"<?php  } ?>><?php  echo $m;?>月</option>
                        <?php  } } ?>
                    </select>
                </div>
                <?php  if($set['paytype']==2) { ?>
                <div class="input-group-select">
                    <select name="week" class='form-control input-sm select-sm' style="float:left;">
                        <option value="1" <?php  if($week==1) { ?>selected="selected"<?php  } ?>>第1周</option>
                        <option value="2" <?php  if($week==2) { ?>selected="selected"<?php  } ?>>第2周</option>
                        <option value="3" <?php  if($week==3) { ?>selected="selected"<?php  } ?>>第3周</option>
                        <option value="4" <?php  if($week==4) { ?>selected="selected"<?php  } ?>>第4周</option>
                    </select>
                </div>
                <?php  } ?>

            </div>
        </div>


        <div id="datas">

        </div>

    </form>
</div>
<script>
    function loadDetail() {
        var year = $('select[name=year]').val();
        var month = $('select[name=month]').val();
        var week = $('select[name=week]').val();

        $('select[name=year],select[name=month],select[name=week],#btn').attr('disabled', true);
        $('#btn').val('正在分析数据...').unbind('click');


$('#datas').html('正在加载...');
        $.ajax({
            url: "<?php  echo webUrl('globonus/bonus/loaddetail')?>",
            dataType: 'html',
            data: {
                year: year, month: month, week: week
            },
            success: function (ret) {

                var result = ret.result;

                $('select[name=year],select[name=month],select[name=week],#btn').removeAttr('disabled');
                $('#datas').html(ret);
                $('#btn').val('生成分红结算单').bind('click', function () {
                     createBill();
                });
            }
        });
    }
    function createBill() {

        var year = $('select[name=year]').val();
        var month = $('select[name=month]').val();
        var week = $('select[name=week]').val();
        if (!$('#bonusmoney1').isNumber()) {
             tip.msgbox.err('请输入数字最终分红!');
            return;
        }
        var money = parseFloat($('#bonusmoney1').val());
        if (money < 0.01) {
            tip.msgbox.err('分红至少大于1分钱!');
            return;
        }
        tip.confirm('确认要生成分红结算单？', function () {

            $('select[name=year],select[name=month],select[name=week],#btn').attr('disabled', true);
            $('#btn').val('正在生成结算单...');

            $.ajax({
                url: "<?php  echo webUrl('globonus/bonus/build')?>",
                type: 'post',
                dataType: 'json',
                data: {
                    year: year, month: month, week: week,bonusmoney: $('#bonusmoney1').val()
                },
                success: function (ret) {

                    var result = ret.result;
                    if (ret.status != 1) {
                        $('select[name=year],select[name=month],select[name=week],#btn').removeAttr('disabled');
                        tip.msgbox.err(result.message);
                        return;
                    }
                    if (result.old) {
                        $('select[name=year],select[name=month],select[name=week],#btn').removeAttr('disabled');
                         tip.msgbox.err('此时间段的结算单已经生成，请到分红明细查看!');
                         return;
                     }

                    tip.alert('结算单生成成功!',function(){
                        location.href = "<?php  echo webUrl('globonus/bonus/status0')?>";
                    });

                    return;

                }
            });


        });

    }
    $(function () {
        $('select[name=year],select[name=month],select[name=week]').change(function () {
            loadDetail();
        });

    })
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
