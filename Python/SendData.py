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
        #60S values to send
	#SendLFR
	client.write_register(40027, randint(0,90), unit=0x0a)
	temps_LFR  = client.read_holding_registers(40027, 1, unit=1)
	LFR = "LFR=" + str(temps_LFR.registers)[1:-1]
	client_socket.send(LFR)
	#SendWFR
	client.write_register(40029, randint(0,9), unit=0x0a)
	temps_WFR  = client.read_holding_registers(40029, 1, unit=1)
        WFR = "WFR=" + str(temps_WFR.registers)[1:-1]
        client_socket.send(WFR)
	#SendOFR
	client.write_register(40031, randint(0,9), unit=0x0a)
	temps_OFR  = client.read_holding_registers(40031, 1, unit=1)
	OFR = "OFR=" + str(temps_OFR.registers)[1:-1]
	client_socket.send(OFR)
	#SendGFR
	client.write_register(40033, randint(0,9), unit=0x0a)
	temps_GFR  = client.read_holding_registers(40033, 1, unit=1)
	GFR = "GFR=" + str(temps_GFR.registers)[1:-1]
	client_socket.send(GFR)
	#SendGVF
	client.write_register(40035, randint(0,9), unit=0x0a)
	temps_GVF  = client.read_holding_registers(40035, 1, unit=1)
	GVF = "GVF=" + str(temps_GVF.registers)[1:-1]
	client_socket.send(GVF)
	#SendTMP
	client.write_register(40037, randint(0,9), unit=0x0a)
	temps_TMP  = client.read_holding_registers(40037, 1, unit=1)
	TMP = "TMP=" + str(temps_TMP.registers)[1:-1]
	client_socket.send(TMP)
	#SendPRE
	client.write_register(40039, randint(0,9), unit=0x0a)
	temps_PRE  = client.read_holding_registers(40039, 1, unit=1)
	PRE = "PRE=" + str(temps_PRE.registers)[1:-1]
	client_socket.send(PRE)
	#SendWCUT
	client.write_register(40041, randint(0,9), unit=0x0a)
	temps_WCUT  = client.read_holding_registers(40041, 1, unit=1)
	WCUT = "WCUT=" + str(temps_WCUT.registers)[1:-1]
	client_socket.send(WCUT)

        #Accumulated values to send
        #SendALFR
	client.write_register(40043, randint(0,9), unit=0x0a)
        temps_ALFR  = client.read_holding_registers(40043, 1, unit=1)
        ALFR = "ALxFR=" + str(temps_ALFR.registers)[1:-1]
        client_socket.send(ALFR)
        #SendAWFR
	client.write_register(40045, randint(0,9), unit=0x0a)
        temps_AWFR  = client.read_holding_registers(40045, 1, unit=1)
        AWFR = "AWxFR=" + str(temps_AWFR.registers)[1:-1]
        client_socket.send(AWFR)
        #SendAOFR
	client.write_register(40047, randint(0,9), unit=0x0a)
        temps_AOFR  = client.read_holding_registers(40047, 1, unit=1)
        AOFR = "AOxFR=" + str(temps_AOFR.registers)[1:-1]
        client_socket.send(AOFR)
        #SendAGFR
	client.write_register(40049, randint(0,9), unit=0x0a)
        temps_AGFR  = client.read_holding_registers(40049, 1, unit=1)
        AGFR = "AGxFR=" + str(temps_AGFR.registers)[1:-1]
        client_socket.send(AGFR)

	#Averages Values to send
	#SendAALFR
	client.write_register(40058, randint(0,9), unit=0x0a)
	temps_AALFR  = client.read_holding_registers(40058, 1, unit=1)
	AALFR = "AALvFR=" + str(temps_AALFR.registers)[1:-1]
	client_socket.send(AALFR)
	#SendAAWFR
	client.write_register(40060, randint(0,9), unit=0x0a)
	temps_AAWFR  = client.read_holding_registers(40060, 1, unit=1)
	AAWFR = "AAWvFR=" + str(temps_AAWFR.registers)[1:-1]
	client_socket.send(AAWFR)
	#SendAAOFR
	client.write_register(40062, randint(0,9), unit=0x0a)
	temps_AAOFR  = client.read_holding_registers(40062, 1, unit=1)
	AAOFR = "AAOvFR=" + str(temps_AAOFR.registers)[1:-1]
	client_socket.send(AAOFR)
	#SendAAGFR
	client.write_register(40064, randint(0,9), unit=0x0a)
	temps_AAGFR  = client.read_holding_registers(40064, 1, unit=1)
	AAGFR = "AAGvFR=" + str(temps_AAGFR.registers)[1:-1]
	client_socket.send(AAGFR)
	#SendAAWCT
	client.write_register(40066, randint(0,9), unit=0x0a)
	temps_AAWCT  = client.read_holding_registers(40066, 1, unit=1)
	AAWCT = "AAWvCT=" + str(temps_AAWCT.registers)[1:-1]
	client_socket.send(AAWCT)
	#SendAAGVF
	client.write_register(40068, randint(0,9), unit=0x0a)
	temps_AAGVF  = client.read_holding_registers(40068, 1, unit=1)
	AAGVF = "AAGvVF=" + str(temps_AAGVF.registers)[1:-1]
	client_socket.send(AAGVF)
	#SendAATMP
	client.write_register(40070, randint(0,9), unit=0x0a)
	temps_AATMP  = client.read_holding_registers(40070, 1, unit=1)
	AATMP = "AATvMP=" + str(temps_AATMP.registers)[1:-1]
	client_socket.send(AATMP)
	#SendAAPRES
	client.write_register(40072, randint(0,9), unit=0x0a)
	temps_AAPRES  = client.read_holding_registers(40072, 1, unit=1)
	AAPRES = "AAPvRES=" + str(temps_AAPRES.registers)[1:-1]
	client_socket.send(AAPRES)
	#SendAAIPRES
	client.write_register(40074, randint(0,9), unit=0x0a)
	temps_AAIPRES  = client.read_holding_registers(40074, 1, unit=1)
	AAIPRES = "AAIvPRES=" + str(temps_AAIPRES.registers)[1:-1]
	client_socket.send(AAIPRES)
	#SendAAOPRES
	client.write_register(40076, randint(0,9), unit=0x0a)
	temps_AAOPRES  = client.read_holding_registers(40076, 1, unit=1)
	AAOPRES = "AAOPRvES=" + str(temps_AAOPRES.registers)[1:-1]
	client_socket.send(AAOPRES)
	#SendAAGOR
	client.write_register(40078, randint(0,9), unit=0x0a)
	temps_AAGOR  = client.read_holding_registers(40078, 1, unit=1)
	AAGOR = "AAvGOR=" + str(temps_AAOPRES.registers)[1:-1]
	client_socket.send(AAGOR)
	time.sleep(60)
