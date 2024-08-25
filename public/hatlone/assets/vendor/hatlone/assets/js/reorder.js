(function() {
  "use strict";
  var dragAndDropModule = function(draggableElements){

    var elemYoureDragging = null
        , dataString  = 'text/html'    
        , elementDragged = null  
        , draggableElementArray = Array.prototype.slice.call(draggableElements) 
        , dragonDrop = {}; 

        dragonDrop.changeDataStringForIe = (function () {
            var userAgent = window.navigator.userAgent,
                msie = userAgent.indexOf('MSIE '),   
                trident = userAgent.indexOf('Trident/'); 

            if (msie > 0 || trident > 0) {
                dataString = 'Text';
                return true;
            } else {
                return false;
            }
        })();

        
        dragonDrop.bindDragAndDropAbilities = function(elem) {
          elem.setAttribute('draggable', 'true');
          elem.addEventListener('dragstart', dragonDrop.handleDragStartMove, false);
          elem.addEventListener('dragenter', dragonDrop.handleDragEnter, false);
          elem.addEventListener('dragover',  dragonDrop.handleDragOver, false);
          elem.addEventListener('dragleave', dragonDrop.handleDragLeave, false);
          elem.addEventListener('drop',      dragonDrop.handleDrop, false);
          elem.addEventListener('dragend',   dragonDrop.handleDragEnd, false);
        };

        dragonDrop.handleDragStartMove = function(e) {
          elementDragged = this;

          e.dataTransfer.effectAllowed = 'move';
          e.dataTransfer.setData(dataString, this.innerHTML);
        };

        dragonDrop.handleDragOver = function(e) {   
          e.preventDefault();
          e.dataTransfer.dropEffect = 'move';     
        };

        dragonDrop.handleDrop = function(e) {
         if(elementDragged !== this) {
            var data = e.dataTransfer.getData(dataString);
            elementDragged.innerHTML = this.innerHTML;
            this.innerHTML = e.dataTransfer.getData(dataString);
          }
          return false;
        };

        draggableElementArray.forEach(dragonDrop.bindDragAndDropAbilities);
  };

  var allDraggableElements = document.querySelectorAll('.draggable-droppable');
  dragAndDropModule(allDraggableElements);

})();

  