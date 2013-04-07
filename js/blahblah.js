function  handleServerMessage(data) { 
            $("#discuss").append(data);
        }


// Main Long Poll function
function longPoll()
        {
            // Open an AJAX call to the server's Long Poll PHP file
            $.get('server.php', function(data)
            {
                // Callback to handle message sent from server
                if (data !=='') {handleServerMessage(data);}

                // Open the Long Poll again
                longPoll();
            });
        }
/*
        {"users":
                    "[{\"id\":\"76\",\"0\":\"76\",\n\
                        \"time\":\"1365326619.636\",\"1\":\"1365326619.636\",\n\
                        \"nickname\":\"asdas\",\"2\":\"asdas\",\n\
                         \"online\":\"1\",\"3\":\"1\"}]",
         "messages":"[]"}
   */     
function handleServerMessage(data) {
  // alert(data); 
   data  = $.parseJSON(data);
    
    //data.messages = $.parseJSON(data.messages);
    
    if (data.users) {
         userz = $.parseJSON(data.users);
          $(userz).each(function() {
   //         alert(this.nickname);
            $("ul#users").append('<li class="user">'+this.nickname+'</li>');
        });
    }
    
    if (data.messages) {
        //alert(data.messages);
        messagez = $.parseJSON(data.messages);
        $(messagez).each(function() {
            $("#discuss").append('<p>['+this.nickname+'] ' + this.message + '</p>');
            $("#discuss0").animate({scrollTop:$("#discuss")[0].scrollHeight}, 1000);
        });  
        
    } 
}

$(document).ready(function() {
   
    $("#chat").resizable();

    
        // Make the initial call to Long Poll
        longPoll();
   
        $("#discuss").html("Hello");
        
        $("#sendBtn").click(function(event) {
            event.preventDefault();
            
            nick = $("#welnick").html();
            msg = $("#inputTxt").val();
            
          //  $("#discuss").append('<p>['+nick+'] ' + msg + '</p>');
            $.ajax({
                url: 'enterMsg.php',
                type: 'POST',
                data: {nickname: nick, message:msg} 
            });
            $("#inputTxt").val('');
        });

});