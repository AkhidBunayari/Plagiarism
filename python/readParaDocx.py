# -*- coding: utf8 -*-
import sys
import codecs
import lib

sys.stdout = codecs.getwriter('utf_8')(sys.stdout)
sys.stdin = codecs.getreader('utf_8')(sys.stdin)

list = lib.getRequest(sys.argv[1:])
	
Paragraph = lib.readDocxParagraph(list[0])	
listPara = Paragraph.split(u"endpara")

para = lib.convertXML(listPara, list[1])


print para