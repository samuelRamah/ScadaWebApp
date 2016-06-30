#!/usr/bin/python
# coding:Utf-8

import serial
import mysql.connector
import os

from datetime import datetime
from enum import IntEnum, unique


@unique
class MsgType(IntEnum):
    PRESENTATION = 0
    SET = 1
    REQ = 2
    INTERNAL = 3
    STREAM = 4


def getMessage(data):
    message = {}

    data = str(data)
    if len(data) < 1:
        return ""

    counter = 0
    idx = 0

    while data.find(';', idx) != -1:
        counter += 1
        idx = data.find(';', idx) + 1

    # Gere les messages ne venant pas du reseau ou pas du protocol MySensor
    if counter != 5:
        return data

    data = data[2:]
    data = data[:-3]

    begin = 0
    end = data.find(';', begin)

    for key in ['nodeId', 'childId', 'msgType', 'ack', 'subType', 'payload']:
        message[key] = data[begin:end]
        begin = end + 1
        end = data.find(';', begin)
        if end == -1:
            end = len(data)

    return message


def getVal(table, champ, val):
    query = "SELECT id_{0} FROM {0} WHERE {1}={2}".format(table, champ, val)
    cursor.execute(query)
    row = cursor.fetchone()

    if row is not None:
        # gere le cas ou il y a plusieurs lignes retournées
        while cursor.fetchone() is not None:
            pass

        # retourne uniquement la premiere ligne reçue
        return int(row["id_{}".format(table)])
    else:
        # retourne -1 si on a rien trouvé
        return -1


def insertMessageInDb(message):
    nodeId = getVal('node', 'id', int(message['nodeId']))
    childId = int(message['childId'])
    msgType = getVal('messageType', 'value', int(message['msgType']))
    ack = int(message['ack'])
    subType = int(message['subType'])
    payload = message['payload']
    subType = getVal('variableType', 'value', message['subType'])
    queryInsertMessage = (
        "INSERT INTO message "
        "(id_node, childId, id_messageType, ack, sub_Type, payload, receivedAt) "
        "VALUES (%s, %s, %s, %s, %s, %s, %s)")
    dataMessage = (nodeId,
                   childId,
                   msgType,
                   ack,
                   subType,
                   payload,
                   datetime.now().strftime("%Y-%m-%d %H:%M:%S")
                   )
    cursor.execute(queryInsertMessage, dataMessage)

    cnx.commit()


def processMessage(message):
    if not type(message) is dict:
        print(message)
        return

    nodeId = getVal('node', 'id', int(message['nodeId']))
    childId = int(message['childId'])
    msgType = getVal('messageType', 'value', int(message['msgType']))
    ack = int(message['ack'])
    subType = int(message['subType'])
    payload = message['payload']
    subType = getVal('variableType', 'value', message['subType'])

    if int(message['msgType']) == MsgType.PRESENTATION:
        """ MessageType : Presentation"""
        if nodeId != -1:
            pass

        else:
            pass

        pass
    elif int(message['msgType']) == MsgType.SET:
        if nodeId == -1:
            pass

        else:
            # Verifie si la valeur est deja dans la base de données
            querySelectMessage = (
                "SELECT payload "
                "FROM message "
                "WHERE id_node=%s AND childId=%s "
                "ORDER BY receivedAt DESC "
                "LIMIT 1"
            )

            cursor.execute(querySelectMessage, (nodeId, childId))
            row = cursor.fetchone()

            if row is not None:
                payloadInDb = row['payload']

                if payloadInDb != payload:
                    insertMessageInDb(message)
                    pass

            else:
                insertMessageInDb(message)
                pass

        pass
    elif int(message['msgType']) == MsgType.REQ:

        pass
    elif int(message['msgType']) == MsgType.INTERNAL:
        pass
    elif int(message['msgType']) == MsgType.STREAM:
        pass
    else:
        pass

    print(message)


"""
    Debut du programme principal
"""

# Dictionary for the database connection settings
dbConnection = {
    'user': 'adodab',
    'password': 'droopy',
    'host': 'localhost',
    'database': 'Scada'
}

# Dictionary for the cursor configuration
cursorConfiguration = {
    'dictionary': True,
    'buffered': False,
    'raw': False
}

# Connection to the database
cnx = mysql.connector.connect(**dbConnection)
cursor = cnx.cursor(**cursorConfiguration)

serialConnection = (
    '/dev/serialGateway',
    115200
)
# Connect to the arduino gateway via serial port
arduino = serial.Serial(*serialConnection)
arduino = serial.Serial()

while True:
    data = arduino.readline()
    message = getMessage(data)
    processMessage(message)
    pass

cursor.close()
cnx.close()
