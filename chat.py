import nltk
import numpy as np
import random
import string 
import sys

doc=open('kcg_data.txt','r',errors = 'ignore')
data=doc.read()
data=data.lower()
#nltk.download('punkt') #once download this file by removing comment
#nltk.download('wordnet') #once download this file by removing comment


sent_tok = nltk.sent_tokenize(data) 
word_tok = nltk.word_tokenize(data)
lemmer = nltk.stem.WordNetLemmatizer()

def LemTok(tokens):
    return [lemmer.lemmatize(token) for token in tokens]
remove_punct_dict = dict((ord(punct), None) for punct in string.punctuation)
def LemNor(text):
    return LemTok(nltk.word_tokenize(text.lower().translate(remove_punct_dict)))

GREETING_INPUTS = ("hello", "hi", "greetings", "sup", "what's up","hey",)
GREETING_INPUTS1 = ("Admission under Management Quota",)
GREETING_RESPONSES = ["Hi, Welcome to KCG college","Hello, Welcome to KCG college"]
GREETING_RESPONSES1 = ["Please call +91-44-2233 9260 for admission details"]
def greeting(sentence):
 
    for word in sentence.split():
        if word.lower() in GREETING_INPUTS:
            return random.choice(GREETING_RESPONSES)
        elif word.lower() in GREETING_INPUTS1:
            return random.choice(GREETING_RESPONSES1)
        
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity

def response(user_response):
    robo_response=''
    TfidfVec = TfidfVectorizer(tokenizer=LemNor, stop_words='english')
    tfidf = TfidfVec.fit_transform(sent_tok)
    vals = cosine_similarity(tfidf[-1], tfidf)
    idx=vals.argsort()[0][-2]
    flat = vals.flatten()
    flat.sort()
    req_tfidf = flat[-2]
 
    if(req_tfidf==0):
        robo_response=robo_response+"I am sorry! I don't understand you"
        return robo_response
    else:
        robo_response = robo_response+sent_tok[idx]
        return robo_response
    
flag=True


user_response = ""
for n in range(1,len(sys.argv)):
  user_response +=" "
  user_response += str(sys.argv[n])
#user_response=input("")
user_response=user_response.strip()
user_response=user_response.lower()
if(user_response!='bye'):
	if(user_response=='thanks' or user_response=='thank you' ):
		flag=False
		print("You are welcome..")
	else:
		if(greeting(user_response)!=None):
			print(greeting(user_response))
		else:
			sent_tok.append(user_response)
			word_tok=word_tok+nltk.word_tokenize(user_response)
			final_words=list(set(word_tok))			
			print(response(user_response))			
			sent_tok.remove(user_response)
else:
	flag=False
	print("Bye! take care.")
