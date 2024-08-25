function addSection() {
    const sectionContent = document.querySelector(".curriculum_course .nav-tabs");

    const count = sectionContent.children.length;

    const mySection = document.createElement("div");
    mySection.classList.add("section");

    mySection.innerHTML = `
        <div class="nav-item sectionFive" id="section${count + 1}" style="margin: 0px 1.2em;">
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="d-flex">
                        <div class="row">
                            <div class="col-lg-12 ps-4 ms-1">
                                <a class="navlink border-0 d-flex" data-bs-toggle="tab" data-bs-target="#section${count + 1}">
                                <span class="order">${count + 1}</span>
                                <input type="text" id="txt_title" placeholder="Add a title...">
                                <i class="bi bi-trash" style="cursor: pointer; margin-top: 0.4em" onclick="deletelem('section${count + 1}')"></i>
                            </div>
                            <div class="col-lg-8 col-md-5 col-8 pt-2 ps-5 ms-2">
                                <textarea class="form-control" id="description" rows="3" placeholder="Description..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-5 col-8 py-4">
                    <button class="btn confirmBtn" style="margin-top: -1.2em;" onclick="confirmBtn('section${count + 1}')">Confirmer</button>
                </div>
            </div>
        </div>
    `;

    sectionContent.appendChild(mySection);
    //console.log(contentColumn);
}
function deletelem(params) {
    const sectionContent = document.querySelector(".curriculum_course .nav-tabs");
    const count = sectionContent.children.length;
    for (let index = 0; index < count; index++) {
        if(sectionContent.children[index].querySelector("div").getAttribute("id")===params){
            sectionContent.children[index].remove();
        }
    }
    updateOrder();
}

function confirmBtn(params) {
    var order = params.match(/\d+/)[0];
  console.log("Count value:", order);
    var elem =document.getElementById(params);
    var titre=elem.querySelector("input").value;
    var description=elem.querySelector("textarea").value;
    if(titre.length>0){
        $.ajax({  
            url:        '/cours/Add_sec',  
            type:       'POST',   
            dataType:   'json',
            data: {'titre': titre,'description': description,'order':order},                    
            success: function(data, status) {
               if(data['status']=='Success'){
                    console.log(data);
                    elem.remove();
                    const sectionContent = document.querySelector(".curriculum_course .nav-tabs");
                    sectionContent.lastChild.remove();

                    var count = sectionContent.children.length;
                    console.log("count confirm:", count);
                    const mySection = document.createElement("div");
                    mySection.classList.add("section");
                    
                    mySection.setAttribute('id','sec_'.concat(params));
                    var func='toggle_show_hide("sec_'.concat(params,'")');
                    mySection.setAttribute('onclick',func);
                    //const mySection=sectionContent.children;
                    mySection.innerHTML=`
                    <div class="nav-item">
                        <div class="nav-link border-0 d-flex" data-bs-toggle="tab" data-bs-target="#${params}">
                        <i class="bi bi-list"></i>  
                        <span class="order">${count+1}</span>
                        <span class="title" id="title${count+1}">${titre}</span>
                        </div>
                    </div>
                    <div class="d-flex btns" >
                            <button class="btn border-0" style="display: none;" data-bs-toggle="modal" data-bs-target="#editModal_sec_${params}" onclick="showModalEdit('sec_${params}')">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="btn border-0" style="display: none;" onclick="deleteSection('sec_${params}', ${data['idsection']})">
                                <i class="bi bi-trash"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade editModal" id="editModal_sec_${params}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editModalLabel">Edit title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" id="edit_title_${params}" placeholder="Add a title..." value="" name="edit_title">
                                        <textarea class="form-control mt-3" id="edit_decr_${params}" rows="3" value="" name="edit_decr"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onclick="editSection('editModal_sec_${params}', 'sec_${params}', 'edit_title_${params}', 'edit_decr_${params}', ${data['idsection']})">Save</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                  `;
                    
                    sectionContent.appendChild(mySection);
                    updateOrder();
                    const tab = document.createElement("div");
                    tab.classList.add("tab-pane");
                    tab.setAttribute("id", `section${count + 1}`);
                    tab.innerHTML=`<div class="accordion accordion-flush lect_section${count + 1}" id="lect_section${count + 1}">
                                   </div>
                                    <div class="addLecture">
                                        <button class="btn border-0 bg-white d-flex" onclick="AddLecture('section${count + 1}',${data['idsection']})">
                                            <i class="bi bi-plus-circle-fill mt-1"></i>
                                            <div class="title">Add Lecture</div>
                                        </button>
                                    </div>`;
                    //tab.textContent = `Section ${count + 1}`;

                    const contentColumn = document.querySelector(".curriculum_course .col-lg-7 .tab-content");

                    contentColumn.appendChild(tab);
                   console.log('sec_',params);
               }else{
                    console.log(data);                
               }
            },  
            error : function(xhr, textStatus, errorThrown) {
               console.log(xhr)
            }  
         });
        //insert title and description in database if code_cours existe

    }else{
        alert("the title shoul be not empty !!!");
    }
    
}

