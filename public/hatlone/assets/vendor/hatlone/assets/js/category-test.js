
$(document).ready(function() {
  $('input[name="flexRadioDefault"]').on('change', function() {
      var inputValue = $(this).val();
      var labelValue = $('label[for="' + $(this).attr('id') + '"]').text();
      var idcat = parseInt(inputValue, 10);
    retrieveData(idcat);
    console.log( idcat, "  ",labelValue);
    // Réinitialiser les sélections des sous-catégories et des items
    $('input[name="flexRadioDefault2"]').prop('checked', false);
    $('input[name="flexRadioDefault3"]').prop('checked', false);
    $('input[name="flexRadioDefault4"]').prop('checked', false);

    // Cacher tous les éléments sauf la sous-catégorie
    $('.sous-category').hide();
    $('.sous-category-items').hide();
    $('.sub-items').hide();

    if (idcat > 0) {
      retrieveData(idcat);
      $('.sous-category').show();
    }

  });
});

function retrieveData(idcat) {
  var radioContainer = $('.sous-category .sous-cat');
  $('.col .cat input').prop('disabled', true);
  $.ajax({
    url: '/cours/read-souscategory',
    method: 'POST',
    data: { "idcategory": idcat },
    success: function(data, status) {
      radioContainer.empty();
      // Créer le nouvel élément itemsDiv
      var itemsDiv = $('<div></div>').addClass('card card label overflow-auto py-2 px-4 overflow1');
        // Parcours des labels renvoyés
        $.each(data['data'], function(index, element) {
          var label = element.label;
          var id = element.id;
          console.log(id);
           // Créez l'élément input radio avec le label
           var radioInput = $(
            '<div class="form-check">' +
            '<input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2' + index + '" value="' + id + '">' +
            '<label class="form-check-label" for="flexRadioDefault2' + index + '">' +
            label +
            '</label>' +
            '</div>'
        );

        // Ajoutez l'élément input radio au conteneur
        itemsDiv.append(radioInput);
        radioContainer.append(itemsDiv);

      });
        
    },
    error: function(xhr, status, error, data) {
        console.error(error);
        console.error(data);
    }
});
$('.col.cat input').prop('disabled', false);
     
}

/********* sous-category-itemms */
$(document).ready(function() {
  $('.sous-category').on('change', 'input[name="flexRadioDefault2"]', function() {
    var id = $(this).val();
    var labelSousCat = $('label[for="' + $(this).attr('id') + '"]').text();
    var idsouscat = parseInt(id, 10);
    console.log("id :", id);
    console.log(idsouscat, "  ", labelSousCat);
    // Réinitialiser la sélection des items
    $('input[name="flexRadioDefault3"]').prop('checked', false);
    $('input[name="flexRadioDefault4"]').prop('checked', false);

    // Cacher tous les éléments sauf les items
    $('.sous-category-items').hide();
    $('.sub-items').hide();
    $('.sub-items .sub-item').empty();

    if (idsouscat > 0) {
      retrieveData2(idsouscat);
      $('.sous-category-items').show();
    }
    //retrieveData2(idsouscat);
  });
});

function retrieveData2(idsouscat) {
  var radioContainer = $('.sous-category-items .sous-cat-items');
  $('.sous-category .sous-cat input').prop('disabled', true);
  $.ajax({
    url: '/cours/read-souscategory-items',
    method: 'POST',
    data: { "idsouscategory": idsouscat },
    success: function(data, status) {
      console.log(data);
      radioContainer.empty();
       // Créer le nouvel élément itemsDiv
       var itemsDiv = $('<div></div>').addClass('card card label overflow-auto py-2 px-4 overflow1');
        // Parcours des labels renvoyés
        $.each(data['data'], function(index, element) {
          var label = element.label;
          var id = element.id;
          console.log(id);
           // Créez l'élément input radio avec le label
           var radioInput = $(
            '<div class="form-check">' +
            '<input class="form-check-input" type="checkbox" name="flexRadioDefault3" id="flexRadioDefault3' + id + '" value="' + id + '">' +
            '<label class="form-check-label" for="flexRadioDefault3' + id + '">' +
            label +
            '</label>' +
            '</div>'
        );

        // Ajoutez l'élément input radio au conteneur
        itemsDiv.append(radioInput);
        radioContainer.append(itemsDiv);

      });
        
    },
    error: function(xhr, status, error, data) {
        console.error(error);
        console.error(data);
    }
});
$('.sous-category .sous-cat input').prop('disabled', false);
     
}

 /********* sous itemms */
 $(document).ready(function() {
  $('.sous-category-items .sous-cat-items').on('change', 'input[name="flexRadioDefault3"]', function() {
    var id = $(this).val();
    var labelItem = $('label[for="' + $(this).attr('id') + '"]').text();
    var idItem = parseInt(id, 10);
    console.log("id :", id);
    console.log(idItem, "  ", labelItem);
 
     // Afficher ou masquer les sub-items en fonction de la sélection de l'item
     if ($(this).is(":checked")) {
      retrieveData3(idItem);
      $('.sub-items').show();
    } else {
      //$('.sub-items .sub-item').hide();
      $('.sub-items .sub-item .card-' + idItem).remove();
    }
    //retrieveData3(idItem);
  });
});


function retrieveData3(idItem) {
  var radioContainer = $('.sub-items .sub-item');
  $('.sous-category-items .sous-cat-items input').prop('disabled', true);
  $.ajax({
    url: '/cours/read-sous-items',
    method: 'POST',
    data: { "idItem": idItem },
    success: function(data, status) {
      console.log("data subitems",data);
       // Créer le nouvel élément itemsDiv
       var itemsDiv = $('<div></div>').addClass('card label overflow-auto py-2 px-4 overflow1 card-'+idItem+'');
        // Parcours des labels renvoyés
        $.each(data['data'], function(index, element) {
          var label = element.label;
          var id = element.id;
          console.log(id);
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
        radioContainer.append(itemsDiv);
        console.log(radioContainer);

      });
        
    },
    error: function(xhr, status, error, data) {
        console.error(error);
        console.error(data);
    }
});
$('.sous-category-items .sous-cat-items input').prop('disabled', false);
     
}