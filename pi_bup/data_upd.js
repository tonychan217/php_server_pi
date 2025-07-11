
   $(document).ready(function(){
        function getData(){
$.ajax({
                type: 'POST',
                url: 'time1.php',
                success: function(data){
                    $('#time1').html(data);
                }
            });
        
$.ajax({
                type: 'POST',
                url: 'time2.php',
                success: function(data){
                    $('#time2').html(data);
                }
            });
        }
        getData();
        setInterval(function () {
            getData();  
        }, 5000);  // it will refresh your data every 1 sec

    });
