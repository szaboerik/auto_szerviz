/*$(function () {
    console.log('szoszi');
    const myAjax=new MyAjax();
    const feladatok = [];
    const szuloElem = $(".megjelenit");
    let apivegpont = "http://127.0.0.1:8000/mvezeto/feladatok";

    myAjax.getAdat(apivegpont, feladatok, kiir);

    function kiir(tomb) {
        console.log(tomb);
        let sablon = "";
        tomb.forEach((elem) => {
            sablon += `
            <tr>
                <td>{{ $feladat->f_szam}}</td>
            </tr>
            `;
        });
        szuloElem.html(sablon);
    }
});
*/
$(document).ready(function() {
    $("#getData").click(function() { 
     $.ajax({  //create an ajax request to display.php
      type: "GET",
      url: "/ezaz",       
      success: function (data) {
        $("#f_szam").html(data.f_szam);
        $("#jelleg").html(data.jelleg);
        $("#szerelo").html(data.szerelo);
        $("#mukaora").html(data.munkaora);
        console.log('jo');
      }
    });
  });
})

