<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];


	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}
	
	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i]) //업로드한 파일이 존재하면 0 1 2
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
            //GetImageSize(서버에 업로드된 파일 경로 파일명)
              // => 파일의 너비와 높이값, 종류
			$image_width[$i] = $imageinfo[0];  //파일너비
			$image_height[$i] = $imageinfo[1]; //파일높이
			$image_type[$i]  = $imageinfo[2];  //파일종류

        if ($image_width[$i] > 785) // 785px는 레이아웃의 너비 
				$image_width[$i] = 785;
		}
		else
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>효성그룹</title>

	<link rel="stylesheet" href="../common/css/common.css">
	 <link rel="stylesheet" href="./common/css/concert.css">
	<link rel="stylesheet" href="./common/css/listtt.css">

    <script src="https://kit.fontawesome.com/087fc1f4e8.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
</head>
<body>
	
</body>
</html>
<script>
    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
</script>
</head>

<body>
<div class="wrap">
       <!-- 서브 헤더영역 -->
	   <? include "../common/sub_header.html" ?>

	   <div class="visual">
        <img src= "./images/magearzin_08.jpg" alt="비쥬얼메인">
        <h3>홍보센터</h3>
        <P>PUBLIC RELATIONS</P>
		</div>

		<div class="sub_menu">
        <ul class="menu">
            <li class="subli"><a href="../greet/list.php">뉴스센터</a></li>
			<li class="current_subli"><a href="../event/list.php">효성프렌즈</a></li>
            <li class="subli"><a href="../sub6/sub6_3.html">홍보자료</a></li>
        </ul>
    </div> 

	
	<article id="content">
        <div class="title_area">
		<div class="line_map">home&gt;홍보채널&gt; <strong>효성프렌즈</strong></div>
            <h2>효성프렌즈</h2>
            <img src="./images/bule.png" alt="표시선">

        </div>
		

		<div class="content_area">

<div id="view_title">
<div id="view_title1"><?= $item_subject ?></div><div id="view_title2"><?= $item_nick ?> | 조회 : <?= $item_hit ?>  
					  | <?= $item_date ?> </div>	
</div>

<div id="view_content">
<?
for ($i=0; $i<3; $i++)
{
if ($image_copied[$i])  //첨부된 이미지가 있으면
{
$img_name = $image_copied[$i];  //'2021_07_22_11_00_35_0.jpg'
$img_name = "./data/".$img_name;  // './data/2021_07_22_11_00_35_0.jpg'
$img_width = $image_width[$i];

echo "<img src='$img_name' width='$img_width' alt=''>"."<br><br>";
}
}
?>
<?= $item_content ?>
</div>

<div id="view_button">
	<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
if($userid==$item_id || $userid=="gy9146" || $userlevel==1 )
{
	?>
	<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
	<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">삭제</a>&nbsp;
<?
}
 
if($userid)
{
?>
	<a href="write_form.php?table=<?=$table?>">글쓰기</a>
<?
}
?>
</div>

</div>

</article>

<!-- 서브 푸터영역 -->

<? include "../common/sub_footer.html" ?>

</div>
<!--JQuery-->

</body>
</html>