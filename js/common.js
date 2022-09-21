let responsiveWidth = 769;
$(document).ready(function(){
    // 리스트 배치
    setTimeout(function(){
        listLayout();
    },100)

    // 리사이즈시 리스트 배치 및 서치 박스 재조정
    $(window).resize(function(){
        listLayout();
        $(window).width() < responsiveWidth && $('header .CW .searchBox.active').width('calc(100% - 40px)')
    })

    // 스크롤시 해더
    $(window).scroll(function(){
        $(window).scrollTop() > 0 ? $('header').addClass('active') : $('header').removeClass('active');
    })

    // 서치 클릭
    searchClick();

    // 리스트 클릭 필터
    listFilter();

    // 상세페이지 뒤로가기 버튼
    detailGoBack();

    // 푸터 메뉴 클릭
    footerMenu();



    // 서치 클릭
    function searchClick(){
        $('.openBtn').click(function(e){
            e.stopPropagation();
            let fieldsetWidth = $('header .CW .searchBox fieldset').width();
            $(this).hide();
            $(window).width() >= responsiveWidth ? $('.searchBox').animate({width:fieldsetWidth}) : $('.searchBox').animate({width:$(window).width() - 40 + 'px'});
            $('.searchBox').addClass('active');
        })
        
        $('body').click(function(){
            if($('.searchBox').hasClass('active')){
                let unActiveWidth;
                $(window).width() >= responsiveWidth ? unActiveWidth = 24 : unActiveWidth = 20;
                $('.searchBox').animate({width:unActiveWidth},function(){
                    $('.openBtn').show();
                });
                $('.searchBox').removeClass('active');
            }
        })
        $('.searchBox').click(function(e){
            e.stopPropagation();
        })

        $('.closeBtn').click(function(e){
            e.preventDefault();
            if($(this).hasClass('active')){
                $('input[type="search"]').val('');
                $('.closeBtn').removeClass('active');
            }
        })

        
        $('input[type="search"]').on('input',function(e){
            e.stopPropagation();
            if($('input[type="search"]').val() != ""){
                $('.closeBtn').addClass('active');
            }else{
                $('.closeBtn').removeClass('active');
            }
        })
    }   /* 서치 클릭 fin */

    // 상세페이지 뒤로가기 버튼
    function detailGoBack(){
        $('.goBack').click(function(e){
            e.preventDefault();
            history.back();
        })
    }   /* 상세페이지 뒤로가기 버튼 fin */

    // 리스트 배치
    function listLayout(){
        let listBox = $('.listBox');
        let listBoxWidth = $('.listBox').width();
        let listCount = Math.ceil(listBoxWidth / 500);
        listCount > 4 && (listCount = 4);
        let list = $('.listBox').find('li');
        let listGap = 20;
        let listArray = []
        let listWidth = (listBoxWidth - (listGap * (listCount - 1))) / listCount
        for(let a = 0; a < listCount; a++){
            listArray.push(0);
        }
    
        list.css('width', listWidth);
        list.each(function(i){
            if($(this).css('display') == 'none'){return}
            let numb = Math.floor(i % listCount);
            numb = listArray.indexOf(Math.min(...listArray));
            $(this).css({
                left : (listWidth * numb) + (listGap * numb),
                top : Math.min(...listArray)
            })
            listArray[numb] = $(this).height() + listGap + listArray[numb];
        })
        listBox.css('height',Math.max(...listArray));
        
    }   /* 리스트 배치 fin */

    // 리스트 클릭 필터
    function listFilter(){
        $('.btnBox li button').click(function(){
            $('.btnBox li button').removeClass('active');
            $(this).addClass('active');
            let test = $(this).text();
            let list = $('.listBox').find('li');
            list.each(function(){
                $(this).stop().fadeIn();
                if($(this).find('mark').text().indexOf(test) < 0 && test != 'ALL'){
                    $(this).stop().hide();
                }
            })

            listLayout();
        })
    }   /* 리스트 클릭 필터 fin */

    
    // 푸터 메뉴 클릭
    function footerMenu(){
        $('footer .topArea div .linkArea > li b').click(function(){
            if($(window).width() < responsiveWidth){
                $(this).toggleClass('active')
                $(this).next().stop().slideToggle();
            }
        })
    }   /* 푸터 메뉴 클릭 fin */
})