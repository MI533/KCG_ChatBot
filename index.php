<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="cache-control" content="max-age=0" />
  <meta http-equiv="cache-control" content="no-cache" />
  <title>Chat UI</title>
  <link rel="stylesheet" href="assests/css/bootstrap.min.css">
  <link rel='stylesheet' href='assests/css/font-awesome.min.css'>

  <link rel='stylesheet' href='assests/css/fonts.google.css'>
  <link rel="stylesheet" href="assests/css/styleui.css">
  <link rel="stylesheet" href="assests/css/font1.min.css">
  <style>

    body {font-family: Arial, Helvetica, sans-serif;
      background: url("assests/image/tempsite.png") no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;}
    *{box-sizing: border-box;}

    #name,#mailid,#cno, select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-sizing: border-box;
      margin-top: 2px;
      height:40px;
      margin-bottom: 3px;
      resize: vertical;
      }

    #gen{
      background-color: #e7a54f;
      color: white;
      padding: 1px 1px;
      border: none;
      font-size: 13px;
      height: 32px;
      width: 140px;
      border-radius: 20px;
      cursor: pointer;
      }

   #gen:hover {
      background-color: #4f262e;
      }

    .hidden{
      display: none;
      }
   .hidden1{
      display: none;
      }  
    .err{
      color:red;
      font-size:14px;
      font-family: Arial, Helvetica, sans-serif;
      font-weight: bold;
    }

  </style>
<script type="text/javascript" src="assests/js/jquery.min.js"></script>

  <script>

function validate(choice) {
  if(choice==2||choice==1)
        {
        var name = document.forms["usr-details"]["name"].value;
        var flag=0;
        
          if(/^[A-Za-z\s]+$/.test(name)){
          }
        else{
          document.getElementById('name_err').innerHTML="  *       Please enter the valid name";
          flag=1;
          }
        }
          if(choice==3 || choice==1)
          {
          var email = document.forms["usr-details"]["mailid"].value;
        if(email==""){
        
          document.getElementById('mailid_err').innerHTML="  *   Please enter the email";
          flag=1;
          }else{
          var re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
          var x=re.test(email);
          if(x){
          }else{
            document.getElementById('mailid_err').innerHTML="  *   Email id not in correct format";
            flag=1;
          }}
          } 
          if(choice==1){
            var phonenumber = document.forms["usr-details"]["cno"].value;
        var te=/^[6789][0-9]{9}$/;
        if(te.test(phonenumber))
        {        
        }else{
          document.getElementById('cno_err').innerHTML="  *   Mobile number is invalid";         
    flag=1;
        }
          }          
        if(flag==0)
        return true;
        else
        return false;
        } 



$(document).ready( function () {
		$('#usr-details button').click( function (e) {
			var formdata = "name="+document.getElementById('name').value+"&cno="+document.getElementById('cno').value+"&mailid="+document.getElementById('mailid').value;
      var inquiryId=$(this).attr("value");
      if(validate(1)==true)
      {
			$.ajax({
			    type: "POST",
			    url: "Register.php",
			    data: formdata
                
			 });
       if(inquiryId=='General Inquiry')
         {           
          generalInquiry();
         }
       else 
       {
        admissionInquiry();
       } 
      }
			return false;
        
		});
	});

  $(document).ready( function () {
		$('#query button').click( function (e) {
			console.log(document.getElementById('query1').value);
      
			$.ajax({
			    type: "POST",
			    url: "query.php",
			    data: "query="+document.getElementById('query1').value  ,
          success: function(result){
          }              
			 });  
       var elem = document.getElementById("query");
      elem.parentNode.removeChild(elem);
      var hidden = document.getElementsByClassName("hidden");
      for (var i = 0; 1 != hidden.length; i++) {
        hidden[i].style.display = "block";    
      }
			return false;        
		});
	});



    function generalInquiry() {
      var elem = document.getElementById("usr-details");
      elem.parentNode.removeChild(elem);
      var hidden = document.getElementsByClassName("hidden");
      for (var i = 0; 1 != hidden.length; i++) {
        hidden[i].style.display = "block";
      }
      }


     function admissionInquiry(){
      var elem1 = document.getElementById("usr-details");
      elem1.parentNode.removeChild(elem1);
      
      var hidden1 = document.getElementsByClassName("hidden1");
      for (var j = 0; 1 != hidden1.length; j++) {
        hidden1[j].style.display = "block";
      }
       }

      
    function empty(v)
    {
      if(v==1)
      document.getElementById('name_err').innerHTML=" ";
      if(v==2)
      {
        
      document.getElementById('mailid_err').innerHTML=" ";
      validate(2);
      document.getElementById('cno_err').innerHTML=" ";
    }
      if(v==3)
      {document.getElementById('mailid_err').innerHTML=" ";
      
      validate(3);}
    }


      
  </script>
