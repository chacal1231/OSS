import socket
import pymodbus
import serial
from pymodbus.pdu import ModbusRequest
from pymodbus.client.sync import ModbusSerialClient as ModbusClient #initialize a serial RTU client instance
from pymodbus.transaction import ModbusRtuFramer

import logging
logging.basicConfig()
log = logging.getLogger()
log.setLevel(logging.DEBUG)

#count= the number of registers to read
#unit= the slave unit this request is targeting
#address= the starting address to read from

client= ModbusClient(method = "rtu", port="/dev/ttyS0",stopbits = 1, bytesize = 8, parity = 'N', baudrate= 9600)

#Connect to the serial modbus server
connection = client.connect()
client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
client_socket.connect(('181.129.168.242', 7774))
while 1:
    data = client_socket.recv(512)
    if ( data == 'Command1\r\n'):
	#Start DAU Testing
	DAU_Start  = client.write_register(40002, 0, unit=0x0a)
	print "DAU testing start"
    elif ( data == 'Command2\r\n'):
	print "DAU testing stop"
	DAU_Stop  = client.write_register(40002, 1, unit=0x0a)
