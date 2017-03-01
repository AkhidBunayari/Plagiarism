# -*- coding: utf8 -*-
import sys
import codecs
from docx import Document

sys.stdout = codecs.getwriter('utf_8')(sys.stdout)
sys.stdin = codecs.getreader('utf_8')(sys.stdin)

# nhan reqest PHP
string = ''
for word in sys.argv[1:]:
    string += word + ' '

# doc file docx dua ket qua vao strInput
strInput = ''
	
document = Document(string)
for para in document.paragraphs:
	strInput = strInput + ' ' + para.text

strInput = strInput.lower()
	
# doc tuong dong file keyword	
file = open("C:\\xampp\\htdocs\\Plagiarism\\python\\CNTT.txt", "r") 
for line in file: 
	key = line.lstrip().rstrip().decode('utf_8')
	strInput = strInput.replace(key, u"a")

	
print strInput
	
