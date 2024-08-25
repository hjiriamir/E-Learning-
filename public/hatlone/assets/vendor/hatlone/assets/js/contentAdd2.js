var counterQuiz = 1;
var contentElements = [];
var skills=[];

var selectedSkills = [];

function addSkill(skill) {
  if (!selectedSkills.includes(skill)) {
    selectedSkills.push(skill); 
    console.log('Selected Skills:', selectedSkills); 
  }
}
// ======================================== Start Increment Questions ======================================== //
function nextQuestion() {
    
    var contentQuiz = document.querySelector('.quizContent');
    contentQuiz.style.display = 'none';
    var nextQuestion = document.getElementById('nextContent');
    document.getElementById('saveBtnQuiz').style.display = 'inline-block';
    document.getElementById('prevBtnQuiz').style.display = 'inline-block';
    
    var prevContentQuiz = nextQuestion.querySelector('div');
    if (prevContentQuiz) {
      nextQuestion.removeChild(prevContentQuiz);
    }
    
    var questionContent = document.createElement('div');
    questionContent.innerHTML = `
    <div class="slide-animation">
        <div class="col-lg-12 question1 mt-4">
            <div class="row">
                <div class="col-lg-4">
                    <p>Question ${counterQuiz}</p>
                    <i class="bi bi-trash" style="font-size:20px;"></i>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-11">
                            <textarea class="rounded-1" name="questionsQuiz" placeholder="Enter Question..." rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-1 my-2">
                            <input type="checkbox" id="check_rep1" style="width: 0.8em; height: 0.8em;">
                        </div>
                        <div class="col-11">
                            <input class="rounded-1 wrongAnswer" placeholder="Wrong Answer" id="rep1" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-11">
                            <textarea class="rounded-1 mt-4" placeholder="Justification" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-1 my-2">
                            <input type="checkbox" id="check_rep2" style="width: 0.8em; height: 0.8em;">
                        </div>
                        <div class="col-11">
                            <input class="rounded-1 rightAnswer" placeholder="Right Answer" id="rep2" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-11">
                            <textarea class="rounded-1 mt-4" placeholder="Justification" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-1 my-2">
                            <input type="checkbox" id="check_rep3" style="width: 0.8em; height: 0.8em;">
                        </div>
                        <div class="col-11">
                            <input class="rounded-1 wrongAnswer" placeholder="Wrong Answer" id="rep3" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-11">
                            <textarea class="rounded-1 mt-4" placeholder="Justification" rows="2"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mb-3 mt-3">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-8">
                    <div class="boxSkills">
                        <div class="fw-bold" style="font-size: 15px;">Skills asked about</div>
                        <div class="d-flex mt-2">
                            <input type="text" id="inputSkills" class="p-2 form-control" placeholder="Enter your skills...">
                            <button class="btn skillsSelected" id="addSkills">Add</button>
                        </div>
                        <div id="selectSkills"></div>
                        <div class="skills_added mt-3">
                            <div style="font-weight: 500;">Select skills from :</div>
                            <div class="select_skills mt-1">
                                <div class="skillsSelected" id="book" onclick="addSkill('Book')">Book</div>
                                <div class="skillsSelected" id="linux" onclick="addSkill('Linux')">Linux</div>
                                <div class="skillsSelected" id="development" onclick="addSkill('Development')">Development</div>
                                <div class="skillsSelected" id="php" onclick="addSkill('PHP')">PHP</div>
                                <div class="skillsSelected" id="software" onclick="addSkill('Software')">Software</div>
                                <div class="skillsSelected" id="design" onclick="addSkill('Design')">Design</div>
                            </div>
                        </div>
                        <div class="titleSkills mt-2">Selected Skills :</div>
                        <div class="selectedSkills mt-2">
                            <div id="listSkills" name="skillsList"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    `;

    contentElements.push(questionContent);
    nextQuestion.appendChild(questionContent);
    nextQuestion.style.display = 'block';
    counterQuiz++;
    
    // ======================================== Start Autocomplete Input Skills ======================================== //
    var dataSkills = ["Book", "Linux", "Art", "JavaScript", "Development", "Software", "PHP", "Design"];
    
    var skillsAsked = document.getElementById("inputSkills");
    var addSkills = document.getElementById("addSkills");
    var skillsAdded = document.getElementById("selectSkills");
    var listSkillsAdded = document.getElementById("listSkills");
    var book = document.getElementById("book");
    var linux = document.getElementById("linux");
    var development = document.getElementById("development");
    var software = document.getElementById("software");
    var php = document.getElementById("php");
    var design = document.getElementById("design");

    skillsAsked.addEventListener("input", function() {
        var filterSkills = skillsAsked.value.toLowerCase();
        skillsAdded.innerHTML = "";
      
        var autocompleteSkills = dataSkills.filter(function(elementSkills) {
          return elementSkills.toLowerCase().indexOf(filterSkills) > -1;
        });
      
        autocompleteSkills.forEach(function(elementSkills) {
          var div = document.createElement("div");
          div.textContent = elementSkills;
          div.className = "filteredSkill";
          div.addEventListener("click", function() {
            addSkillsList(elementSkills);
            skillsAsked.value = "";
            skillsAdded.innerHTML = "";
          });
          skillsAdded.appendChild(div);
        });
    });

    skillsAdded.addEventListener("click", function(e) {
        var target = e.target;
        if (target.nodeName === "SKILLS") {
          var value = target.textContent;
          addSkillsList(value);
          skillsAsked.value = "";
          skillsAdded.innerHTML = "";
        }
    });

    addSkills.addEventListener("click", function() {
        addSkillsElements();
    });

    /*skillsAsked.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
          addSkillsElements();
        }
    });*/

    //============================================== Add Skills ==============================================//
    $(document).ready(function(){
        $(".skillsSelected").click(function(){
            //console.log('Skills:', document.getElementById("inputSkills").value);
            console.log('Input Skills:', skills);
        });
    });
    function addSkillsList(value) {
        var elementSkills = document.createElement("skills");
        elementSkills.textContent = value;
        elementSkills.className = "skills";
    
        var deleteSkills = document.createElement("span");
        deleteSkills.className = "bi bi-x delete-icon";

        deleteSkills.addEventListener("click", function() {
            elementSkills.parentNode.removeChild(elementSkills);
            
            var index = skills.indexOf(value);
            if (index !== -1) {
                skills.splice(index, 1);
                skills = skills.filter(function(skill) {
                    return skill !== value;
                }); 
            }
        });
        elementSkills.appendChild(deleteSkills);
        listSkillsAdded.appendChild(elementSkills);
        skills.push(value);
    }
    //=======================================================================================================//

    function addSkillsElements() {
        var value = skillsAsked.value;
        if (value.trim() !== "") {
          addSkillsList(value);
          skillsAsked.value = "";
        }
    }

    function listItems(value) {
        var items = listSkillsAdded.getElementsByTagName("skills"); 
        for (var i = 0; i < items.length; i++) {
          if (items[i].textContent === value) {
            return true;
          }
        }
        return false;
    }
    // Select skills from :
    book.addEventListener("click", function() {
        if (!listItems(book.textContent)) {
            addSkillsList(book.textContent);
        }
    });
    linux.addEventListener("click", function() {
        if (!listItems(linux.textContent)) {
            addSkillsList(linux.textContent);
        }
    });
    development.addEventListener("click", function() {
        if (!listItems(development.textContent)) {
            addSkillsList(development.textContent);
        }
    });
    software.addEventListener("click", function() {
        if (!listItems(software.textContent)) {
            addSkillsList(software.textContent);
        }
    });
    php.addEventListener("click", function() {
        if (!listItems(php.textContent)) {
            addSkillsList(php.textContent);
        }
    });
    design.addEventListener("click", function() {
        if (!listItems(design.textContent)) {
            addSkillsList(design.textContent);
        }
    });
    // ======================================== End Autocomplete Input Skills ======================================== //
}

