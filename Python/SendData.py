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
	TempsHG	= client.read_holding_registers(13, 100, unit=1)
	
	#60S values to send
    	#Status DAU
    	Dau_Status = "DAU_S=" + str(TempsHG.registers[1])
    	print Dau_Status
    	client_socket.send(Dau_Status)
    
    	#SendLFR
	DEC_LFR = [TempsHG.registers[14],TempsHG.registers[13]]
	LFR_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_LFR)]
	LFR = "LFR=" + str(LFR_float)[1:-1]
	print LFR
	client_socket.send(LFR)
	
	#SendWFR
	DEC_WFR  = [TempsHG.registers[16],TempsHG.registers[15]]
    	WFR_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_WFR)]
    	WFR = "WFR=" + str(WFR_float)[1:-1]
    	print WFR
    	client_socket.send(WFR)
	
	#SendOFR
	DEC_OFR  = [TempsHG.registers[18],TempsHG.registers[17]]
	WFR_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_OFR)]
	OFR = "OFR=" + str(WFR_float)[1:-1]
	print OFR
	client_socket.send(OFR)
	
	#SendGFR
	DEC_GFR  = [TempsHG.registers[20],TempsHG.registers[19]]
	GFR_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_GFR)]
	GFR = "GFR=" + str(GFR_float)[1:-1]
	print GFR
	client_socket.send(GFR)
	
	#SendGVF
	DEC_GVF  = [TempsHG.registers[22],TempsHG.registers[21]]
	GVF_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_GFR)]
	GVF = "GVF=" + str(GVF_float)[1:-1]
	print GVF
	client_socket.send(GVF)
	
	#SendTMP
	DEC_TMP  = [TempsHG.registers[24],TempsHG.registers[23]]
	TMP_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_TMP)]
	TMP = "TMP=" + str(TMP_float)[1:-1]
	print TMP
	client_socket.send(TMP)
	
	#SendPRE
	DEC_PRE  = [TempsHG.registers[26],TempsHG.registers[25]]
	PRE_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_PRE)]
	PRE = "PRE=" + str(PRE_float)[1:-1]
	print PRE
	client_socket.send(PRE)
	
	#SendWCUT
	DEC_WCUT  = [TempsHG.registers[28],TempsHG.registers[27]]
	WCUT_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_WCUT)]
	WCUT = "WCUT=" + str(WCUT_float)[1:-1]
	print WCUT
	client_socket.send(WCUT)

    	#Accumulated values to send
    	#SendALFR
    	DEC_ALFR  = [TempsHG.registers[30],TempsHG.registers[29]]
    	ALFR_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_ALFR)]
    	ALFR = "ALxFR=" + str(ALFR_float)[1:-1]
    	print ALFR
    	client_socket.send(ALFR)
    	#SendAWFR
    	DEC_AWFR  = [TempsHG.registers[32],TempsHG.registers[31]]
    	AWFR_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AWFR)]
    	AWFR = "AWxFR=" + str(AWFR_float)[1:-1]
    	print AWFR
    	client_socket.send(AWFR)
    	#SendAOFR
   	DEC_AOFR  = [TempsHG.registers[34],TempsHG.registers[33]]
   	AOFR_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AOFR)]
   	AOFR = "AOxFR=" + str(AOFR_float)[1:-1]
    	print AOFR
    	client_socket.send(AOFR)
   	#SendAGFR
    	DEC_AGFR  = [TempsHG.registers[36],TempsHG.registers[35]]
    	AGFR_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AGFR)]
  	AGFR = "AGxFR=" + str(AGFR_float)[1:-1]
  	print AGFR
    	client_socket.send(AGFR)

	#Averages Values to send
	#SendAALFR
	DEC_AALFR  = [TempsHG.registers[45],TempsHG.registers[44]]
	AALFR_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AALFR)]
	AALFR = "AALvFR=" + str(AALFR_float)[1:-1]
	print AALFR
	client_socket.send(AALFR)
	#SendAAWFR
	DEC_AAWFR  = [TempsHG.registers[47],TempsHG.registers[46]]
	AAWFR_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AAWFR)]
	AAWFR = "AAWvFR=" + str(AAWFR_float)[1:-1]
	print AAWFR
	client_socket.send(AAWFR)
	#SendAAOFR
	DEC_AAOFR  = [TempsHG.registers[49],TempsHG.registers[48]]
	AAOFR_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AAOFR)]
	AAOFR = "AAOvFR=" + str(AAOFR_float)[1:-1]
	print AAOFR
	client_socket.send(AAOFR)
	#SendAAGFR
	DEC_AAGFR  = [TempsHG.registers[51],TempsHG.registers[50]]
	AAGFR_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AAGFR)]
	AAGFR = "AAGvFR=" + str(AAGFR_float)[1:-1]
	print AAGFR
	client_socket.send(AAGFR)
	#SendAAWCT
	DEC_AAWCT  = [TempsHG.registers[53],TempsHG.registers[52]]
	AAWCT_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AAWCT)]
	AAWCT = "AAWvCT=" + str(AAWCT_float)[1:-1]
	print AAWCT
	client_socket.send(AAWCT)
	#SendAAGVF
	DEC_AAGVF  = [TempsHG.registers[55],TempsHG.registers[54]]
	AAGVF_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AAGVF)]
	AAGVF = "AAGvVF=" + str(AAGVF_float)[1:-1]
	print AAGVF
	client_socket.send(AAGVF)
	#SendAATMP
	DEC_AATMP  = [TempsHG.registers[57],TempsHG.registers[56]]
	AATMP_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AATMP)]
	AATMP = "AATvMP=" + str(AATMP_float)[1:-1]
	print AATMP
	client_socket.send(AATMP)
	#SendAAPRES
	DEC_AAPRES  = [TempsHG.registers[59],TempsHG.registers[58]]
	AAPRES_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AAPRES)]
	AAPRES = "AAPvRES=" + str(AAPRES_float)[1:-1]
	print AAPRES
	client_socket.send(AAPRES)
	#SendAAIPRES
	DEC_AAIPRES  = [TempsHG.registers[61],TempsHG.registers[60]]
	AAIPRES_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AAIPRES)]
	AAIPRES = "AAIvPRES=" + str(AAIPRES_float)[1:-1]
	print AAIPRES
	client_socket.send(AAIPRES)
	#SendAAOPRES
	DEC_AAOPRES  = [TempsHG.registers[63],TempsHG.registers[62]]
	AAOPRES_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AAOPRES)]
	AAOPRES = "AAOPRvES=" + str(AAOPRES_float)[1:-1]
	print AAOPRES
	client_socket.send(AAOPRES)
	#SendAAGOR
	DEC_AAGOR  = [TempsHG.registers[65],TempsHG.registers[64]]
	AAGOR_float = [utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AAGOR)]
	AAGOR = "AAvGOR=" + str(AAGOR_float)[1:-1]
	print AAGOR
	client_socket.send(AAGOR)
	#Close client every loop
	client.close()
	#Wait 60 seconds to do loop
	time.sleep(60)
