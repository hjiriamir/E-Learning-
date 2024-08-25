
var step = 1;
var form = $("#formCourse");
function validate_form() {
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
    
}
//let btn_nexttitle = document.getElementById("btn_nexttitle");
//btn_nexttitle.addEventListener("click",function(){
 /*  function title_in() {
        validate_form();
        if (form.valid() === true){
            if (step === 1) {
                var titre=document.getElementsByName("title")[0].value;
                console.log($('#step_1').is(":visible"));
                $.ajax({  
                    url:        '/cours/add',  
                    type:       'POST',   
                    dataType:   'json',
                    data: {'titre': titre },                    
                    success: function(data, status) {                         
                        console.log("123456")
                       if(data['status']=='success'){
                        console.log(data);
                        document.getElementsByName("title")[0].value="";
                        current_step = $('#step_1');
                        next_step = $('#step_2');
                        step++;
                        next_step.show();
                        current_step.hide();
                       }
                    },  
                    error : function(xhr, textStatus, errorThrown) {
                       console.log(xhr)
                    }  
                 });
                
            }else if (step === 2) {
                var image_file = document.getElementById('imageInput');
                var video_file = document.getElementById('videoInput');
                var desc = document.getElementById('descrip');
                
                var image_ = image_file.files[0];//file
                var video_ = video_file.files[0];//file
                var data = new FormData();
                data.append('img', image_, image_.name);
                data.append('vid',video_,video_.name);
                data.append('desc',desc.value);
                console.log(data);
                var statusSpan = document.getElementById('error-file-video');
                //alert(video_.size);
                if (video_.size>=100000000){
                    statusSpan.innerHTML='* You cannot upload this file because its size exceeds the maximum limit of 100 MB.';
                }else{
                    $.ajax({
                        url: '/cours/add',
                        type: "POST",
                        data: data,
                        //dataType:'json',
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function(data, status) {                         
                            //console.log(data);
                            if(data['status']=='success'){
                                current_step = $('#step_2');
                                next_step = $('#step_3');
                                step++;
                                next_step.show();
                                current_step.hide();
                            }                            
                         },  
                         error : function(xhr, textStatus, errorThrown) {  
                             console.log(textStatus);
                             console.log(errorThrown);
                         }  
                    });
                }
                
                
            }else if (step === 3) {
                current_step = $('#step_3');
                next_step = $('#step_4');
                step++;
                next_step.show();
                current_step.hide();                
            }
            
        }
    //});
   }*/
    let btn_prev=document.getElementById("btn_prev");
    btn_prev.addEventListener("click",function(){
        if(step === 2) {
            $.ajax({  
                url:        '/cours/read_info_cours',  
                type:       'POST',   
                dataType:   'json',                    
                success: function(data, status) {                         
                   if(data['status']=='success'){
                    document.getElementsByName("title")[0].value=data['titre'];
                    current_step = $('#step_2');
                    next_step = $('#step_1');
                    step--;
                    next_step.show();
                    current_step.hide();
                   }
                },  
                error : function(xhr, textStatus, errorThrown) {
                   console.log(xhr)
                }  
             });
            
        }else if (step === 3) {
            current_step = $('#step_3');
            next_step = $('#step_2');
            step--;
        }
        else if (step === 4) {
            current_step = $('#step_4');
            next_step = $('#step_3');
            step--;
        }
        
        current_step.hide();
        next_step.show(); 

    });


