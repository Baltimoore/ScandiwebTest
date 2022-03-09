const typeDropdown = document.querySelector('#productType');
const inputDivs = Array.from(document.querySelector('#itemProperties').children);

// Liekam sekot līdzi izmaiņām
typeDropdown.addEventListener("onchange", revealer());

// Attēlojam attiecīgā inventāra tipa atribūtu ievadlaukus
function revealer() {
    // Sākumā apslēpjam iepriekš atlasītās vērtības
    inputDivs.forEach(function (div) {
        div.setAttribute("style", "");
    });
    // Meklējam pēc atlasītās vērtības, kurš div ir lietotājam jāatklāj
    var num = typeDropdown.selectedIndex - 1;
    if (num >= 0) { inputDivs[num].setAttribute("style", "display:inline"); }
};