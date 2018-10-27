/*
Template Name: Material Pro Admin
Author: Themedesigner
Email: niravjoshi87@gmail.com
File: js
*/
$( document ).ready(function() {
  $(function () {
      $(".preloader").fadeOut("slow");
      $('[data-toggle="tooltip"]').tooltip();
  });

  $("body").on("click", ".dropbtn", function (e){
    $('.dropbtn').addClass('rm-wishlist');
    $('.dropdown-content').slideDown( "fast" );
  });

	$("body").on("click", ".rm-wishlist", function (e){
    $('.dropbtn').removeClass('rm-wishlist');
    $('.dropdown-content').hide();
  });


});
