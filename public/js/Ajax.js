class Ajax{
    constructor(token){this.token=token;}   

    getAjax(apivegpont, tomb, callback){    
        $.ajax({url: apivegpont, type: "GET",success: function(result){
            tomb.splice(0,tomb.length);
            result.forEach(element => {
                tomb.push(element);
            });
            callback(tomb);
            }
        });
    }
}

class Szerelo{
    constructor(token){this.token=token;}   
    getSzerelo(apivegpont, tomb, callback){  
        $.ajax({url: apivegpont, type: "GET",success: function(result){
            tomb.splice(0,tomb.length);
            result.forEach(element => {
                tomb.push(element);
            });
            callback(tomb);
            }
        });
    }
}
