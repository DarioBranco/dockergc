$(function(){


    let datePicker = document.getElementById('datePicker');
    /*let picker = new Lightpick({
        field: datePicker,
        autoclose: false,
        hideOnBodyClick: false,
        repick: false,
        singleDate: false
        onSelect: function(date){
            datePicker.value = date.format('D MMMM YYYY');
            //window.location.href = "/dashboard.php?day="+datePicker.value;

        },
        onClose: function(){
          datePicker.value = "Antonio"
        }
    });*/

    var picker = new Lightpick({
        field: datePicker,
        singleDate: false,
        onSelect: function(start, end){

            window.location.href = "http://localhost:8080/dashboard.php?day="+start.format('D MMMM YYYY')+"&lastday="+end.format('D MMMM YYYY');

        }
    });



});
