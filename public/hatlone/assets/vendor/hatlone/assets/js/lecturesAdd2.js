function AddLecture(id,idsection) {

    const lectureContent = document.querySelector(".curriculum_course .lect_".concat(id));

    const countLecture = lectureContent.children.length;

    const myLecture = document.createElement("div");
    myLecture.classList.add("newLecture");

    myLecture.innerHTML = `
        <div class="myLecture mt-4" id="lect_${countLecture + 1}_${id}" style="margin: 0px 1.2em;">
            <div class="row">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-3 mt-3">
                        <div class="d-flex">
                            <i class="fa-solid fa-book"></i>
                            <span class="accordionLecture">Lecture ${countLecture + 1}</span>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-9 mt-3">
                        <div class="d-flex" >
                            <input type="text" id="${id}_${idsection}" placeholder="Add a title...">
                            <i class="bi bi-trash" style="cursor: pointer;"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-3 mt-3">
                    </div>
                    <div class="col-lg-9 col-md-9 col-9 mt-3">
                        <textarea class="form-control" id="desc_${id}_${idsection}" rows="3" ></textarea>
                    </div>
                </div>                
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-8 col-9 mt-3">
                    <button class="btn confirmBtn" onclick="confirmBtn_lect('lect_${countLecture + 1}_${id}',${idsection},${countLecture + 1})">Confirmer</button>
                </div>
            </div>
        </div>
    `;

    lectureContent.appendChild(myLecture);
}
function confirmBtn_lect(balise,id_sec,order) {
    var elem =document.getElementById(balise);
    var titre=elem.querySelector("input").value;
    var description=elem.querySelector("textarea").value;
    console.log("titre:", titre , "desc :", description, "id_sec:", id_sec);
    var id_lecturesCollapse=balise.split('_')[2];
    console.log("balise : ",balise);
    if(titre.length>0){
        $.ajax({  
            url:        '/cours/Add_lect',  
            type:       'POST',   
            dataType:   'json',
            data: {'titre': titre,'description': description, 'idsection': id_sec, 'balise':balise,'order':order},                    
            success: function(data, status) {
                elem.remove();
                const lectureContent = document.querySelector(".curriculum_course .lect_".concat(balise.split('_')[2]));
                lectureContent.lastChild.remove();
                const countLecture = lectureContent.children.length;
                const myLecture = document.createElement("div");
                myLecture.classList.add("newLecture");
                myLecture.setAttribute("id", "newLect_".concat(data['idLecture']));
                myLecture.classList.add("mb-3");
                myLecture.innerHTML= `<div class="row">
                                        <div class="col-lg-8 col-md-8">
                                            <div>
                                                <i class="bi bi-list" style="font-size: 20px;"></i>              
                                                <button class=" collapsed btn border-0" type="button" data-bs-toggle="collapse" data-bs-target='#title_${balise}' aria-expanded="false" aria-controls="title_${balise}'">
                                                    <i class="fa-solid fa-book"></i>
                                                    <span class="accordionLecture" id="titleLect_${balise}">Lecture ${countLecture+1} : ${titre}</span>
                                                </button>
                                            </div>
                                            <div id='title_${balise}' class="accordion-collapse collapse contentLec_${balise}" data-bs-parent='#lect_${id_lecturesCollapse}'>
                                            
                                                <div class="accordion accordion-flush" id="accordionFlushExample_${balise}">
                                                    <div class="title_content_${balise}"></div>
                                                    <div class="accordion-header addLecture" style="margin-left: 1.5em;">
                                                        <button class="collapsed btn border-0 bg-white d-flex" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_${balise}" aria-expanded="false" aria-controls="flush-collapse_${balise}">
                                                            <i class="bi bi-plus-square-fill mt-1"></i>
                                                            <div class="title">Add Content</div>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div id="flush-collapse_${balise}" class="accordion-collapse collapse contentCurriculum" data-bs-parent="#accordionFlushExample_${balise}">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-4">
                                                            <ul class="nav nav-tabs border-0 flex-column">
                                                                <li class="nav-item">
                                                                    <a class="nav-link border-0 active show" data-bs-toggle="tab" data-bs-target="#multi_${balise}">
                                                                        <i class="bi bi-file-earmark-easel-fill" style="margin-right: 0.5em"></i>
                                                                        <div>Multimedia</div>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link border-0" data-bs-toggle="tab" data-bs-target="#assign_${balise}">
                                                                        <i class="bi bi-clipboard-check-fill" style="margin-right: 0.5em"></i>
                                                                        <div>Assignment</div>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link border-0" data-bs-toggle="tab" data-bs-target="#certif_${balise}">
                                                                        <i class="bi bi-mortarboard-fill" style="margin-right: 0.5em"></i>
                                                                        <div>Certificate</div>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link border-0" data-bs-toggle="tab" data-bs-target="#meet_${balise}">
                                                                        <i class="bi bi-person-video3" style="margin-right: 0.5em"></i>
                                                                        <div>Meeting</div>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-7 col-md-8">
                                                            <div class="tab-content">
                                                                <div class="tab-pane active show" id="multi_${balise}">
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#vdModal">
                                                                                <i class="bi bi-fast-forward-btn-fill"></i>
                                                                            </button>
                                                                            <br><span>Video</span>
                                                                        </div>
                                                        
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button class="btn border-0" data-bs-toggle="modal" data-bs-target="#youtubeModal">
                                                                                <i class="bi bi-youtube"></i>
                                                                            </button>
                                                                            <br><span>Youtube Video</span>
                                                                        </div>
                                                        
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button class="btn border-0" data-bs-toggle="modal" data-bs-target="#vimeoModal">
                                                                                <i class="bi bi-vimeo"></i>
                                                                            </button>
                                                                            <br><span>Vimeo Video</span>
                                                                        </div>
                                                        
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#imgModal">
                                                                                <i class="bi bi-images"></i>
                                                                            </button>
                                                                            <br><span>Image</span>
                                                                        </div>
                                                        
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button class="btn border-0" data-bs-toggle="modal" data-bs-target="#pdfModal">
                                                                                <i class="bi bi-file-earmark-pdf-fill"></i>
                                                                            </button>
                                                                            <br><span>PDF Document</span>
                                                                        </div>
                                                        
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#docModal">
                                                                                <i class="bi bi-filetype-doc"></i>
                                                                            </button>
                                                                            <br><span>Other Document</span>
                                                                        </div>
                                                                    
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#fileCodeModal">
                                                                                <i class="bi bi-file-earmark-code-fill"></i>
                                                                            </button>
                                                                            <br><span>Code File</span>
                                                                        </div>
                                                        
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#ebookModal">
                                                                                <i class="bi bi-tablet-landscape"></i>
                                                                            </button>
                                                                            <br><span>E-Book</span>
                                                                        </div>
                                                        
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#audioModal">
                                                                                <i class="bi bi-volume-up"></i>
                                                                            </button>
                                                                            <br><span>Audio</span>
                                                                        </div>
                                                        
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#flashCardModal">
                                                                                <i class="bi bi-badge-ad"></i>
                                                                            </button>
                                                                            <br><span>Flash Card</span>
                                                                        </div>
                                                        
                                                                        <div class="col-lg-4 col-md-4 text-center ">
                                                                            <button type="button" 
                                                                                    class="btn border-0" 
                                                                                    data-bs-toggle="modal" 
                                                                                    data-bs-target="#linkModal" 
                                                                                    uk-tooltip="The link must not promote other paid educational platforms or ressources">
                                                                            <i class="bi bi-link-45deg"></i>
                                                                            </button>
                                                                            <br><span>External Link</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane" id="assign_${balise}">
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#multipleCheckModal">
                                                                                <i class="bi bi-list-check"></i>
                                                                            </button>
                                                                            <br><span>Multiple Choice</span>
                                                                        </div>
                                                        
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button type="button" class="btn border-0 d-flex" data-bs-toggle="modal" data-bs-target="#trueFalseModal">
                                                                                <i class="bi bi-check-circle"></i>
                                                                                <i class="bi bi-x-circle"></i>  
                                                                            </button>
                                                                            <span>True or False</span>
                                                                        </div>
                                                        
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button class="btn border-0" data-bs-toggle="modal" data-bs-target="#qaModal">
                                                                                <i class="bi bi-chat-dots"></i>                                                       
                                                                            </button>
                                                                            <br><span>Q/A</span>
                                                                        </div>
                                                        
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#homeworkModal">
                                                                                <i class="bi bi-journal-text"></i>
                                                                            </button>
                                                                            <br><span>Homework</span>
                                                                        </div>
                                                        
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#examModal">
                                                                                <i class="bi bi-clipboard-check"></i> 
                                                                            </button>
                                                                            <br><span>Exam</span>
                                                                        </div>
                                                        
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#projectModal">
                                                                                <i class="bi bi-motherboard"></i> 
                                                                            </button>
                                                                            <br><span>Project</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane" id="certif_${balise}">
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button class="btn border-0">
                                                                                <i class="material-icons">workspace_premium</i>
                                                                            </button>
                                                                            <br><span>Skill Certificate</span>
                                                                        </div>
                                                            
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#completitionCertificateModal">
                                                                                <i class="material-icons">local_police</i>
                                                                            </button>
                                                                            <br><span>Completition Certificate</span>
                                                                        </div>
                                                            
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#premiumCertificateModal">
                                                                                <i class="material-icons">military_tech</i> 
                                                                            </button>
                                                                            <br><span>Premium Certificate</span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="tab-pane" id="meet_${balise}">
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#zoomModal">
                                                                                <i class="bi bi-camera-video-fill"></i>
                                                                            </button>
                                                                            <br><span>Zoom</span>
                                                                        </div>
                                                            
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#teamsModal">
                                                                                <i class="bi bi-microsoft-teams"></i>
                                                                            </button>
                                                                            <br><span>Teams</span>
                                                                        </div>
                                                            
                                                                        <div class="col-lg-4 col-md-4 text-center">
                                                                            <button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#googleMeetModal">
                                                                                <i class="bi bi-camera-reels-fill"></i>
                                                                            </button>
                                                                            <br><span>Meet</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3">
                                            <div class="d-flex crud">
                                                <button class="btn border-0" data-bs-toggle="modal" data-bs-target="#modalEditLect_${balise}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button class="btn border-0">
                                                    <i class="bi bi-trash" onclick="deleteLecture('newLect_${data['idLecture']}', ${data['idLecture']})"></i>
                                                </button>
                                                <span class="mt-1">1h18min</span>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade editModalLect" id="modalEditLect_${balise}" tabindex="-1" aria-labelledby="modalEditLectLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="modalEditLectLabel">Edit Lecture</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="text" id="edit_title_${balise}" placeholder="Add a title..." value="">
                                                        <textarea class="form-control mt-3" id="edit_decr_${balise}" rows="3" value=""></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" onclick="editLecture('editModal_lect_${balise}', 'titleLect_${balise}', 'edit_title_${balise}', 'edit_decr_${balise}', ${data['idLecture']})">Save</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                lectureContent.appendChild(myLecture);
                console.log("idLecture: ",data['idLecture']);
            },  
            error : function(xhr, textStatus, errorThrown) {
               console.log(xhr)
            }  
         });
    }
}

// show modal edit lecture 
function showModalEditLect(lect) {
    var elem =document.getElementById(lect);
    console.log(lect);
    $.ajax({  
        url:        '/cours/read_info_lecture',  
        type:       'POST',   
        dataType:   'json',   
        //data: {'idsection': section},                 
        success: function(data, status) {
           if(data['status']=='Success'){
                console.log(data);
                //document.getElementById("edit_title").value =data['titre'];
                //document.getElementById("edit_decr").value =data['descrip']; 
                $('.editModalLecture').modal('show');             
           }else{
                console.log(data);                
           }
        },  
        error : function(xhr, textStatus, errorThrown) {
           console.log(xhr)
        }  
     });
}

// edit lecture 
function editLecture(idmodal, idTitrelect, inputTitle, textareaDesc, idLecture) {
    console.log("idLecture: ",idLecture);
    var modaledit=document.getElementById(idmodal);
    var titreEdit=document.getElementById(inputTitle).value;
    var descriptionEdit=document.getElementById(textareaDesc).value;
    console.log("titre: ",titreEdit, "desc: ", descriptionEdit);   
    $.ajax({  
        url:'/cours/edit_lect',  
        type:'POST',   
        dataType:'json',   
        data: {'titreEdit': titreEdit, 'descriptionEdit': descriptionEdit, 'idLecture': idLecture},                 
        success: function(data, status) {
           if(data['status']=='Success'){
                console.log(data);
               $(".editModalLect").modal('hide');
                //var lecture=document.getElementById(idlect);
                var titre=document.getElementById(idTitrelect);
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

// delete lecture : 
function deleteLecture(lecture, idLecture) {

    console.log(lecture , idLecture);
    
     $.ajax({  
         url: '/cours/Delete_lect',  
         type: 'POST',   
         dataType: 'json',   
         data: {'idLecture': idLecture},                 
         success: function(data, status) {
             if(data['status'] == 'Success'){
                 console.log(data);
                 //var lectureContent = document.getElementById(lecture);
                // lectureContent.remove();
                 document.getElementById(lecture).remove();
                 //updateOrder();   
             } else {
                 console.log(data);                
             }
         },  
         error: function(xhr, textStatus, errorThrown) {
             console.log(xhr)
         }  
     });
     
 }