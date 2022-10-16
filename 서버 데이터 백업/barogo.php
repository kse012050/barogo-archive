<?php include "head.php"; ?>
<body>
    <div class="subPage">
        <?php include "header.php"; ?>

        <main class="barogoPage">
            <section class="CW">
                <div class="topBox">
                    <h2>가이드</h2>
                    <p>
                        똑똑한 바로고 사용법<br/>
                        가이드를 확인해보세요
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
<!--                    <li>-->
<!--                        <a href="detail.php">-->
<!--                            <img src="images/barogo/barogo01.png" alt="">-->
<!--                            <div>-->
<!--                                <mark>바로고피플</mark>-->
<!--                            </div>-->
<!--                            <strong>광명수산 사장님 배달에는 한계가 없다! 성장 가능성 무한!</strong>-->
<!--                            <p>회는 직접 가서 먹어야 한다? 그 편견을 깨고 배달로 승승장구 수원의 배달 횟집 중 단연 BEST OF BEST 광명수산! 바로고에서 직접 수원에 위치한 광명수산을 찾아갑니다.</p>-->
<!--                            <time>2022.06.15</time>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="detail.php">-->
<!--                            <img src="images/barogo/barogo02.png" alt="">-->
<!--                            <div>-->
<!--                                <mark>바로고피플</mark>-->
<!--                            </div>-->
<!--                            <strong>늘 믿고 맡기는 바로고 TGIF 롯데캐슬 잠실점</strong>-->
<!--                            <p>회는 직접 가서 먹어야 한다? 그 편견을 깨고 배달로 승승장구 수원의 배달 횟집 중 단연 BEST OF BEST 광명수산! 바로고에서 직접 수원에 위치한 광명수산을 찾아갑니다.</p>-->
<!--                            <time>2022.06.15</time>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="detail.php">-->
<!--                            <img src="images/barogo/barogo03.png" alt="">-->
<!--                            <div>-->
<!--                                <mark>News</mark>-->
<!--                            </div>-->
<!--                            <strong>당신은 나의 영웅, 바로고가 응원합니다</strong>-->
<!--                            <p>2022년 바로고는 새로운 도약을 준비합니다. 세상에 활력을 더하는 초연결 생태계를 만드는 것. 새롭게 태어날 바로고가 달려갈 길입니다.</p>-->
<!--                            <time>2022.06.15</time>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="detail.php">-->
<!--                            <img src="images/barogo/barogo04.png" alt="">-->
<!--                            <div>-->
<!--                                <mark>News</mark>-->
<!--                            </div>-->
<!--                            <strong>당신은 나의 영웅, 바로고가 응원합니다</strong>-->
<!--                            <p>2022년 바로고는 새로운 도약을 준비합니다. 세상에 활력을 더하는 초연결 생태계를 만드는 것. 새롭게 태어날 바로고가 달려갈 길입니다.</p>-->
<!--                            <time>2022.06.15</time>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="detail.php">-->
<!--                            <img src="images/barogo/barogo03.png" alt="">-->
<!--                            <div>-->
<!--                                <mark>바로고피플</mark>-->
<!--                            </div>-->
<!--                            <strong>'바로고는 저를 대신해 주는 '대변인'이에요'</strong>-->
<!--                            <p>회는 직접 가서 먹어야 한다? 그 편견을 깨고 배달로 승승장구 수원의 배달 횟집 중 단연 BEST OF BEST 광명수산! 바로고에서 직접 수원에 위치한 광명수산을 찾아갑니다.</p>-->
<!--                            <time>2022.06.15</time>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="detail.php">-->
<!--                            <img src="images/barogo/barogo05.png" alt="">-->
<!--                            <div>-->
<!--                                <mark>바로고피플</mark>-->
<!--                            </div>-->
<!--                            <strong>'바로고는 저를 대신해 주는 '대변인'이에요'</strong>-->
<!--                            <p>회는 직접 가서 먹어야 한다? 그 편견을 깨고 배달로 승승장구 수원의 배달 횟집 중 단연 BEST OF BEST 광명수산! 바로고에서 직접 수원에 위치한 광명수산을 찾아갑니다.</p>-->
<!--                            <time>2022.06.15</time>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="detail.php">-->
<!--                            <img src="images/barogo/barogo04.png" alt="">-->
<!--                            <div>-->
<!--                                <mark>News</mark>-->
<!--                            </div>-->
<!--                            <strong>당신은 나의 영웅, 바로고가 응원합니다</strong>-->
<!--                            <p>2022년 바로고는 새로운 도약을 준비합니다. 세상에 활력을 더하는 초연결 생태계를 만드는 것. 새롭게 태어날 바로고가 달려갈 길입니다.</p>-->
<!--                            <time>2022.06.15</time>-->
<!--                        </a>-->
<!--                    </li>-->
                </ul>
            </section>
        </main>

        <?php include "../footer.php"; ?>
    </div>
</body>
</html>