<?php include "head.php"; ?>
<body>
    <div class="subPage">
        <?php include "header.php"; ?>

        <main class="articlePage CW">
            <div class="topBox">
                <h2>Article</h2>
                <p>
                    바로고가 전하는<br/>
                    업계 정보와 트렌드
                </p>
            </div>

            <ul class="btnBox">
                <?php
                if(checkArray($tags,true)){
                    foreach ($tags as $item){
                        $active = "";
                        if($item["tag_name"] == $tag) $active = 'class="active"';
                        if(empty($tag) && $item["tag_name"] == "ALL")$active = 'class="active"';
                        ?>
                        <li><button data-tag="<?=$item["tag_name"]?>" <?=$active?>><?=$item["tag_name"]?></button></li>
                        <?php
                    }
                }
                ?>
<!--                <li><button class="active">ALL</button></li>-->
<!--                <li><button>바로고라이더</button></li>-->
            </ul>
            <ul class="listBox">
                <?php
                if(checkArray($list,true)){
                    foreach ($list as $item){
                        // >> 본문 html태그 다 없애기
                        // >> 두줄로 제한해야되기 떄문에
                        $content   = stripslashes($item["content"]);
                        $content   = strip_tags($content);
                        if(mb_strlen($content)>110){
                            $content = mb_str_split($content,110);
                            $content = (count($content)>0) ? $content[0]."..." : "";
                        }
                        $tagInfos = $item["tag_group"];
                        if(!empty($tagInfos))$tagInfos = explode(",",$tagInfos);
                        ?>
                        <li>
                            <a href="<?=ARCHIVE_URL?>/detail/<?=$item["board_id"]?>">
                                <img src="<?=(!empty($item["ct_thum_file_path"]))?$item["ct_thum_file_path"]:$item["cp_thum_file_path"]?>" alt="">
                                <div>
                                    <?php
                                    if(checkArray($tagInfos,true)){
                                        foreach ($tagInfos as $t){
                                            ?>
                                            <mark><?=$t?></mark>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <strong><?=$item["subject"]?></strong>
                                <p><?=$content?> </p>
                                <time><?=str_replace("-",".",$item["reg_date"])?></time>
                            </a>
                        </li>
                        <?php
                    }
                }
                ?>

<!--                <li>-->
<!--                    <a href="detail.php">-->
<!--                        <img src="images/main/right02.png" alt="">-->
<!--                        <div>-->
<!--                            <mark>바로고라이더</mark>-->
<!--                        </div>-->
<!--                        <strong>바로고, 비전ㆍCI변경 ‘초연결 생태계 플랫폼으로 도약’</strong>-->
<!--                        <p>바로고가 새로운 비전과 기업 이미지(CI)를 선보이고, ‘세상에 활력을 더하는 초연결 생태계 플랫폼’으로 도약한다고 18일 밝혔다.</p>-->
<!--                        <time>2022.06.15</time>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="detail.php">-->
<!--                        <img src="images/main/right04.png" alt="">-->
<!--                        <div>-->
<!--                            <mark>바로고라이더</mark>-->
<!--                            <mark>News</mark>-->
<!--                            <mark>바로고사장님</mark>-->
<!--                        </div>-->
<!--                        <strong>바로고 도시주방, ‘밀집’과 MOU… ‘외식 브랜드 경쟁력 강화’</strong>-->
<!--                        <p>바로고가 운영하는 주방 플랫폼 '도시주방'이 '밀집'과 MOU를 체결했습니다. 양사는 외식 브랜드 경쟁력 강화 및 공동 사업 분야 발굴을 위해 협업할 계획입니다.</p>-->
<!--                        <time>2022.06.15</time>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="detail.php">-->
<!--                        <img src="images/main/right03.png" alt="">-->
<!--                        <div>-->
<!--                            <mark>News</mark>-->
<!--                        </div>-->
<!--                        <strong>바로고, 딜리버리랩과 상점주 위한 식자재 유통 효율화 방안 모색</strong>-->
<!--                        <p>바로고가 식자재 통합 유통 플랫폼 ‘오더히어로’의 운영사 ‘딜리버리랩’과 전략적 투자 계약을 체결했다고 12일 밝혔다.</p>-->
<!--                        <time>2022.06.15</time>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="detail.php">-->
<!--                        <img src="images/main/right05.png" alt="">-->
<!--                        <div>-->
<!--                            <mark>바로고라이더</mark>-->
<!--                        </div>-->
<!--                        <strong>바로고, KT 알뜰폰 유심배송…“배송 품목 범위 확장”</strong>-->
<!--                        <p>바로고가 KT와 서비스 제휴를 맺고 알뜰폰 유심을 배송한다고 19일 밝혔다. 바로고가 KT와 서비스 제휴를 맺고 알뜰폰 유심을 배송한다고 19일 밝혔다.</p>-->
<!--                        <time>2022.06.15</time>-->
<!--                    </a>-->
<!--                </li>-->
            </ul>
        </main>

        <?php include "../footer.php"; ?>
    </div>
</body>
</html>