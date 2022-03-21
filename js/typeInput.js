const typeDropdown = document.querySelector('#productType');
const inputDivs = Array.from(document.querySelector('#itemProperties').children);

// Attēlojam attiecīgā inventāra tipa atribūtu ievadlaukus
function revealer()
{
    // Sākumā apslēpjam iepriekš atlasītās vērtības un tās notīram
    inputDivs.forEach(function (div)
    {
        div.setAttribute("style", "");
        div.value = "0";
    });

    // Meklējam pēc atlasītās vērtības, kurš div ir lietotājam jāatklāj
    var divID = typeDropdown.value;
    if (divID)
    {
        document.getElementById(divID).setAttribute("style", "display:block");
    }
};