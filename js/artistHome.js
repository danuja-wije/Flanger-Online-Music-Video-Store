function display(data){
    if(data == 'open'){
        document.querySelector('.bac').style.display = "flex";
    }
    else if(data == 'close'){
        document.querySelector('.bac').style.display = "none";
    }
}

function update(type){

    if(type == 'click'){
        document.querySelector('.bac2').style.display = "flex";
    }
    else if(type == 'end'){
        document.querySelector('.bac2').style.display = "none";
    }
}

function deleteB(data){
    if(data == 'open'){
        document.querySelector('.bac3').style.display = "flex";
    }
    else if(data == 'close'){
        document.querySelector('.bac3').style.display = "none";
    }
}

