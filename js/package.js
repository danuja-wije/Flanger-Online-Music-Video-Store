

function payment(data) {

    if(data == 'open'){
        document.querySelector('.payment_model').style.display = "flex";
    }
    else if(data == 'close'){
        document.querySelector('.payment_model').style.display = "none";
    }
}