function prevQuestion() {
    var nextQuestion = document.getElementById('nextContent');
    var elemnts = contentElements.pop();
    if (elemnts) {
      nextQuestion.removeChild(nextQuestion.lastChild);
    }
    counterQuiz--;
    if (contentElements.length > 0) {
      nextQuestion.appendChild(contentElements[contentElements.length - 1]);
    }
    
    if (counterQuiz == 1) {
      document.getElementById('prevBtnQuiz').style.display = 'none';
      document.getElementById('saveBtnQuiz').style.display = 'none';
      document.querySelector('.quizContent').style.display = 'block';
    }
}
// ======================================== End Increment Questions ======================================== //

$(document).ready(function(){
    
    let btn_save = document.getElementById("saveBtnQuiz");
    btn_save.addEventListener("click",function(){
    
    console.log(q1);
    });
    $(".nextQuizContent").click(function(){
        /* Content */
        var titreContent=document.getElementsByName("titleContent")[0].value;
        var descriptionContent=document.getElementsByName("descriptionContent")[0].value;
        var question=null;
        var respons=[];
        var check_resp=[];
        
        try{
           question=document.getElementsByName("questionsQuiz")[0].value;
           check_resp.push(document.getElementById("check_rep1").checked);
           check_resp.push(document.getElementById("check_rep2").checked);
           check_resp.push(document.getElementById("check_rep3").checked);
           respons.push(document.getElementById("rep1").value);
           respons.push(document.getElementById("rep2").value);
           respons.push(document.getElementById("rep3").value);
           console.log(respons);
           console.log(check_resp);
        }
        catch (e) {
            console.log(e); 
        }
        console.log('All Skills:', skills);
        
        if (titreContent || descriptionContent){
        /* ============ Content ============ */
            $.ajax({  
                url:        '/cours/addContent',  
                type:       'POST',   
                dataType:   'json',
                data: {'titreContent': titreContent, 
                       'descriptionContent': descriptionContent},                    
                success: function(data, status) {       
                   console.log(data['titre']);
                   const bodyClass="contentLec_".concat(data['balise']);
                   document.getElementsByName("titleContent")[0].value="";
                   document.getElementsByName("descriptionContent")[0].value="";
                   nextQuestion();
                   const Content = document.querySelector(".curriculum_course .title_content_".concat(data['balise']));
                   console.log(Content);
                   const myQuiz = document.createElement("div");
                   myQuiz.classList.add("courseIntroduction");
                   myQuiz.classList.add("mb-3");
                   myQuiz.innerHTML= `
                   <div class="row">
                        <div class="col-lg-10">
                            <div class="d-flex mt-2">
                                <i class="bi bi-check-circle"></i>
                                <i class="bi bi-x-circle"></i>
                                <span class="editBox">${data['titre']}</span>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <span class="mt-2 time">1h18min</span>
                        </div>
                    </div>
                   `;
                  Content.appendChild(myQuiz);
                },  
                error : function(xhr, textStatus, errorThrown) {
                   console.log(textStatus)
                }  
            });
        }else if(question){
            $.ajax({  
                url:        '/cours/addContent',  
                type:       'POST',   
                dataType:   'json',
                data: {'question': question,
                       'respons':respons,
                       'checked':check_resp,
                       'skills':skills},                    
                success: function(data, status) {       
                   console.log(data);
                   nextQuestion();
                },  
                error : function(xhr, textStatus, errorThrown) {
                   console.log(textStatus)
                }  
            });
        }
    });
});