function dropRow(e){
    var id = e.target.id;
    if (id == "cancel0"){
        document.getElementById("rowId").value = 0;
    }
    else if (id == "cancel1"){
        document.getElementById("rowId").value = 1;
    }
    else if (id == "cancel2"){
        document.getElementById("rowId").value = 2;
    }
}
