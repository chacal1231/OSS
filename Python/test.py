import socket
import pymodbus
import serial
import time
from pymodbus.pdu import ModbusRequest
from pymodbus.client.sync import ModbusSerialClient as ModbusClient #initialize a serial RTU client instance
from pymodbus.transaction import ModbusRtuFramer
from random import randint
from pyModbusTCP import utils


client= ModbusClient(method = "rtu", port="/dev/ttyUSB0",stopbits = 1, bytesize = 8, parity = 'N', baudrate= 9600)

#Connect to the serial modbus server
client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
client_socket.connect(('181.129.168.242', 7774))
while 1:
	connection = client.connect()
        #60S values to send
        #SendLFR
	client.write_register(0, 123, unit=1)
	client.write_register(1,0, unit=1)
        temps_LFR  = client.read_holding_registers(14, 100, unit=1)
        DEC_LFR = [temps_LFR.registers[8],temps_LFR.registers[7]]
	LFR_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_LFR)]
        LFR = "LFR=" + str(LFR_float[0])
        print LFR
	print "Status: " + str(temps_LFR.registers[0])
	#client_socket.send(LFR)
	time.sleep(1)
	client.close()