function vid_im() {
            var image_file = document.getElementById('imageInput');
            var video_file = document.getElementById('videoInput');
            var desc = document.getElementsByName('description')[0];
            
            var image_ = image_file.files[0];//file
            var video_ = video_file.files[0];//file
            var data = new FormData();
            data.append('img', image_, image_.name);
            data.append('vid',video_,video_.name);
            data.append('desc',desc.value);
            console.log(data);
            var statusSpan = document.getElementById('error-file-video');
            //alert(video_.size);
            if (video_.size>=100000000){
                statusSpan.innerHTML='* You cannot upload this file because its size exceeds the maximum limit of 100 MB.';
            }else{
                $.ajax({
                    url: '/cours/add',
                    type: "POST",
                    data: data,
                    //dataType:'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data, status) {                         
                        //console.log(data);
                        if(data['status']=='success'){
                            current_step = $('#step_2');
                            next_step = $('#step_3');
                            step++;
                            next_step.show();
                            current_step.hide();
                        }                            
                     },  
                     error : function(xhr, textStatus, errorThrown) {  
                         console.log(textStatus);
                         console.log(errorThrown);
                     }  
                });
            }
}

/*function level() {
    current_step = $('#step_3');
            next_step = $('#step_4');
            step++;
            next_step.show();
            current_step.hide();   
}*/
function title_in() {
    validate_form();
    if (form.valid() === true){
            var titre=document.getElementsByName("title")[0].value;
            console.log($('#step_1').is(":visible"));
            $.ajax({  
                url:        '/cours/add',  
                type:       'POST',   
                dataType:   'json',
                data: {'titre': titre },                    
                success: function(data, status) {                         
                    console.log("123456")
                   if(data['status']=='success'){
                    console.log(data);
                    document.getElementsByName("title")[0].value="";
                    current_step = $('#step_1');
                    next_step = $('#step_2');
                    step++;
                    next_step.show();
                    current_step.hide();
                   }
                },  
                error : function(xhr, textStatus, errorThrown) {
                   console.log(xhr)
                }  
             });
            
        
        
    }
//});
}
/** fin page ajout cours info **/

