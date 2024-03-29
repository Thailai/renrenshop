<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('commission/common', TEMPLATE_INCLUDEPATH)) : (include template('commission/common', TEMPLATE_INCLUDEPATH));?>
<div class="fui-page fui-page-current page-commission-log-detail">
    <div class="fui-header">
        <div class="fui-header-left">
            <a class="back"></a>
        </div>
        <div class="title"> 详情</div>
    </div>
    <div class="fui-content navbar">
        <div class='content-empty' style='display:none;'>
            <i class='icon icon-manageorder'></i><br/>暂时没有任何数据
        </div>
        <div class="fui-list-group" id="container"style="background: #f3f3f3"></div>
        <div class='infinite-loading'><span class='fui-preloader'></span><span class='text'> 正在加载...</span></div>


        <script id='tpl_commission_log_order' type='text/html'>
            <%each list as order%>
            <div class="fui-list-group">
                <div class="fui-list" style="font-size: .6rem;color: #000;">
                    申请<?php  echo $this->set['texts']['commission']?>: <%order.ordercommission%> <?php  echo $this->set['texts']['yuan']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;审核<?php  echo $this->set['texts']['commission']?>：<%order.orderpay%> <?php  echo $this->set['texts']['yuan']?>
                </div>
                <%each order.goods as g%>
                <div class="fui-list" style="background: #f9f9f9;margin-bottom: .1rem;">
                    <div class="fui-list-media">
                        <img src="<%g.thumb%>" class="round">
                        <!--<div class="badge">1</div>-->
                    </div>
                    <div class="fui-list-inner">
                        <div class="row">
                            <div class="row-text"><%g.title%></div>
                        </div>
                        <div class="subtitle"><?php  echo $this->set['texts']['commission']?>: <%g.commission%> <?php  echo $this->set['texts']['yuan']?></div>
                    </div>
                    <div class="row-remark">
                        <p><%g.level%>级</p>
                        <p style="<%if g.status==1%>color:#ff8000;<%else if g.status==2%>color:#ff5555;<%else if g.status==3%>color:#04ab02;<%else%>color:#b2b2b2;<%/if%>"><%g.statusstr%></p>
                    </div>
                </div>
                <%/each%>
                <div class="fui-list">
                    <div class="fui-list-inner">
                        <p>订单编号: <%order.ordersn%></p>
                        <p>订单金额: <%order.goodsprice%> <?php  echo $this->set['texts']['yuan']?></p>
                        <!--<p>申请<?php  echo $this->set['texts']['commission']?>: <%order.ordercommission%> <?php  echo $this->set['texts']['yuan']?></p>-->
                        <!--<p>审核<?php  echo $this->set['texts']['commission']?>: <%order.orderpay%> <?php  echo $this->set['texts']['yuan']?></p>-->
                        <!--<p>提现手续费:<%order.deductionmoney%> <?php  echo $this->set['texts']['yuan']?></p>-->
                    </div>
                </div>
            </div>
            <%/each%>
        </script>

        <script language='javascript'>
            require(['../addons/ewei_shopv2/plugin/commission/static/js/log.js'], function (modal) {
                modal.initDetail("<?php  echo $_GPC['id'];?>");
            });
        </script>

    </div>
</div>
<?php  $this->footerMenus()?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>

