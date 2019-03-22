

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

    $("#forminscription1").validate({
        errorClass : "error_class",
        errorelement : "em",
        rules:{
            gender:{
                required:true
            },
            password: {
                required : true,
                minlength : 7
            },
            password2: {
                required : true,
                equalTo:"#password"
            },
            firstname:{
                required:true
            },
            lastname:{
                required:true
            },
            email:{
                required:true,
                email:true
            },
            email2:{
                required:true,
                email:true,
                equalTo:"#email"
            }
        },
        messages:{
            password2:{
                required : 'Ce champ est obligatoire',
                equalTo:'REEEEEEEEEEEEEEEEEEEEEEEEEEEEEEe'
            },
            password:{
                required : 'Ce champ est obligatoire',
                minlength: 'Le mot de passe doit contenir au moins 7 caractères.'
            }
        },
        errorPlacement: function(error, element){
            if(element.is(":radio")){
                error.appendTo(element.parents('.radio'));
            }
            else{
                error.insertAfter(element);
            }
        },
        submitHandler:function(){
            var output = $.ajax({
                url:"index.php",
                type:'POST',
                dataType: 'html',
                data:{email:$("#email").val(),email2:$("#email2").val(),password:$("#password").val(),
                      password2:$("#password2").val(),firstname:$("#firstname").val(),lastname:$("#lastname").val(),
                      gender:$("[name=gender]:checked").val()},
                success:function(output){console.log(output);
                    if(output.trim() == 'availlable'){
                        window.location = 'index.php?action=inscription';
                    }
                    else if(output.trim() == 'taken'){
                        $("#emailinuse").html("<p>Email in use.</p>");
                    }
                    else if(output.trim() == 'passworderror'){
                        $("#passworderror").html("<p>Ne correspond pas.</p>");
                    }else if(output.trim() == 'emailerror'){
                        $("#emailerror").html("<p>Ne correspond pas.</p>");
                    }else if(output.trim() == 'emptyfield'){
                        $("#empty").html("<p> Un ou plusieurs champs sont vide.</p>");
                    }
                },
            });
        }
    });
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