/*********** page ajout categorie , sous categorie , items, subitems, langue , level ************ */    
let btn_save_level = $("#btn_save_level");
let btn_next_level = $("#btn_next_level");
let saveLevelClicked = false;
let nextLevelClicked = false;
btn_save_level.on("click", function () {
        level();
        saveLevelClicked = true;
        btn_save_level.prop('disabled', true);
        alert("catgegory level language saved !");
});   
btn_next_level.on("click", function () {
        if (saveLevelClicked) {
            current_step = $('#step_3');
            next_step = $('#step_4');
            step++;
            next_step.show();
            current_step.hide(); 
        } else {
            nextLevelClicked = true;
            level();
            current_step = $('#step_3');
            next_step = $('#step_4');
            step++;
            next_step.show();
            current_step.hide(); 
            saveLevelClicked = true;
            btn_save_level.prop('disabled', true);
        }
});
function level() {
    // Récupérer les inputs sélectionnés dans $('.sous-category .sous-cat')
    var CategorieValue = $('.cat input[name="flexRadioDefault"]:checked').val();
    var Categorie = parseInt(CategorieValue, 10);

    // Récupérer les inputs sélectionnés dans $('.sous-category .sous-cat')
    var sousCategorieVal = $('.sous-category .sous-cat input[name="flexRadioDefault2"]:checked').val();
    var sousCategorie = parseInt(sousCategorieVal, 10);

    // Récupérer les inputs sélectionnés dans $('.sous-category-items .sous-cat-items')
    var selecteditems = $('input[name="flexRadioDefault3"]:checked').map(function () {
        var label = $('label[for="' + $(this).attr('id') + '"]').text();
        return label;
    }).get();

     // Récupérer les inputs sélectionnés dans $('.sous-items')
     var buttonNames=[];
     var selectedSousitems = $('input[name="flexRadioDefault4"]:checked').map(function() {
         var label = $('label[for="' + $(this).attr('id') + '"]').text();
        // buttonNames.push(label);
         return label;
     }).get();
 

    var langueValue = $('input[name="language"]:checked').val();
    var langue = parseInt(langueValue, 10);

    var levelValue = $('input[name="level"]:checked').val();
    var level = parseInt(levelValue, 10);

    const buttonsContainer = document.getElementById("buttonsContainer");
    const addedButtonsContainer = document.getElementById("selected-tags-list");

    console.log("category: ", Categorie);
    console.log("sous category: ", sousCategorie);
    console.log("items: ", selecteditems);
    console.log("sousitems: ", selectedSousitems);
    console.log("selectedLanguages: ", langue);

    let catMessage = document.getElementById("categoryMessage");
    let subcatMessage = document.getElementById("subcategoryMessage");
    let itemsMessage = document.getElementById("itemsMessage");
    let langueMessage = document.getElementById("langueMessage");
    let levelMessage = document.getElementById("levelMessage");

    catMessage.innerHTML = "";
    subcatMessage.innerHTML = "";
    itemsMessage.innerHTML = "";
    langueMessage.innerHTML = "";
    levelMessage.innerHTML = "";

    if (!CategorieValue) {
        showAlert("*Choose a category for your course!", "categoryMessage");
        return;
    }
    if (!sousCategorieVal) {
        showAlert("*Choose a subcategory now!", "subcategoryMessage");
        return;
    }
    if (selecteditems.length === 0) {
        showAlert("*Choose at least one item!", "itemsMessage");
        return;
    }
    if (!langueValue) {
        showAlert("*Choose a language!", "langueMessage");
        return;
    }
    if (!levelValue) {
        showAlert("*Choose a level!", "levelMessage");
        return;
    }
    else{
        var sousItems = $('input[name="flexRadioDefault3"]:checked').map(function () {
            var value = $(this).val();
            var valueID=parseInt(value, 10);
            return valueID;
        }).get();
        // Effectuer une requête AJAX pour chaque item sélectionné
            sousItems.forEach(function (item) {
                var tabcheckSubItems=[];
                var subItemsChecked = $('input[name="flexRadioDefault4"]').map(function() {
                    var label = $('label[for="' + $(this).attr('id') + '"]').text();
                    var itm = $(this).data('item');
                    var itmInt = parseInt(itm, 10);
                
                    if (itmInt === item && $(this).is(':checked')) {
                        buttonNames.push(label);
                        tabcheckSubItems.push(label);
                        return label;
                    }
                }).get();            
        
                if (tabcheckSubItems.length === 0) {
                    $.ajax({
                        url: '/cours/read-sous-items',
                        method: 'POST',
                        data: { "idItem": item },
                        success: function(data, status) {
                            $.each(data['data'], function(index, element) {
                                var label = element.label;
                                var id = element.id;
                                console.log("les sous items trouvés : ", label);
                                buttonNames.push(label);
                            });
                        },
                        error: function(xhr, status, error, data) {
                            console.error(error);
                            console.error(data);
                        }
                    });
                }
            });
    
            // Effectuer la requête AJAX finale pour enregistrer les données
            $.ajax({
                url: '/cours/add',
                type: "POST",
                data: {
                    'category': Categorie,
                    "subCategory": sousCategorie,
                    "items": selecteditems,
                    "sousItems": selectedSousitems,
                    "langue": langue,
                    "level": level
                },
                dataType: 'json',
                success: function (data, status) {
                    console.log(data);
                    if(data['status']=='success'){
                        for (let i = 0; i < buttonNames.length; i++) {
                            const button = document.createElement("button");
                            button.innerHTML = buttonNames[i];
                            button.classList.add("my-button");
                            buttonsContainer.appendChild(button);
                            addedButtonsContainer.style.display = 'block';
                            let buttonAdded = false;
                          
                            button.onclick = function(event) {
                              event.preventDefault(); 
                              if (!buttonAdded) {
                                const newButton = document.createElement("button");
                                newButton.innerHTML = buttonNames[i] + " <span class='my-button delete'>x</span>";
                                newButton.classList.add("my-button", "added");
                                addedButtonsContainer.insertBefore(newButton, addedButtonsContainer.firstChild);
                          
                                const deleteButton = newButton.querySelector(".my-button.delete");
                                deleteButton.onclick = function() {
                                  addedButtonsContainer.removeChild(newButton);
                                  buttonAdded = false;
                                };
                          
                                buttonAdded = true;
                              }
                            };
                          }                     
                    } 
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
    }
    
}

// Écouteur d'événement de modification pour les cases à cocher
$("input[type='checkbox']").on("change", function () {
    if (saveLevelClicked || nextLevelClicked) {
        btn_save_level.prop('disabled', false);
        saveLevelClicked = false;
        nextLevelClicked = false;
    }
});

// Écouteur d'événement de modification pour les boutons radio
$("input[type='radio']").on("change", function () {
    if (saveLevelClicked || nextLevelClicked) {
        btn_save_level.prop('disabled', false);
        saveLevelClicked = false;
        nextLevelClicked = false;
    }
});
/*********** fin page ajout categorie , sous categorie , items, subitems, langue , level ************ */ 
/*function levelnext(){
    current_step = $('#step_3');
            next_step = $('#step_4');
            step++;
            next_step.show();
            current_step.hide();
            
}*/



/**********************  page update cours info  ************************/

/* update titre */
function title_next() {
    var titre=document.getElementsByName("title")[0].value;
    console.log($('#step_1').is(":visible"));
    $.ajax({  
        url:'/cours/update',  
        type:'POST',   
        dataType:'json',
        data: {'titre': titre },                    
        success: function(data, status) {         
            console.log($('#step_1').is(":visible"));
            current_step = $('#step_1');
            next_step = $('#step_2');
            step++;
            next_step.show();
            current_step.hide();
        },  
                error : function(xhr, textStatus, errorThrown) {
                   console.log(xhr)
                }  
             });
      
}
/* update description */
function updatevid_im() {
    var image_file = document.getElementById('imageInput');
    var video_file = document.getElementById('videoInput');
    var desc = document.getElementsByName('description')[0];
    if (image_file.files.length === 0 && video_file.files.length === 0 && desc.value === '') {
        current_step = $('#step_2');
                    next_step = $('#step_3');
                    step++;
                    next_step.show();
                    current_step.hide();
                    var ids = {
                        idcat: 1,          
                        idsouscat: 1,      
                        idItem: 2,
                        idsubitem: 6          
                      };
                      readallcat(ids);
                    $('.sous-category').show();
    }else{
        var data = new FormData();
        if(image_file.files.length > 0){
              var image_ = image_file.files[0];//file 
              data.append('img', image_, image_.name);
        }    
        if(video_file.files.length > 0){
            var video_ = video_file.files[0];//file
            data.append('vid',video_,video_.name);
            if (video_.size>=100000000){
                statusSpan.innerHTML='* You cannot upload this file because its size exceeds the maximum limit of 100 MB.';
            }
        }

    data.append('desc',desc.value);
   // console.log(data);
    var statusSpan = document.getElementById('error-file-video');
    //alert(video_.size);
    
        $.ajax({
            url: '/cours/update',
            type: "POST",
            data: data,
            //dataType:'json',
            processData: false,
            contentType: false,
            cache: false,
            success: function(data, status) {                         
                //console.log(data);
                if(data['status']=='success' || data['status']=='already updated'){
                    current_step = $('#step_2');
                    next_step = $('#step_3');
                    step++;
                    next_step.show();
                    current_step.hide();
                    readallcat(data['ids']);
                    //console.log(data['ids']);
                    $('.sous-category').show();
                    $('input[name="flexRadioDefault3"]').prop('checked', false);
                    $('input[name="flexRadioDefault4"]').prop('checked', false);
                }                            
             },  
             error : function(xhr, textStatus, errorThrown) {  
                 console.log(textStatus);
                 console.log(errorThrown);
             }  
        });
    
}
}


/* affichage liste category selected */

    function readallcat(ids) {
        var idcat = ids.idcat;
        var idlevel= ids.idlevel;
        var idlangue = ids.idlangue;
        var idItem = ids.idItem; 
        var idsousitem = ids.idsubitem;

        $('.col.cat input[name="flexRadioDefault"]').each(function() {
            if ($(this).val() == idcat) {
              $(this).prop('checked', true);
            }
          });
    
          $('input[name="language"]').each(function() {
            if ($(this).val() == idlangue) {
              $(this).prop('checked', true);
            }
          });
    
          $('input[name="level"]').each(function() {
            if ($(this).val() == idlevel) {
              $(this).prop('checked', true);
            }
          });
  
      var radioContainer1 = $('.sous-category .sous-cat');
      var radioContainer2 = $('.sous-category-items .sous-cat-items');
      var radioContainer3 = $('.sub-items .sub-item');
  
      radioContainer1.empty();
      radioContainer2.empty();
      radioContainer3.empty();
  
      $.ajax({
        url: '/cours/read-info-allcat',
        method: 'POST',
        data: {
          "ids":ids
        },
        success: function(data, status) {
          if (data.status === "success") {
            //console.log(data);
            var itemsDiv1 = $('<div></div>').addClass('card card label overflow-auto py-2 px-4 overflow1');
            var itemsDiv2 = $('<div></div>').addClass('card card label overflow-auto py-2 px-4 overflow1');
  
            $.each(data.data, function(index, element) {
              var labelsous_cat = element.labelsous_cat;
              var idsous_cat = element.idsous_cat;
              var labelitems = element.labelitems;
              var iditems = element.iditems;
                
                if (element.hasOwnProperty('idsous_cat'))  {
                var radioInput1 = $(
                  '<div class="form-check">' +
                  '<input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2' + index + '" value="' + idsous_cat + '">' +
                  '<label class="form-check-label" for="flexRadioDefault2' + index + '">' +
                  labelsous_cat +
                  '</label>' +
                  '</div>'
                );
                if (idsous_cat === ids.idsouscat) {
                    radioInput1.find('input').prop('checked', true); 
                }
                itemsDiv1.append(radioInput1);
              } else if (element.hasOwnProperty('iditems'))  {
                var radioInput2 = $(
                  '<div class="form-check">' +
                  '<input class="form-check-input" type="checkbox" name="flexRadioDefault3" id="flexRadioDefault3' + iditems + '" value="' + iditems + '">' +
                  '<label class="form-check-label" for="flexRadioDefault3' + iditems + '">' +
                  labelitems +
                  '</label>' +
                  '</div>'
                );
                if (ids.idItem.includes(iditems.toString())) {
                    radioInput2.find('input').prop('checked', true); 
                    retrieveDatasousitem(iditems,idsousitem);
                }
                itemsDiv2.append(radioInput2);
                }
            
            });
  
            radioContainer1.append(itemsDiv1);
            radioContainer2.append(itemsDiv2);
  
            $('.sous-category-items').toggle(data.data.length > 0);
            $('.sub-items').toggle(idItem !== undefined);
          }
        },
        error: function(xhr, status, error, data) {
          console.error(error);
          console.error(data);
        }
      });
    }
    function retrieveDatasousitem(idItem,idsousitem) {
        var radioContainer = $('.sub-items .sub-item');
        $('.sous-category-items .sous-cat-items input').prop('disabled', true);
        $.ajax({
          url: '/cours/read-sous-items',
          method: 'POST',
          data: { "idItem": idItem },
          success: function(data, status) {
            //console.log("data subitems",data);
             // Créer le nouvel élément itemsDiv
             var itemsDiv = $('<div></div>').addClass('card label overflow-auto py-2 px-4 overflow1 card-'+idItem+'');
              // Parcours des labels renvoyés
              $.each(data['data'], function(index, element) {
                var label = element.label;
                var id = element.id;
                //console.log(id);
                 // Créez l'élément input radio avec le label
                 var radioInput = $(
                  '<div class="form-check dynamic-checkbox-'+idItem+'">' +
                      '<input class="form-check-input" type="checkbox" name="flexRadioDefault4" data-item="'+idItem+'" id="flexRadioDefault4' + label + '" value="' + id + '">' +
                      '<label class="form-check-label" for="flexRadioDefault4' + label + '">' +
                      label +
                      '</label>' +
                   '</div>'
              );
             
              // Ajoutez l'élément input radio au conteneur
              itemsDiv.append(radioInput); 
              if (idsousitem.includes(id.toString())) {
                radioInput.find('input').prop('checked', true); 
                } 
              radioContainer.append(itemsDiv);
              //console.log(radioContainer);
      
            });
              
          },
          error: function(xhr, status, error, data) {
              console.error(error);
              console.error(data);
          }
      });
      $('.sous-category-items .sous-cat-items input').prop('disabled', false);
           
      }
  
    // Call readallcat on document ready
    readallcat();
  
    // Bind change event to update the categories and items
    $('input[name="flexRadioDefault"], input[name="flexRadioDefault2"], input[name="flexRadioDefault3"]').on('change', function() {
      readallcat();
    });

  

  /** Save update level catg **/
 
let btn_save_levelupdate = $("#btn_save_levelupdate");
let btn_next_levelupdate = $("#btn_next_levelupdate");
let saveLevelClickedupdate = false;
let nextLevelClickedupdate = false;
btn_save_levelupdate.on("click", function () {
    levelupdate();
        saveLevelClicked = true;
        btn_save_levelupdate.prop('disabled', true);
        alert("catgegory level language saved !");
});   
function nextlevelupdate() {
            levelupdate();
            current_step = $('#step_3');
            next_step = $('#step_4');
            step++;
            next_step.show();
            current_step.hide(); 
            btn_save_levelupdate.prop('disabled', true);
       // }
};
function levelupdate() {
    // Récupérer les inputs sélectionnés dans $('.sous-category .sous-cat')
    var CategorieValue = $('.cat input[name="flexRadioDefault"]:checked').val();
    var Categorie = parseInt(CategorieValue, 10);

    // Récupérer les inputs sélectionnés dans $('.sous-category .sous-cat')
    var sousCategorieVal = $('.sous-category .sous-cat input[name="flexRadioDefault2"]:checked').val();
    var sousCategorie = parseInt(sousCategorieVal, 10);

    // Récupérer les inputs sélectionnés dans $('.sous-category-items .sous-cat-items')
    var selecteditems = $('input[name="flexRadioDefault3"]:checked').map(function() {
        return $(this).val();
      }).get();
      
      // Récupérer les valeurs des inputs sélectionnés dans $('.sub-items')
      var selectedSousitems = $('input[name="flexRadioDefault4"]:checked').map(function() {
        return $(this).val();
      }).get();
 

    var langueValue = $('input[name="language"]:checked').val();
    var langue = parseInt(langueValue, 10);

    var levelValue = $('input[name="level"]:checked').val();
    var level = parseInt(levelValue, 10);

    const buttonsContainer = document.getElementById("buttonsContainer");
    const addedButtonsContainer = document.getElementById("selected-tags-list");
   
    console.log("category: ", Categorie);
    console.log("sous category: ", sousCategorie);
    console.log("items: ", selecteditems);
    console.log("sousitems: ", selectedSousitems);
    console.log("selectedLanguages: ", langue);

    let catMessage = document.getElementById("categoryMessage");
    let subcatMessage = document.getElementById("subcategoryMessage");
    let itemsMessage = document.getElementById("itemsMessage");
    let langueMessage = document.getElementById("langueMessage");
    let levelMessage = document.getElementById("levelMessage");
    let buttonIds = [];
    let buttonNames=[];
    
    catMessage.innerHTML = "";
    subcatMessage.innerHTML = "";
    itemsMessage.innerHTML = "";
    langueMessage.innerHTML = "";
    levelMessage.innerHTML = "";

    if (!CategorieValue) {
        showAlert("*Choose a category for your course!", "categoryMessage");
        return;
    }
    if (!sousCategorieVal) {
        showAlert("*Choose a subcategory now!", "subcategoryMessage");
        return;
    }
    if (selecteditems.length === 0) {
        showAlert("*Choose at least one item!", "itemsMessage");
        return;
    }
    if (!langueValue) {
        showAlert("*Choose a language!", "langueMessage");
        return;
    }
    if (!levelValue) {
        showAlert("*Choose a level!", "levelMessage");
        return;
    }
    else{
        var sousItems = $('input[name="flexRadioDefault3"]:checked').map(function () {
            var value = $(this).val();
            var valueID=parseInt(value, 10);
            return valueID;
        }).get();
        // Effectuer une requête AJAX pour chaque item sélectionné
            sousItems.forEach(function (item) {
                var tabcheckSubItems=[];
                var subItemsChecked = $('input[name="flexRadioDefault4"]').map(function() {
                    var label = $('label[for="' + $(this).attr('id') + '"]').text();
                    var itm = $(this).data('item');
                    var id = parseInt($(this).val(),10);
                    var itmInt = parseInt(itm, 10);
                   
                    if (itmInt === item && $(this).is(':checked')) {
                        buttonNames.push(label);
                        buttonIds.push(id);
                        tabcheckSubItems.push(label);
                        console.log($(this).val());
                        return label;
                    }
                }).get();            
        
                if (tabcheckSubItems.length === 0) {
                    $.ajax({
                        url: '/cours/read-sous-items',
                        method: 'POST',
                        data: { "idItem": item },
                        success: function(data, status) {
                            $.each(data['data'], function(index, element) {
                                var label = element.label;
                                var id = element.id;
                                console.log("les sous items trouvés : ", label);
                                buttonNames.push(label);
                                buttonIds.push(id);
                                console.log(buttonIds);
                            });
                        },
                        error: function(xhr, status, error, data) {
                            console.error(error);
                            console.error(data);
                        }
                    });
                }
            });
    
            // Effectuer la requête AJAX finale pour enregistrer les données
            $.ajax({
                url: '/cours/update',
                type: "POST",
                data: {
                    'category': Categorie,
                    "subCategory": sousCategorie,
                    "items": selecteditems,
                    "sousItems": selectedSousitems,
                    "langue": langue,
                    "level": level
                },
                dataType: 'json',
                success: function (data, status) {
                    console.log(data);
                    if(data['status']=='success'){
                        for (let i = 0; i < buttonNames.length; i++) {
                            const button = document.createElement("button");
                            button.innerHTML = buttonNames[i];
                            console.log(buttonIds[i]);
                            button.classList.add("my-button");
                            buttonsContainer.appendChild(button);
                            addedButtonsContainer.style.display = 'block';
                            let buttonAdded = false;
                          
                            button.onclick = function(event) {
                              event.preventDefault(); 
                              if (!buttonAdded) {
                                const newButton = document.createElement("button");
                                newButton.innerHTML = buttonNames[i] + " <span class='my-button delete'>x</span>";
                                newButton.classList.add("my-button", "added");
                                newButton.setAttribute("type", "button");
                                newButton.setAttribute("data-value", buttonIds[i]);
                                newButton.setAttribute("data-name", 'skill[]');
                                addedButtonsContainer.insertBefore(newButton, addedButtonsContainer.firstChild);
                          
                                const deleteButton = newButton.querySelector(".my-button.delete");
                                deleteButton.onclick = function() {
                                  addedButtonsContainer.removeChild(newButton);
                                  buttonAdded = false;
                                };
                          
                                buttonAdded = true;
                              }
                            };
                        } 
                        console.log(data['skills']);
                           $.each(data['skills'], function(index, element) {
                            
                               const newButton = document.createElement("button");
                                newButton.innerHTML = element.label + " <span class='my-button delete'>x</span>";
                                newButton.classList.add("my-button", "added");
                                newButton.setAttribute("type", "button");
                                newButton.setAttribute("data-value", element.id);
                                newButton.setAttribute("data-name", 'skill[]');
                                addedButtonsContainer.appendChild(newButton);
                          
                                const deleteButton = newButton.querySelector(".my-button.delete");
                                deleteButton.onclick = function() {
                                  addedButtonsContainer.removeChild(newButton);
                                  buttonAdded = false;
                                };
                          
                                buttonAdded = true;     
                            });          
                    } 
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
    }
    
}

/*********** page ajout skills , highlights ************ */   

let btn_skills_update = $("#btn_skills_update");
let btn_skills_next = $("#btn_skills_nextupdate");
let saveSkillClicked = false;
let nextSkillClicked = false;

function skills_update() {
    let btn_skills_update = $("#btn_skills_update");
    // console.log("Save button clicked");
    updateskills();
    saveSkillClicked = true;
    btn_skills_update.prop('disabled', true);
}
      
function skills_next() {
    let btn_skills_update = $("#btn_skills_update");

    // console.log("Next button clicked");
    if (saveSkillClicked) {
        $("#curriculumCourse").addClass("active");
        $("#courseInfo").removeClass("active");
    } else {
        nextSkillClicked = true;
        updateskills();
        saveSkillClicked = true;
        btn_skills_update.prop('disabled', true);
    }
}

function updateskills(){
    
    const selectedTagsList = document.getElementById('selected-tags-list');
    var skills = [];
    // Parcourir chaque élément <li> dans la liste
    for (let i = 0; i < selectedTagsList.children.length; i++) {
        const li = selectedTagsList.children[i];
        const skill = li.getAttribute("data-value").trim();
        skills.push(skill);
    }

    
    // Afficher les compétences dans la console
    console.log("skills: ",skills);
    // Récupérer les valeurs des nouveaux inputs highlights
    var highlightsDiv = document.querySelector(".highlights");
    var inputs = highlightsDiv.querySelectorAll("input");
    var inputsCount = inputs.length;
    console.log(inputs , "/",inputsCount);

    var highlights = [];
    for (let i = 0; i < inputs.length; i++) {
        var inputValue = inputs[i].value;        
        highlights.push(inputValue);
    };
    var highlightsString = highlights.join(" "); // Convertir le tableau en une chaîne de caractères
    console.log("highlights: ", highlightsString);
    
    if(skills.length===0){
        showAlert("*Choose skills !", "skillMessage");
    } else if(inputsCount< 3){
        showAlert("*Please enter at least 3 highlights to proceed!", "hightsMessage");
    } else {
        $.ajax({  
            url:        '/cours/update',  
            type:       'POST',   
            dataType:   'json',
            data: {'skills': skills,   'highlights': highlights},                    
            success: function(data, status) {                         
                console.log(data);
                if (nextSkillClicked) {
                    $("#curriculumCourse").addClass("active");
                    $("#courseInfo").removeClass("active");
                }else{
                    saveSkillClicked = true;
                }                  
            },  
            error : function(xhr, textStatus, errorThrown) {
               console.log(xhr)
            }  
         });
    }
    
}
$("input[name='skill']").on("input", function () {
    if (saveSkillClicked || nextSkillClicked) {
        btn_skills_update.prop('disabled', false);
        saveSkillClicked = false;
        nextSkillClicked = false;
    }
});
$(".highlight").on("change", function () {
    if (saveSkillClicked || nextSkillClicked) {
        btn_skills_update.prop('disabled', false);
        saveSkillClicked = false;
        nextSkillClicked = false;
    }
});
/*********** fin page ajout skills , highlights ************ */  
  