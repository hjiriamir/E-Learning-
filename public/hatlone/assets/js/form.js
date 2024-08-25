$(document).ready(function(){

    $(".next").click(function(){
        var form = $("#myform");
        form.validate({
            errorElement: 'span',
            errorClass: 'help-block',
            highlight: function(element, errorClass, validClass) {
                $(element).closest('.form-group').addClass("has-error");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).closest('.form-group').removeClass("has-error");
            },
            rules: {
                title: {
                    required: true,
                    minlength: 5,
                },
                description: {
                    required: true,
                    minlength: 10,
                },
                skill: {
                    required: true,
                },
                highlight1: {
                    required: true,
                    minlength: 10,
                },
                highlight2: {
                    required: true,
                    minlength: 10,
                },
                highlight3: {
                    required: true,
                    minlength: 10,
                },
                img: {
                    required: true,
                },
                vd: {
                    required: true,
                },
                category: {
                    required: true,
                },
                subcategory: {
                    required: true,
                },
                language: {
                    required: true,
                },
                level: {
                    required: true,
                },
                test: {
                    required: true,
                },
            },
            messages: {
                title: {
                    required: "* required field",
                },
                description: {
                    required: "* required field",
                },
                skill: {
                    required: "* required field",
                },
                highlight1: {
                    required: "* required field",
                },
                highlight2: {
                    required: "* required field",
                },
                highlight3: {
                    required: "* required field",
                },
                img: {
                    required: "* required field",
                },
                vd: {
                    required: "* required field",
                },
                category: {
                    required: "* required field",
                },
                subcategory: {
                    required: "* required field",
                },
                language: {
                    required: "* required field",
                },
                level: {
                    required: "* required field",
                },
                test: {
                    required: "* required field",
                }
            },
            errorPlacement: function(error, element) {
                if ( element.is(":checkbox") ) {
                    error.appendTo( element.parents('.form-group') );
                } else {
                     // This is the default behavior 
                    error.insertAfter( element );
                }
            },
        });
        if (form.valid() === true){
            if ($('#course_info').is(":visible")){
                current_fs = $('#course_info');
                next_fs = $('#description_thumbnail');
            }else if($('#description_thumbnail').is(":visible")){
                current_fs = $('#description_thumbnail');
                next_fs = $('#category_language_level');
            }else if($('#category_language_level').is(":visible")){
                current_fs = $('#category_language_level');
                next_fs = $('#skills_highlights');
            }
            
            next_fs.show(); 
            current_fs.hide();
        }
    });

    $('#previ').click(function(){
        if($('#description_thumbnail').is(":visible")){
            current_fs = $('#description_thumbnail');
            next_fs = $('#course_info');
        }else if ($('#category_language_level').is(":visible")){
            current_fs = $('#category_language_level');
            next_fs = $('#description_thumbnail');
        }
        else if ($('#skills_highlights').is(":visible")){
            current_fs = $('#skills_highlights');
            next_fs = $('#category_language_level');
        }
        next_fs.show(); 
        current_fs.hide();
    });

    $('#prev').click(function(){
        if($('#description_thumbnail').is(":visible")){
            current_fs = $('#description_thumbnail');
            next_fs = $('#course_info');
        }else if ($('#category_language_level').is(":visible")){
            current_fs = $('#category_language_level');
            next_fs = $('#description_thumbnail');
        }
        else if ($('#skills_highlights').is(":visible")){
            current_fs = $('#skills_highlights');
            next_fs = $('#category_language_level');
        }
        next_fs.show(); 
        current_fs.hide();
    });

    $('#previous').click(function(){
        if($('#description_thumbnail').is(":visible")){
            current_fs = $('#description_thumbnail');
            next_fs = $('#course_info');
        }else if ($('#category_language_level').is(":visible")){
            current_fs = $('#category_language_level');
            next_fs = $('#description_thumbnail');
        }
        else if ($('#skills_highlights').is(":visible")){
            current_fs = $('#skills_highlights');
            next_fs = $('#category_language_level');
        }
        next_fs.show(); 
        current_fs.hide();
    });
 
});
