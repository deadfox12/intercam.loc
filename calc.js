//тут будут наши обработчики
jQuery( document ).ready(function( $ ) {
  //блокирует поле "с учетом углов"
  $('.ucet-uglov').on('change',function (){
  !$(this).is(':checked') ? $('.ucet-uglov-input').attr('disabled','disabled') : $('.ucet-uglov-input').removeAttr('disabled');
  });
  
  //выбор камня из списка
  $('.kamni-spisok').on('change',function(){
  var elm=$(this).find('option:selected');
  
  $('.kamni-spisok-c').text($(elm).attr('c0')+"р");

  });
  
  //нажатие на кнопку итого
  $('.submit').on('click',function (){
  var shirina=parseFloat($('.shirina').val());
  var visota=parseFloat($('.visota').val());
  var kvadratura=shirina*visota;
  $('.kvadratura-tr, .cena-pm-tr').fadeOut(0);
  $('.kvadratura-tr').fadeIn(900);
  
  var lavel_cen=0;
  var lavel_c=0;
  var ucet_uglov=$('.ucet-uglov').prop('checked')?$('.ucet-uglov-input').val():0;
  var cena_pm=0;
  if ($('.ucet-uglov').prop('checked')) {
  
    $('.cena-pm-tr').fadeIn(900);
    cena_pm=($('.ucet-uglov-input').attr('cena'+lavel_cen))*ucet_uglov;
    $('.cena-pm').text(cena_pm+'р');
  }

  $('.kvadratura').html(kvadratura+'м<sup>2</sup>');
  var itogo=cena_pm;
  
  $('.itogo-calc').text(itogo+'р');
  });

});