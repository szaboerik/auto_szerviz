$(function() {
    const token=$('meta[name="csrf-token"]').attr('content');
    const userTomb=[];
    const ajax=new Ajax(token);
    let feladatokVegpont="http://localhost:8000/api/dfeladatok";
    ajax.getAjax(feladatokVegpont, userTomb, feladatLista);

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