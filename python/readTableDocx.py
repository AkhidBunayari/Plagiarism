# -*- coding: utf8 -*-
import sys
import codecs
import lib

sys.stdout = codecs.getwriter('utf_8')(sys.stdout)
sys.stdin = codecs.getreader('utf_8')(sys.stdin)

list = lib.getRequest(sys.argv[1:])

Table = lib.readDocxTable(list[0])
listTable = Table.split(u"endpara")

table = lib.convertXML(listTable, list[1])

print table