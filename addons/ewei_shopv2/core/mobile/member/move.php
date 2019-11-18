<?php  if( !defined("IN_IA") ) 
{
	exit( "Access Denied" );
}
class Move_EweiShopV2Page extends MobileLoginPage 
{
	public function main() {
		global $_W;
		global $_GPC;

		if ($_W['isajax']) {
			$money = $_GPC['move_money'];
			$openid = $_GPC['openid'];
			$myopenid = $_W['openid'];
			$mycredit2 =  $_W['member']['credit2'];
			$info = '';
          	if (!$money) {
				$info = "余额不能为空！";
			}elseif($money <= 0){
				$info = "请填写正确余额！";
			}elseif (!$openid) {
				$info = "请选择转移会员！";
			}elseif($money > $mycredit2){
				$info = "余额不足";
			}else{
				m('member')->setCredit($myopenid, "credit2", -$money);
				m('member')->setCredit($openid, "credit2", $money);
				$info = "转移成功！";
			}
			echo $info;
		}
	}
}