import serial
ser = serial.Serial ("/dev/ttyS0")    #Open named port 
ser.baudrate = 9600                     #Set baud rate to 9600
for x in xrange(1,10):
	ser.write(x)
                     	pass                     #Read ten characters from serial port to data
ser.write(data)                         #Send back the received data
ser.close()  