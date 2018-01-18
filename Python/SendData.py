import socket
import pymodbus
import serial
import time
from pymodbus.pdu import ModbusRequest
from pymodbus.client.sync import ModbusSerialClient as ModbusClient #initialize a serial RTU client instance
from pymodbus.transaction import ModbusRtuFramer
from random import randint

#count= the number of registers to read
#unit= the slave unit this request is targeting
#address= the starting address to read from

client= ModbusClient(method = "rtu", port="/dev/ttyS0",stopbits = 1, bytesize = 8, parity = 'N', baudrate= 9600)

#Connect to the serial modbus server
connection = client.connect()
client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
client_socket.connect(('181.129.168.242', 7774))
while 1:
	#SendLFR
	client.write_register(40027, randint(0,9), unit=0x0a)
	temps_LFR  = client.read_holding_registers(40027, 1, unit=1)
	LFR = "LFR=" + str(temps_LFR.registers)[1:-1]
	print LFR
	client_socket.send(LFR)
	#SendWFR
	client.write_register(40029, randint(0,9), unit=0x0a)
	temps_WFR  = client.read_holding_registers(40029, 1, unit=1)
        WFR = "WFR=" + str(temps_WFR.registers)[1:-1]
        print WFR
        client_socket.send(WFR)
	#SendOFR
	client.write_register(40031, randint(0,9), unit=0x0a)
	temps_OFR  = client.read_holding_registers(40031, 1, unit=1)
	OFR = "OFR=" + str(temps_OFR.registers)[1:-1]
	print OFR
	client_socket.send(OFR)
	#SendGFR
	client.write_register(40033, randint(0,9), unit=0x0a)
	temps_GFR  = client.read_holding_registers(40033, 1, unit=1)
	GFR = "GFR=" + str(temps_GFR.registers)[1:-1]
	print GFR
	client_socket.send(GFR)
	#SendGVF
	client.write_register(40035, randint(0,9), unit=0x0a)
	temps_GVF  = client.read_holding_registers(40035, 1, unit=1)
	GVF = "GVF=" + str(temps_GVF.registers)[1:-1]
	print GVF
	client_socket.send(GVF)
	#SendTMP
	client.write_register(40037, randint(0,9), unit=0x0a)
	temps_TMP  = client.read_holding_registers(40037, 1, unit=1)
	TMP = "TMP=" + str(temps_TMP.registers)[1:-1]
	print TMP
	client_socket.send(TMP)
	#SendPRE
	client.write_register(40039, randint(0,9), unit=0x0a)
	temps_PRE  = client.read_holding_registers(40039, 1, unit=1)
	PRE = "PRE=" + str(temps_PRE.registers)[1:-1]
	print PRE
	client_socket.send(PRE)
	#SendWCUT
	client.write_register(40041, randint(0,9), unit=0x0a)
	temps_WCUT  = client.read_holding_registers(40041, 1, unit=1)
	WCUT = "WCUT=" + str(temps_WCUT.registers)[1:-1]
	print WCUT
	client_socket.send(WCUT)
	time.sleep(30)
