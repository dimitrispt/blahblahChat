<!DOCTYPE html>
<html>
 <head>
     <title>blah blah blah blah blah blah blah blah blah blah blah blah blah blah</title>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <link rel="stylesheet" href="styles/blahblah.css" type="text/css" />
      <link rel="stylesheet" type="text/css"
                href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/cupertino/jquery-ui.css" />
 </head>
 <body>
    
    <div id="chat">
        <div id="wrapper">
            <div id="discuss0"><div id="discuss"></div></div>
           <div id="user_list0"><div id="user_list">
                   <ul id="users">
                    <?php
                    if (isset($users_init)) {
                        $c = 1;
                        foreach ($users_init as $user) {
                            echo '<li class="user" id="user'. $c . '">'.$user['nickname']."</li>";
                            $c++;
                        }
                    }
                   
                    ?>
                  
                   </ul>
                   </div></div>
        </div>
        <div id="msg">
            <form>
                <br/>
            <input type="text" id="inputTxt" size="70"/>
            <button id="sendBtn">send</button>
            </form>
        </div>
    </div>
            <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
            <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
            <script type="text/javascript" src="js/blahblah.js"></script>
       
        
        
 </body>
</html>
