$(function(){
'use strict';

$("#previewMyimg").click(function(){
    $("#avatar").click();
    $('#avatar').change(function(){
        var file = URL.createObjectURL(event.target.files[0]);
        $('#previewMyimg').attr('src', file);

    });
    
    // ("#previewMyimg").attr('src', myimg);
    // $(this).html('<input type="file" name="avatar" class="form-control-lg" required="required" style="display:none"> ');

    


    /***the code from the internet
 * https://www.geeksforgeeks.org/preview-an-image-before-uploading-using-jquery/
 */
//  $('#avatar').change(function(){
//         const file = $(this).file;
//         console.log(file);
//         if (file){
//           let reader = new FileReader();
//           reader.onload = function(event){
//             console.log(event.target.result);
//             $('#imgPreview').attr('src', file);
//           } 
//           reader.readAsDataURL(file);
//         }
//       });
 /**/


});

$('.toggle-info').click(function(){
$(this).toggleClass('selected').parent().next('.card-body').fadeToggle(100);
if($(this).hasClass('selected')){
    $(this).html('<i class="fa fa-minus fa-lg"></i>');
}else{
    $(this).html('<i class="fa fa-plus fa-lg"></i>');
}
});

//Trigger the SelectBoxIt
// $("select").selectBoxIt({
//     autowidth: true
// });

/*************************************************************** */
//hide placeholder  on form focus
// $('[placeholder]').focus(function(){

// $(this).attr('data-text' , $(this).attr('placeholder'));
// $(this).attr('placeholder', '');
// }).blur(function(){

// $(this).attr('placeholder' , $(this).attr('data-text'));
// });
/************************************************************** */


/************************************************************* */
//make the login form rotate
var loginad = document.getElementById('loginadmin');
    loginad.addEventListener('mousemove', (e) =>{
        var x = (window.innerWidth / 2 - e.pageX) / 12;
        var y = (window.innerHeight / 2 - e.pageY) / 12;
        loginad.style.transform = 'rotateX(' + x +'deg) rotateY(' + y +'deg)';
    });
    loginad.addEventListener('mouseleave', function(){
        loginad.style.transform = 'rotateX(0deg) rotateY(0deg)';

});

/************************************************************* */

//add asterisk on fields that are required
$('input').each(function(){
    if($(this).attr('required') === 'required'){
        $(this).after('<span class= "asterisk">*</span>')
    }
    
    });

//convert password field to text on hover

var passfield = $('.password');

$('.show-pass').click(function(){

 passfield.attr('type', 'text');

}, function (){
    passfield.attr('type', 'password');

});

//confirmation Message on delete Button
$('.confirm').click(function (){
    return confirm('Are You Sure?');
});

//Category View Option
$('.cat h3').click(function(){
    $(this).next('.full-view').fadeToggle(200);
});
$('.option span').click(function(){
$(this).addClass('active').siblings('span').removeClass('active');
if ($(this).data('view') === 'full'){
    $('.cat .full-view').fadeIn(200);
}else{
    $('.cat .full-view').fadeOut(200);
}
});



//members add active class
$('.role-nav').click('li', function(){
    $('.role-nav li a.active').removeClass('active');
    $(this).next('li a').addClass('active');
});





//show delete button on Child Cats
// video num 119
$('.child-link').hover(function (){
    $(this).find('.show-delete').fadeIn(400);
}, function(){
    $(this).find('.show-delete').fadeOut(400);
});



// start cards page
// let contain = document.querySelector('.cardstyle');
// let item = document.querySelectorAll('.item');

// document.body.addEventListener('mousemove', (e) =>{

// let x = (window.innerWidth / 2 - e.pageX) / 30;
// let y = (window.innerHeight / 2 - e.pageY) / 30;

// contain.style.transform = `rotateX(${-y}deg) rotateY(${-x}deg)`;

// [].forEach.call(item, item =>{
// item.style.transform = `translateY(${y}px) translateX(${x}px)`;
// });

// });


}); //end of document ready