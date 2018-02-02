import socket
import pymodbus
import serial
from pymodbus.pdu import ModbusRequest
from pymodbus.client.sync import ModbusSerialClient as ModbusClient #initialize a serial RTU client instance
from pymodbus.transaction import ModbusRtuFramer
import os
import time
#count= the number of registers to read
#unit= the slave unit this request is targeting
#address= the starting address to read from

client= ModbusClient(method = "rtu", port="/dev/ttyUSB0",stopbits = 1, bytesize = 8, parity = 'N', baudrate= 9600)

#Connect to the serial modbus server
connection = client.connect()
client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
client_socket.settimeout(None)
client_socket.setsockopt( socket.SOL_SOCKET, socket.SO_KEEPALIVE, 1)
client_socket.connect(('181.129.168.242', 7774))

while 1:
    data = client_socket.recv(512)
    if ( data == 'Command1\r\n'):
	#Start DAU Testing
	DAU_Start  = client.write_register(1, 0, unit=1)
	print "DAU testing start"
	time.sleep(10)
	os.system('sudo python /home/pi/OSS/Python/SendData.py &')
    elif ( data == 'Command2\r\n'):
	print "DAU testing stop"
	while 1:
	 	with open('flag.txt', 'r+') as f:
                	text = f.read()
                	if (text == '0'):
				DAU_Stop  = client.write_register(1, 1, unit=1)
				os.system('sudo pkill -9 -f /home/pi/OSS/Python/SendData.py')
                        	break;