</head>

<body>
  <div id="chat" class="col-sm-4">
    <div id="chat-circle">
      <div id="chat-overlay"></div>
      <img src="assests/image/icon1.jpg" style="border-radius: 50%;
      width: 100%;" alt="chat">
    </div>
    <div class="chat-box" style="display: none;">
      <div class="chat-box-header">KCG-Bot <span class="chat-box-toggle"> <i class="material-icons">close</i> </span>
      </div>
      <div class="chat-box-body">
        <div class="chat-box-overlay"> </div>
        <div class="chat-logs">
        <?php if(!isset($_SESSION['s_email'])){?>
          <form id='usr-details' autocomplete="off" name="usr-details"  >
            <div id="cm-msg-0" class="chat-msg user" >
               <span class="msg-avatar"> <img src="assests/image/icon1.jpg">
              </span>
              <br><br>
              <i class="fa fa-user icon"></i>
              <label for="fname">Name</label>
              <input type="text" id="name" onkeyup="this.value = this.value.toUpperCase();" placeholder="Your name.." name="name" onclick="empty(1)">
              <span class="err"  id="name_err"></span><br>
              <i class="fa fa-envelope icon"></i>
              <label for="subject">E-Mail</label>
              <input type="text" onkeyup="this.value = this.value.toLowerCase();" id="mailid" name="mailid" placeholder="Your E-mail..." onclick="empty(2)" >
              <span class="err" id="mailid_err"></span><br>

              <i class="fa fa-phone"></i>
              <label for="country">Contact Number</label>
              <input type="text" id="cno" name="cno" placeholder="+91" onclick="empty(3)" maxlength="10" minlength="10" >
              <span class="err" id="cno_err"></span><br>
              Kindly choose from one of the following to get started.<br><br>
      
              <div>
                  <button type="submit" id='gen' name='gen' value='Admission Inquiry'>Queries</button>
                   <button type="submit" id='gen' name='gen' value='General Inquiry'>Chat-Bot</button>
                 </div>
            
          </form>     
        </div>
        <?php }else { ?>

          <div id="cm-msg-0" class="chat-msg user">
          <span class="msg-avatar"> <img src="assests/image/icon1.jpg"> </span>
          <div class="cm-msg-text">Hello I'm KCG Bot (beta)</div>
        </div>



       <?php }?>  
        <div id="cm-msg-0" class="chat-msg user hidden">
          <span class="msg-avatar"> <img src="assests/image/icon1.jpg"> </span>
          <div class="cm-msg-text">Hello I'm KCG Bot (beta)</div>
        </div>

        
        <div id="cm-msg-0" class="chat-msg user hidden1">
          <form id='query'>
            <label class="hidden1">Send us your queries</label>
            <textarea rows="30" cols="30" name='query1' id="query1" class='hidden1' placeholder="Enter your query..." style="width:100%; height: 200px;"></textarea>
            <br><button type="submit" id='gen' class='hidden1'>Submit</button>
          </form>
        </div>


      </div>
      <div id="load" style="display:none;margin-left: 30px;margin-bottom: 10px">
        <i class="fa fa-circle" style="color: #5A5EB9"> </i>
        <i class="fa fa-circle" style="color: #6467AD"> </i>
        <i class="fa fa-circle" style="color:#CFD1F4"> </i>
      </div>
      <!--chat-log -->
    </div>
 <?php if(!isset($_SESSION['s_email'])){?> 
    <div class="chat-input hidden ">
      <form>
        <input type="text" id="chat-input" placeholder="Send a message...">
        <button type="submit" class="chat-submit" id="chat-submit"><em class="material-icons">send</em></button>
      </form>
    </div>
    <?php }else { ?>

      <div class="chat-input ">
      <form>
        <input type="text" id="chat-input" placeholder="Send a message...">
        <button type="submit" class="chat-submit" id="chat-submit"><em class="material-icons">send</em></button>
      </form>
    </div>

      <?php }?>
  </div>
  
  <script src="assests/js/jquery.min.js"></script>
  <script src="assests/js/bootstrap.min.js"></script>
  <script src="assests/js/index.js"></script>
</body>

</html>