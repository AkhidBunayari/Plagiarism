# -*- coding: utf8 -*-
import sys
import codecs
import lib

sys.stdout = codecs.getwriter('utf_8')(sys.stdout)
sys.stdin = codecs.getreader('utf_8')(sys.stdin)

list = lib.getRequest(sys.argv[1:])	
resultDocx = lib.readDocx(list[0])	


listPara = resultDocx.split(u"endpara")

para = ''

for s in listPara:
	keywords = lib.getKeyword(lib.readTxt(list[1]), s)
	content = lib.getContent(lib.readTxt(list[1]), s)
	
	keywords = '<Keywords>' + keywords + '</Keywords>'
	content = '<Content>' + content + '</Content>'
	para = para + '<Para>' + keywords + content + '</Para>'

print para