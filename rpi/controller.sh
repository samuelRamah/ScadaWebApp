#!/usr/bin/bash	

sudo ln -s /dev/ttyUSB0	/dev/serialGateway
screen python /data/py/ScadaController.py 
