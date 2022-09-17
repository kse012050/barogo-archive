$(document).ready(function(){
    setTimeout(function(){
        listLayout();

    },100)
    $(window).resize(function(){
        listLayout();
    })

    $(window).scroll(function(){
        $(window).scrollTop() > 0 ? $('header').addClass('active') : $('header').removeClass('active');
    })


    $('.openBtn').click(function(e){
        e.stopPropagation();
        let fieldsetWidth = $('header .CW .searchBox fieldset').width();
        $(this).hide();
        $('.searchBox').animate({width:fieldsetWidth});
        $('.searchBox').addClass('active');
    })
    
    $('body').click(function(){
        if($('.searchBox').hasClass('active')){
            $('.searchBox').animate({width:24},function(){
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
        
    }

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
})