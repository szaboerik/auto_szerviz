$(function() {
    const token=$('meta[name="csrf-token"]').attr('content');
    const ajax=new Ajax(token);
    //
    const szerelo = new Szerelo(token);
    //
    let feladatokVegpont="http://localhost:8000/api/dfeladatok/";
    const feladatTomb=[];
    const felTomb=[];
    ajax.getAjax(feladatokVegpont, feladatTomb, feladatLista);
    ajax.getAjax(feladatokVegpont, feladatTomb, szereloLista);
    szerelo.getSzerelo(feladatokVegpont, felTomb, kivalasztottSzerelo);

    function feladatLista(feladatok) {
        const szuloElem = $("section table tbody");
        const sablonElem = $("aside table tr");
        szuloElem.empty();
        feladatok.forEach(function(elem) {    
            let node = sablonElem.clone().appendTo(szuloElem);
            const obj = new Feladat(node, elem);

        });
        sablonElem.hide();

    }

    function szereloLista(szerelok){
        let option="";
        szerelok.forEach(function(elem){
            option="<option value='"+elem.szerelo+"'>"+elem.szerelo+"</option>";
            $("#felh").append(option);
        });
    }
    function kivalasztottSzerelo() {
    $("#felh").on("change",function(){
        let jelenlegiSzerelo=$(this, " option:selected").val();
        console.log(jelenlegiSzerelo);
        szerelo.getSzerelo(feladatokVegpont+jelenlegiSzerelo, feladatTomb, feladatLista);
    });
}

});