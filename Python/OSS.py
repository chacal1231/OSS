import serial
ser = serial.Serial('/dev/ttyS0', baudrate=9600,
                    parity=serial.PARITY_NONE,
                    stopbits=serial.STOPBITS_ONE,
                    bytesize=serial.EIGHTBITS
                    )
for x in xrange(1,10):
	ser.write("Hola desde PI\r\n")
	pass
ser.close()  
