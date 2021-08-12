function en1() {
    document.getElementById("adr1").disabled=!document.getElementById("door1").checked;
    document.getElementById("skld1").disabled=document.getElementById("door1").checked;
}

function en() {
    if (document.getElementById("door1").checked) {
        document.getElementById("adr1").disabled = false;
        document.getElementById("skld1").disabled = true;
    } else if (document.getElementById("sklad1").checked) {
        document.getElementById("adr1").disabled = true;
        document.getElementById("skld1").disabled = false;
    }
}

function en12() {
    document.getElementById("adr2").disabled=!document.getElementById("door2").checked;
    document.getElementById("skld2").disabled=document.getElementById("door2").checked;
}

function en2() {
    if (document.getElementById("door2").checked) {
        document.getElementById("adr2").disabled = false;
        document.getElementById("skld2").disabled = true;
    } else if (document.getElementById("sklad2").checked) {
        document.getElementById("adr2").disabled = true;
        document.getElementById("skld2").disabled = false;
    }
}