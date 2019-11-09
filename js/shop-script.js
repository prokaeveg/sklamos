$(document).ready(function() {

	//гормошка-категорий товаров
   $(".block-categories > ul > li > a").click(function(){
	if ($(this).attr("class") !="active"){
		// черех парамметр this передается на какую ссылку нажали и применяется актив
		$(".block-categories > ul > li > ul").slideUp(400); //закрыть отвечает
		$(this).next().slideToggle(400); // открыть
		$(".block-categories > ul > li > a").removeClass("active"); //удаление классов со всех категорий
		$(this).addClass("active");//присваеваем класс к конкретной категории (но класс нужно прописать в стилях) 
		$.cookie('select_cat', $(this).attr("id")); //указ на плагин кук создается файл с селект_кат и указ ай ди (ИНДЕКС 1(2,3))
	}else
 	{
		$(".block-categories > ul > li > a").removeClass("active");
		$(".block-categories > ul > li > ul").slideUp(400);
		$.cookie("select_cat", "");
 	}
});

if ($.cookie("select_cat") != "")
{
$(".block-categories > ul > li > #"+$.cookie("select_cat")).addClass("active").next().show();
}

	$('.block-news').jCarouselLite({
		vertical: true,
		hoverPause: true,
		btnPrev: '.news-prev',
		btnNext: '.news-next',
		visible: 3,
		auto:3000,
		speed:500
	});



});