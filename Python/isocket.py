#client example
import socket
client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
client_socket.connect(('181.129.168.242', 7774))
while 1:
    data = client_socket.recv(512)
    if ( data == 'Command1\r\n'):
	print "Commando 1"
    elif ( data == 'Command2\r\n'):
        print "Commando 2"
