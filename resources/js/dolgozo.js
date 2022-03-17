$(function () {
    console.log('szoszi');
    const myAjax=new MyAjax();
    const feladatok = [];
    const szuloElem = $(".megjelenit");
    let apivegpont = "http://localhost/phpmyadmin/index.php?route=/sql&db=szar1&table=feladats&pos=0";

    myAjax.getAdat(apivegpont, feladatok, kiir);

    function kiir(tomb) {
        console.log(tomb);
        let sablon = "";
        tomb.forEach((elem) => {
            sablon += `
            <tr>
                <td>${elem.szerzo}</td>
                <td>${elem.szerzo}</td>
                <td>${elem.szerzo}</td>
                <td>${elem.szerzo}</td>
                <td>${elem.szerzo}</td>
            </tr>
            `;
        });
        szuloElem.html(sablon);
    }
});
