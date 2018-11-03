<?php
  $k = $_GET["kind"];
  $w = $_GET["keyword"];
 ?>

 <p>기사 유형 (kind): <?php print $k; ?></p>
 <p>키워드 (keyword)는 [<?php print $w; ?>] 입니다.</p>

 <?php
    if ($k == "news")
        $result_url = "'https://www.naver.co.kr/search?tbm=nws&q=$w'";
        elseif ($k == "blog")
        $result_url = "https://www.youtube.com/?gl=KR&hl=ko";
        elseif($k == "search")
        $result_url = "https://music.naver.com/";
        ?>
<script type="text/javascript">
  window.open( <?php print $result_url; ?>)
</script>
