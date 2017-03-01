# -*- coding: utf8 -*-
import sys
import codecs
from docx import Document

sys.stdout = codecs.getwriter('utf_8')(sys.stdout)
sys.stdin = codecs.getreader('utf_8')(sys.stdin)



file = codecs.open("Viet74K.txt", "r", encoding='utf8') 
for line in file: 
	print line