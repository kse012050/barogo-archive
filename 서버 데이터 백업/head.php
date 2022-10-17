<?php
require_once "../admin/admin.php";
$thisfilename = basename($_SERVER['PHP_SELF'],".php");
//echo $_SERVER['REQUEST_URI'];

$menu       ="";
$page       = 1;
$limit      = 20;
$list       = null;
$paging     = null;
$total_count="";
$tags       = null;
$tag        = "";
$search     = "";

// >> 컨텐츠 아카이브 게시글 가져오기!!~
if($thisfilename == FILE_INDEX
    || $thisfilename == FILE_ARTICLE
    || $thisfilename == FILE_BAROGO){

    $type = BOARD_TYPE_400;
    if(checkArrayVal("page", $_REQUEST)) $page   = $_REQUEST["page"];
    if(checkArrayVal("tag", $_REQUEST)) $tag   = $_REQUEST["tag"];
    if(checkArrayVal("search",$_REQUEST)) $search = $_REQUEST["search"];
    if($thisfilename == FILE_ARTICLE){
        $menu = 100;
        $tags = boardTags($type,$menu);
    }
    else if($thisfilename == FILE_BAROGO){
        $menu = 200;
        $tags = boardTags($type,$menu);
    }
    $params = array("page"    => $page, "limit"   => $limit, "type"=>$type,"exposure_yn"=>"y", "menu" => $menu, "tag" =>$tag,"search"=>$search);

    $result         = board($params);
    $list           = $result["data_list"];
    $paging         = $result["paging"];
    $total_count    = $paging["total_count"];
}
// 아카이브 상세
if($thisfilename == FILE_DETAIL ){
    $id = checkArrayVal("id",$_REQUEST) ? $_REQUEST["id"] : "";
    if (empty($id)) {
        // id 값이 없을 경우
        pageBack();
    }
    insertTrackingLog(array("trackingType"=>TRANKING_TYPE_B_PAGEVIEW,"referId"=>$id));
    $data = boardDetail($id);
}
$site = site();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Iphone 모바일 확대 방지 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ,maximum-scale=1.0, user-scalable=0"">
    <title>바로고 아카이브</title>
    <link rel="icon" href="<?=ARCHIVE_IMG_URL?>/common/favicon.png">
    <link rel="stylesheet" href="<?=ARCHIVE_CSS_URL?>/import.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="<?=ARCHIVE_JS_URL?>/common.js"></script>
    <script src="<?=MAIN_JS_URL?>/web.js"></script>
</head>
<form id="formSearch" action="<?= $thisfilename ?>">
    <input type="hidden" name="page" id="page" value="<?=$page?>">
    <input type="hidden" name="tag"  id="tag" value="<?=$tag?>">
    <input type="hidden" name="search"  id="search" value="<?=$search?>">
</form>