$(function() {
    const token=$('meta[name="csrf-token"]').attr('content');
    const ajax=new Ajax(token);

    let feladatokVegpont="http://localhost:8000/api/dfeladatok";
    const feladatTomb=[];
    ajax.getAjax(feladatokVegpont, feladatTomb, feladatLista);

    function feladatLista(feladatok) {
        const szuloElem = $("section table tbody");
        const sablonElem = $("aside table tr");
        szuloElem.empty();
        feladatok.forEach(function(elem) {    
            let sablonClone = sablonElem.clone();
            sablonClone.show();
            let node=sablonClone.appendTo(szuloElem);
            const obj = new Feladat(node, elem);
        });

    }

});