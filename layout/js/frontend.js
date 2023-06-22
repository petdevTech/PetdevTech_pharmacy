$(function(){
// 'use strict';

// switch between login and sign in
$('.login-page h1 span').click(function (){
$(this).addClass('selected').siblings().removeClass('selected');
$('.login-page form').hide();
$('.' + $(this).data('class')).fadeIn(100);
});


//make the login form rotate
// var login = document.getElementById('login');
//     login.addEventListener('mousemove', (e) =>{
//         var x = (window.innerWidth / 2 - e.pageX) / 12;
//         var y = (window.innerHeight / 2 - e.pageY) / 12;
//         login.style.transform = 'rotateX(' + x +'deg) rotateY(' + y +'deg)';
//     });
//     login.addEventListener('mouseleave', function(){
//         login.style.transform = 'rotateX(0deg) rotateY(0deg)';

//     });

// //make signup form rotate
// var signup = document.getElementById('signup');
//     signup.addEventListener('mousemove', (e) =>{
//         var x = (window.innerWidth / 2 - e.pageX) / 12;
//         var y = (window.innerHeight / 2 - e.pageY) / 12;
//         signup.style.transform = 'rotateX(' + x +'deg) rotateY(' + y +'deg)';
//     });
//     signup.addEventListener('mouseleave', function(){
//         signup.style.transform = 'rotateX(0deg) rotateY(0deg)';

//     });



//Trigger the SelectBoxIt
$("select").selectBoxIt({
    autowidth: true
});

//hide placeholder  on form focus
$('[placeholder]').focus(function(){

$(this).attr('data-text' , $(this).attr('placeholder'));
$(this).attr('placeholder', '');
}).blur(function(){

$(this).attr('placeholder' , $(this).attr('data-text'));
});

//add asterisk on fields that are required
$('input').each(function(){
    if($(this).attr('required') === 'required'){
        $(this).after('<span class= "asterisk">*</span>')
    }
    
    });


//confirmation Message on delete Button
$('.confirm').click(function (){
    return Confirm('Are You Sure?');
});


//live preview
    $('.live').keyup(function () {
        //console.log($(this).val());
        //$('.live-preview .caption h3').text($(this).val());
        //console.log($(this).data('class'));

        $($(this).data('class')).text($(this).val());

    });
    


///////////////////////////////////////////////////////////////////////////////////////////////

    // start cart page

    // add minus plus button for quantity
    $('.btn-minuse').on('click', function(){            
        $(this).parent().siblings('input').val(parseInt($(this).parent().siblings('input').val()) - 1)})

    $('.btn-pluss').on('click', function(){            
        $(this).parent().siblings('input').val(parseInt($(this).parent().siblings('input').val()) + 1)})


        //function to get user select from Category in the Home page 
    // function showCat(str) {
    //     if (str == "") {
    //         document.getElementById("selectedItems").innerHTML = "";
    //         return;
    //     } else {
    //         var xmlhttp = new XMLHttpRequest();
    //         xmlhttp.onreadystatechange = function() {
    //         if (this.readyState == 4 && this.status == 200) {
    //             document.getElementById("selectedItems").innerHTML = this.responseText;
    //         }
    //         };
    //         xmlhttp.open("GET","action.php?q="+str,true);
    //         xmlhttp.send();
    //     }
    // }

    
}); //end of document ready


