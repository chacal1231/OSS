while 1:
	with open('flag.txt', 'r+') as f:
		text = f.read()
		if (text == '0'):
			break;
		
