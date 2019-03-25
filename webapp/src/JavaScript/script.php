

function AddPhone2(){
    document.getElementById('addphone2').style.visibility = 'hidden';
    document.getElementById('phonerow2').style.visibility = 'visible';
    document.getElementById('addphone3').style.visibility = 'visible';
    document.getElementById('removephone2').style.visibility = 'visible';
}

function RemovePhone2(){
    document.getElementById('phonerow2').style.visibility = 'hidden';
    document.getElementById('addphone3').style.visibility = 'hidden';
    document.getElementById('removephone2').style.visibility = 'hidden';
    document.getElementById('addphone2').style.visibility = 'visible';
}

function AddPhone3(){
    document.getElementById('addphone3').style.visibility = 'hidden';
    document.getElementById('removephone2').style.visibility = 'hidden';
    document.getElementById('phonerow3').style.visibility = 'visible';
}

function RemovePhone3(){
    document.getElementById('phonerow3').style.visibility = 'hidden';
    document.getElementById('addphone3').style.visibility = 'visible';
    document.getElementById('removephone2').style.visibility = 'visible';
}

$(document).ready(function(){
    $('#phone1').mask('(000)000-0000');
    $('#phone2').mask('(000)000-0000');
    $('#phone3').mask('(000)000-0000');

    
    $("#personnalinformation").validate({
        rules:{
            address: {
                required:true
            },
            city:{
                required:true
            },
            zipcode:{
                required:true,
                minlength:5,
                maxlength:7
            },
            dateofbirth:{
                required:true
            },
            occupation:{
                required:true
            },
            phone1:{
                required:true
            }
        },
    })
});
