import string
from docx.api import Document

def getRequest(arr):
	string = ''
	for word in arr:
		string += word + '____'
	return string.split('____')	

def readDocx(name):
	str = ''
	document = Document(name)
	for para in document.paragraphs:
		str = str + para.text + u" endpara "
	
	tables = document.tables
	for table in tables:
		for row in table.rows:
			for cell in row.cells:
				for paragraph in cell.paragraphs:
					str = str + paragraph.text + u" endpara "
		
	str = str.lower()
	return str
	
def readTxt(path):
	return open("C:\\xampp\\htdocs\\Plagiarism\\python\\keywords\\" + path + ".txt", "r")

def getKeyword(list, s):
	result = ''
	for line in list:
		key = line.lstrip().rstrip().decode('utf_8')
		keyReplace = key.replace(' ', '_')
		sum = s.count(key, 0 , len(s)) # tong so lan xuat hien
		if(sum > 0):
			keyReplace = keyReplace.replace(keyReplace, "(" + keyReplace + "|" + str(sum) +")")
			result = result + keyReplace + ' '
	return result.lstrip().rstrip()

def getContent(list, s):
	for line in list:
		key = line.lstrip().rstrip().decode('utf_8')
		s = s.replace(key, key.replace(' ', '_'))
	return s.lstrip().rstrip()