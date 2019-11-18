<?php defined('IN_IA') or exit('Access Denied');?><div class="modal-dialog" style="width: 800px">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
                选择特惠商品
            </h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="col-sm-1 control-label"></label>
                <div class="col-sm-12">
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <a class="input-group-addon">搜索</a>
                    </div>
                </div>
            </div>
            <br>
            <table class="table table-striped" style="width: 100%">
                <br>
                <thead>
                <tr>
                    <th style="width: 15rem;overflow: hidden">商品名称</th>
                    <th style="width: 12rem;text-align: center">选择规格</th>
                    <th style="width: 8rem;text-align: center">原价</th>
                    <th style="width: 8rem;text-align: center">优惠价</th>
                    <th style="width: 8rem;text-align: center">数量</th>
                    <th style="text-align: center">选择</th>
                </tr>
                </thead>
                <tbody>
                <?php  if(is_array($list)) { foreach($list as $gk => $gv) { ?>
                <tr style="text-align: center" id="<?php  echo $gv['id'];?>">
                    <td style="text-align: left"><?php  echo $gv['title'];?></td>
                    <td>
                        <?php  if(empty($gv['spc'])) { ?>
                        无规格
                        <?php  } else { ?>
                        <select class="form-control" id="sel<?php  echo $gv['id'];?>">
                            <?php  if(is_array($gv['spc'])) { foreach($gv['spc'] as $ok => $ov) { ?>
                            <option value="<?php  echo $ov['id'];?>" data-price="<?php  echo $ov['marketprice'];?>" data-name="<?php  echo $ov['title'];?>"><?php  echo $ov['title'];?></option>
                            <?php  } } ?>
                        </select>
                        <?php  } ?>
                    </td>
                    <td><?php  echo $gv['marketprice'];?>元</td>
                    <td><input type="text" class="form-control price"></td>
                    <td><input type="text" class="form-control num" value="1"></td>
                    <td style="text-align: center"><a onclick="clickselect(this)" class="label label-primary" data-id="<?php  echo $gv['id'];?>" id="sel<?php  echo $gv['id'];?>" data-name="<?php  echo $gv['title'];?>">选择</a></td>
                </tr>
                <?php  } } ?>
                <tr>
                    <td colspan="6" class="text-center">
                        <div>
                            <ul class="pagination pagination-centered">
                                <?php  if($page >1) { ?><li><a href="javascript:;" page="0" class="pager-nav">首页</a></li>
                                <li><a href="javascript:;" page="<?php  echo $pageprev;?>" class="pager-nav">«上一页</a></li><?php  } ?>
                                <?php  if($page <$pagelast) { ?><li><a href="javascript:;" page="<?php  echo $pagenext;?>" class="pager-nav">下一页»</a></li>
                                <li><a href="javascript:;" page="<?php  echo $pagelast;?>" class="pager-nav">尾页</a></li><?php  } ?>
                            </ul>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div><!-- modal-content -->
</div><!--modal-dialog-->
<script>
    $(function () {
        $(".pager-nav").click(function () {
            getpagecontent($(this).attr('page'),'<?php  echo $type;?>');
        })
    })
</script>