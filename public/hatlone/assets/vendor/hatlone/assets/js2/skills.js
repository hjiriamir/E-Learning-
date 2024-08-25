// options
let options = {
    inputEl: "tagsInput",
    listEl: "tagsList",
    // enable the autocomplete
    autocompleteSearchList: [
        "Book",
        "Linux",
        "Art",
        "JavaScript",
        "Development",
        "Software",
        "PHP",
        "Design"
    ]
};
// initialize the tags input, DONE!
var tagsInputWithSearch = new simpleTagsInput(options);

//Select Skill


function addBook(){
    document.getElementById('bookTwo').innerHTML = '<input class="skillsAdded" onClick="javascript:removeBook();" type="button" value="Book    x" />';
}
function addLinux(){
    document.getElementById('linuxTwo').innerHTML = '<input class="skillsAdded" onClick="javascript:removeLinux();" type="button" value="Linux    x" />';
}
function addDevelopment(){
    document.getElementById('developmentTwo').innerHTML = '<input class="skillsAdded" onClick="javascript:removeDevelopment();" type="button" value="Development    x" />';
}
function addSoftware(){
    document.getElementById('softwareTwo').innerHTML = '<input class="skillsAdded" onClick="javascript:removeSoftware();" type="button" value="Software    x" />';
}
function addPhp(){
    document.getElementById('phpTwo').innerHTML = '<input class="skillsAdded" onClick="javascript:removePhp();" type="button" value="Php    x" />';
}
function addDesign(){
    document.getElementById('designTwo').innerHTML = '<input class="skillsAdded" onClick="javascript:removeDesign();" type="button" value="Design    x" />';
}

function removeBook(){
    document.getElementById('bookTwo').innerHTML = '';
}
function removeLinux(){
    document.getElementById('linuxTwo').innerHTML = '';
}
function removeDevelopment(){
    document.getElementById('developmentTwo').innerHTML = '';
}
function removeSoftware(){
    document.getElementById('softwareTwo').innerHTML = '';
}
function removePhp(){
    document.getElementById('phpTwo').innerHTML = '';
}
function removeDesign(){
    document.getElementById('designTwo').innerHTML = '';
}


   