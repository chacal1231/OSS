import minimalmodbus

instrument = minimalmodbus.Instrument('/dev/ttyS0', 1) # port name, slave address (in decimal)
instrument.serial.baudrate = 9600
instrument.serial.bytesize = 8
instrument.serial.parity = minimalmodbus.serial.PARITY_NONE
instrument.serial.stopbits = 1
instrument.serial.timeout = 1
instrument.debug = True
instrument.mode = minimalmodbus.MODE_RTU

temperature = instrument.read_register(4001, 1) # Registernumber, number of decimals
print temperature

instrument.write_register(40001, 100, 1)
