$(function() {
    const token=$('meta[name="csrf-token"]').attr('content');
    const ajax=new Ajax(token);

    let feladatokVegpont="http://localhost:8000/api/dfeladatok";
    const feladatTomb=[];
    const dolgozoTomb=[];
    ajax.getAjax(feladaokVegpont, feladatTomb, feladatLista);
    //ajax.getAjax(feladatokVegpont, dolgozoTomb, dolgozoLista);

    function feladatLista(feladatok) {
        const szuloElem = $("section table tbody");
        const sablonElem = $("aside table tr");
        szuloElem.empty();
        //sablonElem.show();
        feladatok.forEach(function(elem) {    
            let sablonClone = sablonElem.clone();
            sablonClone.show();
            let node=sablonClone.appendTo(szuloElem);
            const obj = new Feladat(node, elem);
        });
       // sablonElem.hide();

    }
    /*
    function dolgozoLista(szerelok){
        let option="";
        szerelok.forEach(function(elem){
            option="<option value='"+elem.szerelo+"'>"+elem.szerelo+"</option>";
            $("#felh").append(option);
        });
    }

    
    $("#felh").on("change",function(){
        let jelenlegiSzerelo=$(this, " option:selected").val();
        //ajax.getAjax(feladatokVegpont+jelenlegiSzerelo, feladatTomb, feladatLista);
    });
    */

});