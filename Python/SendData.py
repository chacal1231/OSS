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
	#Flag UP
	with open('/home/pi/OSS/Python/flag.txt', 'r+') as f:
		f.write('1')
		f.close()
	#Connect to Master Modbus every loop
	connection = client.connect()

	#Read holding registers
	TempsHG	= client.read_holding_registers(13, 100, unit=1)
	
	#60S values to send
    	#Status DAU
    	Dau_Status = "DAU_S=" + str(TempsHG.registers[1])
    	client_socket.send(Dau_Status)

        #WellId
        Wellid = "WID=" + str(TempsHG.registers[37])
        client_socket.send(Wellid)
    
    	#SendLFR
	DEC_LFR = [TempsHG.registers[14],TempsHG.registers[13]]
	LFR_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_LFR)][0],2)
	LFR = "LFR=" + str(LFR_float)
	time.sleep(1)
	client_socket.send(LFR)
	
	#SendWFR
	DEC_WFR  = [TempsHG.registers[16],TempsHG.registers[15]]
    	WFR_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_WFR)][0],2)
    	WFR = "WFR=" + str(WFR_float)
    	time.sleep(1)
    	client_socket.send(WFR)
	
	#SendOFR
	DEC_OFR  = [TempsHG.registers[18],TempsHG.registers[17]]
	WFR_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_OFR)][0],2)
	OFR = "OFR=" + str(WFR_float)
	time.sleep(1)
	client_socket.send(OFR)
	
	#SendGFR
	DEC_GFR  = [TempsHG.registers[20],TempsHG.registers[19]]
	GFR_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_GFR)][0],2)
	GFR = "GFR=" + str(GFR_float)
	time.sleep(1)
	client_socket.send(GFR)
	
	#SendGVF
	DEC_GVF  = [TempsHG.registers[22],TempsHG.registers[21]]
	GVF_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_GFR)][0],2)
	GVF = "GVF=" + str(GVF_float)
	time.sleep(1)
	client_socket.send(GVF)
	
	#SendTMP
	DEC_TMP  = [TempsHG.registers[24],TempsHG.registers[23]]
	TMP_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_TMP)][0],2)
	TMP = "TMP=" + str(TMP_float)
	time.sleep(1)
	client_socket.send(TMP)
	
	#SendPRE
	DEC_PRE  = [TempsHG.registers[26],TempsHG.registers[25]]
	PRE_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_PRE)][0],2)
	PRE = "PRE=" + str(PRE_float)
	time.sleep(1)
	client_socket.send(PRE)
	
	#SendWCUT
	DEC_WCUT  = [TempsHG.registers[28],TempsHG.registers[27]]
	WCUT_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_WCUT)][0],2)
	WCUT = "WCUT=" + str(WCUT_float)
	time.sleep(1)
	client_socket.send(WCUT)

    	#Accumulated values to send
    	#SendALFR
    	DEC_ALFR  = [TempsHG.registers[30],TempsHG.registers[29]]
    	ALFR_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_ALFR)][0],2)
    	ALFR = "ALxFR=" + str(ALFR_float)
    	time.sleep(1)
    	client_socket.send(ALFR)
    	#SendAWFR
    	DEC_AWFR  = [TempsHG.registers[32],TempsHG.registers[31]]
    	AWFR_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AWFR)][0],2)
    	AWFR = "AWxFR=" + str(AWFR_float)
    	time.sleep(1)
    	client_socket.send(AWFR)
    	#SendAOFR
   	DEC_AOFR  = [TempsHG.registers[34],TempsHG.registers[33]]
   	AOFR_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AOFR)][0],2)
   	AOFR = "AOxFR=" + str(AOFR_float)
    	time.sleep(1)
    	client_socket.send(AOFR)
   	#SendAGFR
    	DEC_AGFR  = [TempsHG.registers[36],TempsHG.registers[35]]
    	AGFR_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AGFR)][0],2)
  	AGFR = "AGxFR=" + str(AGFR_float)
  	time.sleep(1)
    	client_socket.send(AGFR)

	#Averages Values to send
	#SendAALFR
	DEC_AALFR  = [TempsHG.registers[45],TempsHG.registers[44]]
	AALFR_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AALFR)][0],2)
	AALFR = "AALvFR=" + str(AALFR_float)
	time.sleep(1)
	client_socket.send(AALFR)
	#SendAAWFR
	DEC_AAWFR  = [TempsHG.registers[47],TempsHG.registers[46]]
	AAWFR_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AAWFR)][0],2)
	AAWFR = "AAWvFR=" + str(AAWFR_float)
	time.sleep(1)
	client_socket.send(AAWFR)
	#SendAAOFR
	DEC_AAOFR  = [TempsHG.registers[49],TempsHG.registers[48]]
	AAOFR_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AAOFR)][0],2)
	AAOFR = "AAOvFR=" + str(AAOFR_float)
	time.sleep(1)
	client_socket.send(AAOFR)
	#SendAAGFR
	DEC_AAGFR  = [TempsHG.registers[51],TempsHG.registers[50]]
	AAGFR_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AAGFR)][0],2)
	AAGFR = "AAGvFR=" + str(AAGFR_float)
	time.sleep(1)
	client_socket.send(AAGFR)
	#SendAAWCT
	DEC_AAWCT  = [TempsHG.registers[53],TempsHG.registers[52]]
	AAWCT_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AAWCT)][0],2)
	AAWCT = "AAWvCT=" + str(AAWCT_float)
	time.sleep(1)
	client_socket.send(AAWCT)
	#SendAAGVF
	DEC_AAGVF  = [TempsHG.registers[55],TempsHG.registers[54]]
	AAGVF_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AAGVF)][0],2)
	AAGVF = "AAGvVF=" + str(AAGVF_float)
	time.sleep(1)
	client_socket.send(AAGVF)
	#SendAATMP
	DEC_AATMP  = [TempsHG.registers[57],TempsHG.registers[56]]
	AATMP_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AATMP)][0],2)
	AATMP = "AATvMP=" + str(AATMP_float)
	time.sleep(1)
	client_socket.send(AATMP)
	#SendAAPRES
	DEC_AAPRES  = [TempsHG.registers[59],TempsHG.registers[58]]
	AAPRES_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AAPRES)][0],2)
	AAPRES = "AAPvRES=" + str(AAPRES_float)
	time.sleep(1)
	client_socket.send(AAPRES)
	#SendAAIPRES
	DEC_AAIPRES  = [TempsHG.registers[61],TempsHG.registers[60]]
	AAIPRES_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AAIPRES)][0],2)	
	AAIPRES = "AAIvPRES=" + str(AAIPRES_float)
	time.sleep(1)
	client_socket.send(AAIPRES)
	#SendAAOPRES
	DEC_AAOPRES  = [TempsHG.registers[63],TempsHG.registers[62]]
	AAOPRES_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AAOPRES)][0],2)
	AAOPRES = "AAOPRvES=" + str(AAOPRES_float)
	time.sleep(1)
	client_socket.send(AAOPRES)
	#SendAAGOR
	DEC_AAGOR  = [TempsHG.registers[65],TempsHG.registers[64]]
	AAGOR_float = round([utils.decode_ieee(f) for f in utils.word_list_to_long(DEC_AAGOR)][0],2)
	AAGOR = "AAvGOR=" + str(AAGOR_float)
	time.sleep(1)
	client_socket.send(AAGOR)
	#Close client every loop
	client.close()
	#Flag down
	with open('/home/pi/OSS/Python/flag.txt', 'r+') as f:
                f.write('0')
                f.close()
	#Wait 60 seconds to do loop
	time.sleep(37)
