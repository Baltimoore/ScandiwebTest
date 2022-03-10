const typeDropdown = document.querySelector('#productType');
const inputDivs = Array.from(document.querySelector('#itemProperties').children);

// Attēlojam attiecīgā inventāra tipa atribūtu ievadlaukus
function revealer() {
    // Sākumā apslēpjam iepriekš atlasītās vērtības
    inputDivs.forEach(function (div) {
        div.setAttribute("style", "");
        div.value = "";
    });

    // Meklējam pēc atlasītās vērtības, kurš div ir lietotājam jāatklāj
    var divID = typeDropdown.value;
    if (divID) { 
        document.getElementById(divID).setAttribute("style", "display:inline");
        inputDivs[inputDivs.length - 1].innerHTML = "Please, provide ";
    }
};