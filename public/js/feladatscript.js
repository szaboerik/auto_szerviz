$(function() {
    const token=$('meta[name="csrf-token"]').attr('content');
    const feladatTomb=[];
    const ajax=new Ajax(token);
    let feladatokVegpont="http://localhost:8000/api/dfeladatok";
    ajax.getAjax(feladatokVegpont, feladatTomb, feladatLista);

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
});