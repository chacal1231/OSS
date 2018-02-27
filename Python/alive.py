import socket
client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
client_socket.settimeout(None)
client_socket.setsockopt( socket.SOL_SOCKET, socket.SO_KEEPALIVE, 1)
client_socket.connect(('192.34.109.236', 7774))
client_socket.send('xPython')
