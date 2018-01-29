import socket
import pymodbus
import serial
import time
from pymodbus.pdu import ModbusRequest
from pymodbus.client.sync import ModbusSerialClient as ModbusClient #initialize a serial RTU client instance
from pymodbus.transaction import ModbusRtuFramer
from pyModbusTCP import utils

client= ModbusClient(method = "rtu", port="/dev/ttyUSB0",stopbits = 1, bytesize = 8, parity = 'N', baudrate= 9600)

#Connect to the serial modbus server
client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
client_socket.connect(('181.129.168.242', 7774))
while 1:
	#Connect to Master Modbus every loop
	connection = client.connect()

	#Read holding registers
	TempsHG	= client.read_holding_registers(14, 100, unit=1)
    	#60S values to send
    	#Status DAU
    	Dau_Status = "DAU_S=" + str(TempsHG.registers[0])
    	print Dau_Status
    	client_socket.send(Dau_Status)
    	#SendLFR
	DEC_LFR = [TempsHG.registers[8],TempsHG.registers[7]]
    	LFR_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_LFR)]
	LFR = "LFR=" + str(LFR_float)[1:-1]
	print LFR
	client_socket.send(LFR)
	'''
	#SendWFR
	temps_WFR  = client.read_holding_registers(40029, 1, unit=1)
    	WFR = "WFR=" + str(temps_WFR.registers)[1:-1]
    	client_socket.send(WFR)
	#SendOFR
	temps_OFR  = client.read_holding_registers(40031, 1, unit=1)
	OFR = "OFR=" + str(temps_OFR.registers)[1:-1]
	client_socket.send(OFR)
	#SendGFR
	temps_GFR  = client.read_holding_registers(40033, 1, unit=1)
	GFR = "GFR=" + str(temps_GFR.registers)[1:-1]
	client_socket.send(GFR)
	#SendGVF
	temps_GVF  = client.read_holding_registers(40035, 1, unit=1)
	GVF = "GVF=" + str(temps_GVF.registers)[1:-1]
	client_socket.send(GVF)
	#SendTMP
	temps_TMP  = client.read_holding_registers(40037, 1, unit=1)
	TMP = "TMP=" + str(temps_TMP.registers)[1:-1]
	client_socket.send(TMP)
	#SendPRE
	temps_PRE  = client.read_holding_registers(40039, 1, unit=1)
	PRE = "PRE=" + str(temps_PRE.registers)[1:-1]
	client_socket.send(PRE)
	#SendWCUT
	temps_WCUT  = client.read_holding_registers(40041, 1, unit=1)
	WCUT = "WCUT=" + str(temps_WCUT.registers)[1:-1]
	client_socket.send(WCUT)

    	#Accumulated values to send
    	#SendALFR
    	temps_ALFR  = client.read_holding_registers(40043, 1, unit=1)
    	ALFR = "ALxFR=" + str(temps_ALFR.registers)[1:-1]
    	client_socket.send(ALFR)
    	#SendAWFR
    	temps_AWFR  = client.read_holding_registers(40045, 1, unit=1)
    	AWFR = "AWxFR=" + str(temps_AWFR.registers)[1:-1]
    	client_socket.send(AWFR)
    	#SendAOFR
   	 temps_AOFR  = client.read_holding_registers(40047, 1, unit=1)
    	AOFR = "AOxFR=" + str(temps_AOFR.registers)[1:-1]
    	client_socket.send(AOFR)
   	#SendAGFR
    	temps_AGFR  = client.read_holding_registers(40049, 1, unit=1)
  	  AGFR = "AGxFR=" + str(temps_AGFR.registers)[1:-1]
    	client_socket.send(AGFR)

	#Averages Values to send
	#SendAALFR
	temps_AALFR  = client.read_holding_registers(40058, 1, unit=1)
	AALFR = "AALvFR=" + str(temps_AALFR.registers)[1:-1]
	client_socket.send(AALFR)
	#SendAAWFR
	temps_AAWFR  = client.read_holding_registers(40060, 1, unit=1)
	AAWFR = "AAWvFR=" + str(temps_AAWFR.registers)[1:-1]
	client_socket.send(AAWFR)
	#SendAAOFR
	temps_AAOFR  = client.read_holding_registers(40062, 1, unit=1)
	AAOFR = "AAOvFR=" + str(temps_AAOFR.registers)[1:-1]
	client_socket.send(AAOFR)
	#SendAAGFR
	temps_AAGFR  = client.read_holding_registers(40064, 1, unit=1)
	AAGFR = "AAGvFR=" + str(temps_AAGFR.registers)[1:-1]
	client_socket.send(AAGFR)
	#SendAAWCT
	temps_AAWCT  = client.read_holding_registers(40066, 1, unit=1)
	AAWCT = "AAWvCT=" + str(temps_AAWCT.registers)[1:-1]
	client_socket.send(AAWCT)
	#SendAAGVF
	temps_AAGVF  = client.read_holding_registers(40068, 1, unit=1)
	AAGVF = "AAGvVF=" + str(temps_AAGVF.registers)[1:-1]
	client_socket.send(AAGVF)
	#SendAATMP
	temps_AATMP  = client.read_holding_registers(40070, 1, unit=1)
	AATMP = "AATvMP=" + str(temps_AATMP.registers)[1:-1]
	client_socket.send(AATMP)
	#SendAAPRES
	temps_AAPRES  = client.read_holding_registers(40072, 1, unit=1)
	AAPRES = "AAPvRES=" + str(temps_AAPRES.registers)[1:-1]
	client_socket.send(AAPRES)
	#SendAAIPRES
	temps_AAIPRES  = client.read_holding_registers(40074, 1, unit=1)
	AAIPRES = "AAIvPRES=" + str(temps_AAIPRES.registers)[1:-1]
	client_socket.send(AAIPRES)
	#SendAAOPRES
	temps_AAOPRES  = client.read_holding_registers(40076, 1, unit=1)
	AAOPRES = "AAOPRvES=" + str(temps_AAOPRES.registers)[1:-1]
	client_socket.send(AAOPRES)
	#SendAAGOR
	temps_AAGOR  = client.read_holding_registers(40078, 1, unit=1)
	AAGOR = "AAvGOR=" + str(temps_AAOPRES.registers)[1:-1]
	client_socket.send(AAGOR)
	#Close client every loop
	'''
	client.close()
	#Wait 60 seconds to do loop
	time.sleep(60)