function deleteSection(section, id_section) {
   // console.log(section);
    var lecture_id=section.split('_')[1];
   // console.log(lecture_id);
    $.ajax({  
        url: '/cours/Delete_sec',  
        type: 'POST',   
        dataType: 'json',   
        data: {'idsection': id_section},                 
        success: function(data, status) {
            if(data['status'] == 'Success'){
                console.log(data);
                var lectureContent = document.getElementById(lecture_id);
                lectureContent.remove();
                document.getElementById(section).remove();
                updateOrder();   
            } else {
                console.log(data);                
            }
        },  
        error: function(xhr, textStatus, errorThrown) {
            console.log(xhr)
        }  
    });
}

function toggle_show_hide(params) {
    const sectionContent = document.querySelector(".curriculum_course .nav-tabs");
    const count = sectionContent.children.length;
    //console.log(count);
    for (let index = 0; index < count; index++) {
        let element=sectionContent.children[index].querySelector(".d-flex ");
        if(element.getAttribute("aria-selected")=='true'){
            sectionContent.children[index].querySelector(".btns ").children[0].setAttribute("style","display: block;");
            sectionContent.children[index].querySelector(".btns ").children[1].setAttribute("style","display: block;");
        }else{
            sectionContent.children[index].querySelector(".btns ").children[0].setAttribute("style","display: none;");
            sectionContent.children[index].querySelector(".btns ").children[1].setAttribute("style","display: none;");
        }  
        
    }   
}

function showModalEdit(params) {
    var elem =document.getElementById(params);
    //console.log(params);
    $.ajax({  
        url:        '/cours/read_info_section',  
        type:       'POST',   
        dataType:   'json',   
        //data: {'idsection': section},                 
        success: function(data, status) {
           if(data['status']=='Success'){
                console.log(data);
                document.getElementById("edit_title").value =data['titre'];
                document.getElementById("edit_decr").value =data['descrip']; 
                $('#editModal').modal('show');             
           }else{
                console.log(data);                
           }
        },  
        error : function(xhr, textStatus, errorThrown) {
           console.log(xhr)
        }  
     });
}

function editSection(idmodal, idsec, inputTitle, textareaDesc, idSection) {

    console.log("idSection: ", idSection);
    var modaledit=document.getElementById(idmodal);
    var titreEdit=document.getElementById(inputTitle).value;
    var descriptionEdit=document.getElementById(textareaDesc).value;
    console.log("titre: ",titreEdit, "desc: ", descriptionEdit);   
    $.ajax({  
        url:'/cours/edit_section',  
        type:'POST',   
        dataType:'json',   
        data: {'titreEdit': titreEdit, 'descriptionEdit': descriptionEdit, "idSection": idSection},                 
        success: function(data, status) {
           if(data['status']=='Success'){
                console.log(data);
               $(".editModal").modal('hide');
                var section=document.getElementById(idsec);
                var titre=section.querySelector(".title");
                titre.textContent=data['titre'];
               
           }else{
                console.log(data);                
           }
        },  
        error : function(xhr, textStatus, errorThrown) {
           console.log(xhr)
        }  
     });
}
// Update the order 
function updateOrder() {
    const sectionContent = document.querySelector(".curriculum_course .nav-tabs");
    const upSections = sectionContent.querySelectorAll(".section");
    upSections.forEach((section, index) => {
        const orderElement = section.querySelector(".order");
        orderElement.textContent = index + 1;
    });
}