# KCG_ChatBot

Information Retrieval Based chat bot

Requirements:
   BackEnd:
     1.Python 3.6
     2.Php
     3.Webserver 
     4.My SQL(php MyAdmin)
    
   FrontEnd:
     1.Html
     2.Css
     3.Js
    
  Open source Libraies:
    Python Libraies:
      1.NLTK
      2.numpy
      3.random
      4.string
      5.sys
      
    Javascript Libraies:
      1.jquery
      
    Css Libraies:
      1.Bootstrap
      2.Fonts.google
      3.Fonts-awesome      
      
    DB creation query:
      CREATE TABLE `chat_usr`.`usr` ( `s.no` INT NOT NULL AUTO_INCREMENT , `usr_name` VARCHAR(30) NOT NULL , `usr_phone` BIGINT(20) NOT       NULL , `usr_email` VARCHAR(30) NOT NULL , `date_time` DATETIME NOT NULL , `query` VARCHAR(250) NOT NULL , PRIMARY KEY (`s.no`))         ENGINE = InnoDB;

For user friendliness and convenience, a more concise user interface was developed. 

In addition, JS, HTML and CSS were employed in designing the chatbot user interface..

In addition, to improve user experience when interacting with chatbots, simple greetings to the user has be implemented as well.

Chatbot will retrieve and display the answer, which is selected based on the highest similarity between the question bank and user’s question.

