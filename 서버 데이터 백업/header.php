<header>
    <div class="CW">
        <h1><a href="<?=ARCHIVE_URL?>">barogo logo</a></h1>
        <nav>
            <ul>
                <li class="<?=($thisfilename == FILE_ARTICLE) ? "active" :"" ?>"><a href="<?=ARCHIVE_URL?>/article">아티클</a></li>
                <li class="<?=($thisfilename == FILE_BAROGO) ? "active" :"" ?>"><a href="<?=ARCHIVE_URL?>/barogo">가이드</a></li>
            </ul>
        </nav>
        <a href="" class="goBack">뒤로가기</a>
        <button class="openBtn">검색창 열기</button>
        <div class="searchBox">
            <fieldset>
                <input type="search" placeholder="Search" id="searchinput" value="<?=$search?>">
                <input type="submit" value="검색">
                <button class="closeBtn">검색창 닫기</button>
            </fieldset>
        </div>
    </div>
</header>