<?php 
require_once '../include.php';
checkLogined();
$order=$_REQUEST['order']?$_REQUEST['order']:null;
$orderBy=$order?"order by p.".$order:null;
$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:null;
$where=$keywords?"where p.problem like '%{$keywords}%'":null;
//得到数据库中所有图片
$sql="select p.id,p.problem,p.detail,p.albumpath,u.username from imooc_problem as p join imooc_user u on p.id=u.id {$where}  ";
$totalRows=getResultNum($sql);
$pageSize=8;
$totalPage=ceil($totalRows/$pageSize);
$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select p.id,p.pName,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.kingdom,h.phylum,g.gang,m.mu,k.ke,n.genus from imooc_pro as p join imooc_cate c on p.cId=c.id join imooc_phylum h on p.cId1=h.id join imooc_gang g on p.cId2=g.id join imooc_mu m on p.cId3=m.id join imooc_ke k on p.cId4=k.id join imooc_genus n on p.cId5=n.id {$where} {$orderBy} limit {$offset},{$pageSize}";
$rows=fetchAll($sql);

?>