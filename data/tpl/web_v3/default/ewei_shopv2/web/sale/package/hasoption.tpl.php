<?php defined('IN_IA') or exit('Access Denied');?><style type="text/css">
    .modal-dialog{width:920px;}
    .modal-dialog .input-group-addon{
        padding:0;
    }
    .modal-dialog .fa{
        margin-right: 0;
    }
    .content .table{border-collapse:collapse;border:none;}
    .content .table tr{border-collapse: collapse;border-left:1px solid #ededed;border-right:1px solid #ededed;}
    .content .table > tbody > tr > td{border-top:1px solid #ededed;border-left:0;border-right:0;}
</style>
<div class="content_hasoption">
    <!--<form class="form-horizontal form-validate" action="<?php  echo webUrl('sale/package/hasoption')?>" method="post" enctype="multipart/form-data">-->
        <input type='hidden' name='pid' value='<?php  echo $pid;?>' />
        <input type='hidden' name='goodsid' value='<?php  echo $goodsid;?>' />

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close hasoption-close" type="button">×</button>
                    <h4 class="modal-title">设置</h4>
                </div>
                <div class="modal-body content">
                    <table class="table" border="1" cellspacing="0" width="100%" cellpadding="0">
                        <thead style="background: #f7f7f7;">
                        <tr>
                            <th style=""><?php  if($option) { ?>规格<?php  } else { ?>商品<?php  } ?>名称</th>
                            <th style="width:80px;">原价</th>
                            <th style="width:80px;">
                                <?php  if($option) { ?>
                                <div style="padding-bottom:10px;text-align:center;">套餐价格</div>
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm option_price_all"  VALUE=""/>
                                    <span class="input-group-addon">
                                        <a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol('option_price');"></a>
                                    </span>
                                </div>
                                <?php  } else { ?>套餐价格<?php  } ?>
                            </th>
                            <?php  if($commission_level && $goods['nocommission'] == 0) { ?>
                            <th style="width:80px;">
                                <?php  if($option) { ?>
                                <div style="padding-bottom:10px;text-align:center;">一级分销</div>
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm option_commission1_all"  VALUE=""/>
                                    <span class="input-group-addon">
                                        <a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol('option_commission1');"></a>
                                    </span>
                                </div>
                                <?php  } else { ?>一级分销<?php  } ?>
                            </th>
                            <?php  if($commission_level > 1) { ?>
                            <th style="width:80px;">
                                <?php  if($option) { ?>
                                <div style="padding-bottom:10px;text-align:center;">二级分销</div>
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm option_commission2_all"  VALUE=""/>
                                    <span class="input-group-addon">
                                        <a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol('option_commission2');"></a>
                                    </span>
                                </div>
                                <?php  } else { ?>二级分销<?php  } ?>
                            </th>
                            <?php  } ?>
                            <?php  if($commission_level > 2) { ?>
                            <th style="width:80px;">
                                <?php  if($option) { ?>
                                <div style="padding-bottom:10px;text-align:center;">三级分销</div>
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm option_commission3_all"  VALUE=""/>
                                    <span class="input-group-addon">
                                        <a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol('option_commission3');"></a>
                                    </span>
                                </div>
                                <?php  } else { ?>三级分销<?php  } ?>
                            </th>
                            <?php  } ?>
                            <?php  } ?>
                            <?php  if($option) { ?>
                            <th style="width:50px;text-align: right;">全选 <input type='checkbox' /></th>
                            <?php  } ?>
                        </tr>
                        </thead>
                        <tbody id="param-items" class="ui-sortable">
                        <?php  if($option) { ?>
                        <?php  if(is_array($option)) { foreach($option as $item) { ?>
                        <tr class="multi-product-item option-item" data-id="<?php  echo $item['id'];?>">
                            <td><?php  echo $item['title'];?></td>
                            <td>&yen;<?php  echo $item['marketprice'];?></td>
                            <td style="">
                                <input name="option_price_<?php  echo $item['id'];?>" type="text" class="form-control option_price option_price_<?php  echo $item['id'];?>" placeholder="0" value="<?php  echo $item['packageprice'];?>">
                            </td>
                            <?php  if($commission_level && $goods['nocommission'] == 0) { ?>
                            <td style="">
                                <input name="option_commission1_<?php  echo $item['id'];?>" type="text" class="form-control option_commission1 option_commission1_<?php  echo $item['id'];?>" placeholder="0" value="<?php  echo $item['commission1'];?>">
                            </td>
                            <?php  if($commission_level > 1) { ?>
                            <td style="">
                                <input name="option_commission2_<?php  echo $item['id'];?>" type="text" class="form-control option_commission2 option_commission2_<?php  echo $item['id'];?>" placeholder="0" value="<?php  echo $item['commission2'];?>">
                            </td>
                            <?php  } ?>
                            <?php  if($commission_level > 2) { ?>
                            <td style="">
                                <input name="option_commission3_<?php  echo $item['id'];?>" type="text" class="form-control option_commission3 option_commission3_<?php  echo $item['id'];?>" placeholder="0" value="<?php  echo $item['commission3'];?>">
                            </td>
                            <?php  } ?>
                            <?php  } ?>
                            <td style="text-align: right;"><input type='checkbox' name="optionid" <?php  if($item['isoption']) { ?>checked<?php  } ?> value="<?php  echo $item['id'];?>"/></td>
                        </tr>
                        <?php  } } ?>
                        <?php  } else { ?>
                            <tr class="multi-product-item goods-item" data-id="<?php  echo $item['id'];?>">
                                <td><?php  echo $packgoods['title'];?></td>
                                <td>&yen;<?php  echo $packgoods['marketprice'];?></td>
                                <td style="">
                                    <input name="package_goods_price<?php  echo $goodsid;?>" type="text" class="form-control package_goods_price<?php  echo $goodsid;?>" placeholder="0" value="<?php  echo $packgoods['packageprice'];?>">
                                    <input type="hidden" name="package_goods" data-goodsid="<?php  echo $goodsid;?>" data-id="<?php  echo $packgoods['id'];?>">
                                </td>
                                <?php  if($commission_level && $goods['nocommission'] == 0) { ?>
                                <td style="">
                                    <input name="package_goods_commission1<?php  echo $goodsid;?>" type="text" class="form-control package_goods_commission1<?php  echo $goodsid;?>" placeholder="0" value="<?php  echo $packgoods['commission1'];?>">
                                </td>
                                <?php  if($commission_level > 1) { ?>
                                <td style="">
                                    <input name="package_goods_commission2<?php  echo $goodsid;?>" type="text" class="form-control package_goods_commission2<?php  echo $goodsid;?>" placeholder="0" value="<?php  echo $packgoods['commission2'];?>">
                                </td>
                                <?php  } ?>
                                <?php  if($commission_level > 2) { ?>
                                <td style="">
                                    <input name="package_goods_commission3<?php  echo $goodsid;?>" type="text" class="form-control package_goods_commission3<?php  echo $goodsid;?>" placeholder="0" value="<?php  echo $packgoods['commission3'];?>">
                                </td>
                                <?php  } ?>
                                <?php  } ?>
                            </tr>
                        <?php  } ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" id="option_submit">确认</button>
                    <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
                </div>
            </div>
    <!--</form>-->

</div>

<script type="text/javascript">
    $(function(){
        $(".option-item input[name=optionid]").removeProp('checked');
        var optionid = $("#packagegoods"+<?php  echo $goodsid;?>+"").val()
        if(<?php  echo $hasoption;?> && optionid){
            var opArray = optionid.split(",");
            $(opArray).each(function(index){
                var specs = $("input[name='packagegoodsoption"+this+"']").val();
                if(specs){
                    var specsArray = specs.split(",");
                    $(".option_price_"+this+"").val(specsArray[0]);
                    $(".option_commission1_"+this+"").val(specsArray[1]);
                    $(".option_commission2_"+this+"").val(specsArray[2]);
                    $(".option_commission3_"+this+"").val(specsArray[3]);
                }

            });
        }else{
            var pgoods = $("input[name='packgoods"+<?php  echo $goodsid;?>+"']").val();
            if(pgoods){
                var pgoodsArray = pgoods.split(",");
                $(".package_goods_price"+<?php  echo $goodsid;?>+"").val(pgoodsArray[0]);
                $(".package_goods_commission1"+<?php  echo $goodsid;?>+"").val(pgoodsArray[1]);
                $(".package_goods_commission2"+<?php  echo $goodsid;?>+"").val(pgoodsArray[2]);
                $(".package_goods_commission3"+<?php  echo $goodsid;?>+"").val(pgoodsArray[3]);
            }
        };

        $(".option-item").each(function(){
            if(optionid.indexOf($(this).find("input[name=optionid]").val()) >= 0){
                $(this).find("input[name=optionid]").prop('checked','true');
            }
        })
        //是否有规格提交
        $("#option_submit").on("click",function(){
            var option = [];
            var optoinhtml = '';
            var packagegoods = [];
            var packageprice = 0;
            var commission1 = 0;
            var commission2 = 0;
            var commission3 = 0;
            $("#param-items .option-item").each(function (index) {
                if($(this).find("input[name='optionid']").prop("checked")){
                    option[index] = $(this).find("input[name='optionid']").val();
                    packageprice = $(this).find("input[name^='option_price']").val() ? parseFloat($(this).find("input[name^='option_price']").val()) : 0;
                    commission1 = $(this).find("input[name^='option_commission1']").val() ? parseFloat($(this).find("input[name^='option_commission1']").val()) : 0;
                    commission2 = $(this).find("input[name^='option_commission2']").val() ? parseFloat($(this).find("input[name^='option_commission2']").val()) : 0;
                    commission3 = $(this).find("input[name^='option_commission3']").val() ? parseFloat($(this).find("input[name^='option_commission3']").val()) : 0;
                    packagegoods[index] = [packageprice,commission1,commission2,commission3];
                    optoinhtml += '<input type="hidden" value="'+packagegoods[index]+'" name="packagegoodsoption'+option[index]+'" >';
                }
            })

            if(option.length > 0){
                $.ajax({
                    url:"<?php  echo webUrl('sale/package/option',array('type'=>'option'))?>",
                    type:'get',
                    data:{option:option},
                    dataType:'json',
                    async : false, //默认为true 异步
                    success:function(data){
                        $("#packagegoods"+<?php  echo $goodsid;?>+"").val(option);
                        if(!data.result.title){
                            $("#optiontitle"+<?php  echo $goodsid;?>+"").html("设置");
                        }else{
                            $("#optiontitle"+<?php  echo $goodsid;?>+"").html(""+data.result.title+"...");
                            var $objOption = $("#packagegoods"+<?php  echo $goodsid;?>+"").nextAll();
                            if($objOption){
                                $objOption.remove();
                            }
                            $("#packagegoods"+<?php  echo $goodsid;?>+"").after(optoinhtml)
                        }

                    }
                });
            }else{
                //无规格提交
                var goodsid = $("input[name='package_goods']").attr("data-goodsid");
                var price = $("input[name='package_goods_price"+goodsid+"']").val();
                var commission1 = $("input[name='package_goods_commission1"+goodsid+"']").val();
                var commission2 = $("input[name='package_goods_commission2"+goodsid+"']").val();
                var commission3 = $("input[name='package_goods_commission3"+goodsid+"']").val();
                var packagegoods = [price,commission1,commission2,commission3];

                var packagegoodshtml = '<input type="hidden" value="'+packagegoods+'" name="packgoods'+<?php  echo $goodsid;?>+'" >';
                if($("input[name='packgoods"+goodsid+"']").val()){
                    $("input[name='packgoods"+goodsid+"']").remove();
                    $("#optiontitle"+goodsid+"").after(packagegoodshtml)
                }else{
                    $("#optiontitle"+goodsid+"").after(packagegoodshtml)
                }
                $("#optiontitle"+goodsid+"").html("&yen;"+price);
            }

            //关闭弹窗
            $('.hasoption-close').trigger('click');
        })
    })
    function setCol(cls){
        $("."+cls).val( $("."+cls+"_all").val());
    }

</script>



