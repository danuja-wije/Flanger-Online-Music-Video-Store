document.write(Date());
function hover(data){
    var detail = document.getElementById("cont_box1");

    if(data == 'item1'){
        detail.style.display = "flex";
    }
    else
        detail.style.display = "none";
}