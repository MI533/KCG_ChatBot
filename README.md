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
      
Types of Bot:
   1. Retrieval bot.
   2. Machine Learning bot.
   
Steps in Chatbot Created for KCG College of Technology:


   1. The chat file written in python language reads the backend database which contains the details
      about the customer.
      
   2. The chat application retrieves those sentences that match the user query.
   
   3. Natural Language Tool Kit Library is used for token matching.
   
   4. First NLTK Library updates its tokens by updating is wordnet, punkt packages.
   
   5. The details in the database are converted into sentences.The details are taken from the wikipedia college
      site:https://en.wikipedia.org/wiki/KCG_College_of_Technology
   
   6. Sentences are converted into words.
   
   7. Concepts like Stopwords Removal, Stemming are applied.
   
   8. After step 7, only those tokens will remain the backend database.
   
   9. When user inputs a query, the query that matches with tokens in the backend database is
      retrieved as response by the system to the user.
Eg:
What about Placement in your college?
Stemming: Place
Stopwords: Place is present.
So it will not retrieve any results for the keyword placement.

Keywords to retrieve:
1.	Information about college

2.	Location

3.	History

4.	Ug courses

5.	Pg courses

6.	Innovation cell

7.	Entrepreneurship cell

8.	Mou

9.	Campus Facilities

10. Sports

11. Hostel Accomodation

12. Kcg connect

13. HYLC

14. Objectieves

15. Mission

16. Vision

  
      
    DB creation query:
      CREATE TABLE `chat_usr`.`usr` ( `s.no` INT NOT NULL AUTO_INCREMENT , `usr_name` VARCHAR(30) NOT NULL , `usr_phone` BIGINT(20) NOT       NULL , `usr_email` VARCHAR(30) NOT NULL , `date_time` DATETIME NOT NULL , `query` VARCHAR(250) NOT NULL , PRIMARY KEY (`s.no`))         ENGINE = InnoDB;

For user friendliness and convenience, a more concise user interface was developed. 

In addition, JS, HTML and CSS were employed in designing the chatbot user interface..

In addition, to improve user experience when interacting with chatbots, simple greetings to the user has be implemented as well.

Chatbot will retrieve and display the answer, which is selected based on the highest similarity between the question bank and user’s question.

NOTE:
   Run this in google chrome browser for better experience with UI.
   
   Click the logo at right bottom of the page to continue with KCG chatbot.
