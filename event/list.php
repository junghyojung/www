<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$table = "event";
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

    <!--[if IE 9]>  
          <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->

    <?
  

	include "../lib/dbconn.php";

	if (!$scale){
       $scale=10; 			// 한 화면에 표시되는 글 수
	}

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>    
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
            <li class="subli"><a href="../concert/list.php">뉴스센터</a></li>
			<li class="current_subli"><a href="../event/list.php">효성프랜즈</a></li>
            <li class="subli"><a href="../sub6/sub6_3.html">홍보자료</a></li>
        </ul>
    </div> 

	
	<article id="content">
        <div class="title_area">
             <div class="line_map">home&gt;홍보채널&gt; <strong>효성프렌즈</strong></div>
            <h2>효성프렌즈</h2>
            <img src="./images/bule.png" alt="표시선">
			<p>“효성소식을 빠르고 정확하게 전해드립니다.”</p>

        </div>
        

            <div class="content_area">

		<select class="scale" name="scale" onchange="location.href='list.php?scale='+this.value">
                    <option value=''>보기</option>
                    <option value='5'>5</option>
                    <option value='10'>10</option>
                    <option value='15'>15</option>
                    <option value='20'>20</option>
         </select>

		<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
		<div id="list_search">
			<div id="list_search1">TOTAL : <?= $total_record ?> 건  </div>
			<div class="list_search_group">

			<div id="list_search3">
				<select name="find">
                    <option value='subject'>제목</option>
                    <option value='content'>내용</option>
                    <option value='nick'>별명</option>
                    <option value='name'>이름</option>
				</select></div>
			<div id="list_search4"><input type="text" name="search"></div>
			<div id="list_search5"><input type="submit" value="검색"></div>
			</div>
		</div>
		</form>



        <div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	  if(!$row[file_copied_0]){
        $thum_img = './data/default.jpg'; 
	  }else{
	  	$thum_img =$row[file_copied_0];  //첫번째 업로드된 이미지 파일  2021_07_22_11_00_35_0.jpg
	  	$thum_img = './data/'.$thum_img;  //   ./data/2021_07_22_11_00_35_0.jpg
	  }
?>
			<div class="list_item">
		      <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
				<div class="list_item1">
				       <img src="<?=$thum_img?>" alt="" >
				       <span class="subject"><?= $item_subject ?></span>
				</div>
				<div class="list_itemwrap">
				  <div class="list_item2">NO.<?= $number ?></div>
				  <div class="list_item3"><?= $item_nick ?></div>
				  <div class="list_item4"><?= $item_date ?></div>
				  <div class="list_item5"><?= $item_hit ?></div>
				</div>
			  </a>
			</div>
<?
   	   $number--;
   }
?>
			<div id="page_button">
				<div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='list.php?table=$table&page=$i&scale=$scale'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
				</div>
				<div id="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid)
	{
?>
		<a href="write_form.php?table=<?=$table?>">글쓰기</a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->


            </div>

        </article>

<!-- 서브 푸터영역 -->
<? include "../common/sub_footer.html" ?>

     </div>
<!--JQuery-->
<!-- <script src="../common/js/jquery-1.12.4.min.js"></script>
<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
<script src="../common/js/fullnav.js"></script> -->
</body>
</html>