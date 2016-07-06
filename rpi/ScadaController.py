#!/usr/bin/python
# coding:Utf-8

import serial
import mysql.connector
# import os  #unused

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
    """Recupere le message.

    Recupere les donnees obtenues sur le port serie, verifie si il
    s'agit bien d'un message venant du protocole MySensor, le met dans
    un dictionnaire, sinon renvoi les donnees telles qu'elles.

    Arguments:
        data {str} -- donnees brutes venant du port serie

    Returns:
        dict -- dictionnaire decrivant le message selon le protocole MySensor
    """
    # Conteneur de type dictionnaire
    message = {}

    data = str(data)
    if len(data) < 1:
        return ""

    counter = 0
    idx = 0

    # compte le nombre de ";" dans le message, il doit y en avoir 5 au total
    while data.find(';', idx) != -1:
        counter += 1
        idx = data.find(';', idx) + 1

    # Gere les messages ne venant pas du reseau ou pas du protocol MySensor
    if counter != 5:
        # On retourne les donnees brutes
        return data

    # Formatage de data, enleve '\b' et le(s) caractere(s) de saut de ligne
    data = data[2:]
    data = data[:-3]

    # Creation du dictionnaire contenant le message
    begin = 0
    end = data.find(';', begin)

    for key in ['nodeId', 'childId', 'msgType', 'ack', 'subType', 'payload']:
        message[key] = data[begin:end]
        begin = end + 1
        end = data.find(';', begin)
        if end == -1:
            end = len(data)

    return message


def getKey(table, champ, val):
    """Recupere cle primaire.

    Recupere la valeur de la cle primaire de la table dont le champ correspond
    a la valeur
    Ne renvoi que la premiere valeur trouvee

    Arguments:
        table {str} -- table dans laquelle il faut chercher
        champ {str} -- champ sur laquelle la recherche est effectue
        val {str} -- valeur qui doit faire correspondre la recherche

    Returns:
        int -- cle si elle existe, -1 sinon
    """
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
    """Inserer un message dans la Base de donnees.

    [description]

    Arguments:
        message {[type]} -- [description]
    """
    # TODO gerer le cas ou nodeId = -1 , c-a-d le node n'existe
    # pas encore dans la base de donnees
    nodeId = getKey('node', 'id', int(message['nodeId']))
    childId = int(message['childId'])
    msgType = getKey('messageType', 'value', int(message['msgType']))
    ack = int(message['ack'])
    subType = int(message['subType'])
    payload = message['payload']
    subType = getKey('variableType', 'value', message['subType'])
    queryInsertMessage = (
        "INSERT INTO message "
        "   (id_node, childId, id_messageType, ack, "
        "    sub_Type, payload, receivedAt) "
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


def addNodesInfos(nodes, **infos):
    pass


def processMessage(message):
    if not type(message) is dict:
        print(message)
        return

    nodeId = getKey('node', 'id', int(message['nodeId']))
    childId = int(message['childId'])
    # msgType = getKey('messageType', 'value', int(message['msgType']))
    # ack = int(message['ack'])
    # subType = int(message['subType'])
    payload = message['payload']
    # subType = getKey('variableType', 'value', message['subType'])

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
        if nodeId == -1:
            pass
        else:
            pass
        pass
    elif int(message['msgType']) == MsgType.INTERNAL:
        pass
    elif int(message['msgType']) == MsgType.STREAM:
        pass
    else:
        pass

    print(message)


def get_val(table, key, champ):
    reqSelectVal = (
        "SELECT %s FROM %s "
        "WHERE id_%s = %s"
    )
    cursor.execute(reqSelectVal, (champ, table, table, key))
    row = cursor.fetchone()

    if row is not None:
        ret_val = row[champ]
        while row is not None:
            row = cursor.fetchone()
        return ret_val
    else:
        return -1


def sendCommand(**params):
    nodeId = get_val('node', params['id_node'], 'id')
    childSensorId = params['childId']
    messageType = 1
    ack = 0
    subType = get_val('variableType', params['sub_type'], 'value')
    payload = params['payload']

    msg = "{};{};{};{};{};{}\n".format(
        nodeId, childSensorId, messageType, ack, subType, payload)

    arduino.write(msg)
    pass


def checkForCommands():
    # TODO : verifier si il y a des nouveaux messages dans la base de donnees
    # venant de l'application web, si oui les envoyers sur le reseau MySensor

    # msgType = getKey('messageType', 'value', MsgType.SET)

    queryReqMessage = (
        "SELECT * FROM message "
        "WHERE message.receivedAt IN ( "
        "    SELECT MAX(message.receivedAt) FROM message "
        "    GROUP BY message.id_node, message.childId "
        ") "
        "AND message.id_messageType = 2 "
        "AND message.exptype = 'WEB' "
        "ORDER BY `message`.`id_message` DESC "
    )

    cursor.execute(queryReqMessage)
    row = cursor.fetchone()
    while row is not None:
        nodeId = int(get_val('node', row['id_node'], 'id'))
        childId = int(row['childId'])
        if nodes[nodeId] is not None:
            if nodes[nodeId][childId] is not None:
                if nodes[nodeId][childId] >= row['receivedAt']:
                    # La commande a deja ete envoyee
                    pass
                else:
                    # Il y a une commande plus recente
                    nodes[nodeId][childId] = row['receivedAt']
                    sendCommand(row)
                    pass
                pass
            else:
                # Premiere commande pour le child
                nodes[nodeId] = dict(nodes[nodeId])
                nodes[nodeId][childId] = row['receivedAt']
                sendCommand(row)
        else:
            # c'est la premiere commande qui doit etre envoyee
            # nodes = dict(nodes)
            nodes[nodeId] = dict()
            nodes[nodeId][childId] = row['receivedAt']
            sendCommand(row)
            pass

    pass

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
# arduino = serial.Serial()

nodes = dict()


while True:
    # Boucle principale, traitement de toutes les taches
    data = arduino.readline()
    message = getMessage(data)
    processMessage(message)
    checkForCommands()
    pass

cursor.close()
cnx.close()
