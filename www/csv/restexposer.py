#!/usr/bin/env python3.7
import time
import datetime
from spade.agent import Agent
from spade.behaviour import PeriodicBehaviour
from spade.message import Message
from spade.template import Template
import csv
import random
import os
from xml.etree import ElementTree
from xml.dom import minidom
from shutil import copy2
from multiprocessing import Process, Pool
import asyncio
import threading
import pdb
import aiohttp_cors
import yaml
from yaml import Loader
import sys
from multidict import MultiDict
from datetime import datetime,timedelta
from shutil import copyfileobj
from aiohttp import web as aioweb
import json
import shlex
from random import seed
from random import randint
import subprocess
import flask
from flask_cors import CORS, cross_origin
import time
import random

app = flask.Flask(__name__)
userPid = {}
userTime = {}
cors = CORS(app)
app.config['CORS_HEADERS'] = 'Content-Type'


@app.route("/newevaluation", methods=['GET'])
def new_evaluation():


    day1 = flask.request.args.get('day1')
    month1 = flask.request.args.get('month1')
    year1 = flask.request.args.get('year1')
    day2 = flask.request.args.get('day2')
    month2 = flask.request.args.get('month2')
    year2 = flask.request.args.get('year2')
    id_pilot = flask.request.args.get('id_pilot')
    user = flask.request.args.get('loggedin')
    locid = flask.request.args.get('locationid')
    evaldir = flask.request.args.get('evaldir')
    print(evaldir)
    cmd = 'python3 ./newCalculator/gccalculator.py ' +day1 + " " + month1 + " "+ year1 + " " + day2 + " " + month2 + " " + year2 + " "+ id_pilot + " " + user + " " + locid + " " + evaldir
    cmds = shlex.split(cmd)
    pid = subprocess.Popen(cmds, start_new_session = True).pid
    userPid[user] = str(pid)
    userTime[user] = time.time()

    print(str(pid))
    print(day1 + " " + month1 + " "+ year1 + " " + day2 + " " + month2 + " " + year2 + " "+ id_pilot + " " + user)

    response = app.response_class(
        status=200
    )
    return response

@app.route("/getstatus", methods=['GET'])
def get_status():
    global simulated_time
    user = flask.request.args.get('loggedin')
    pid = userPid.get(user)
    rand = random.randint(50,100)
    if(pid is not None):
        endTime = time.time()
        try:
            os.kill(int(pid), 0)
        except OSError:
            value =  "False" 
            
        else:
            value =  "True"   #restituisce true se il processo non è stato trovato , quindi è terminato

            del userPid[user]

        
        res = {"user": user, "isDone": value}
        
    else:
        value =  "True"
        res = {"user": user, "isDone": value}        
    print(res)
    response = app.response_class(
        response=json.dumps(res),
        status=200,
        mimetype='application/json'
    )
    return response



app.run(host="parsec2.unicampania.it",port=5437)


'''class Restexposer(Agent):
    userPid = {}
    userBusinessPid = {}
    async def setup(self):
        print("exposer starting...")
        
        

    async def get_message(self, request):



        return aioweb.json_response(z)

    async def get_status(self, request):
        global simulated_time
        user = request.rel_url.query['loggedin']
        pid = self.userPid.get(user)
        if(pid is not None):
            try:
                os.kill(int(pid), 0)
            except OSError:
                value =  "False" 
                
            else:
                value =  "True"   #restituisce true se il processo non è stato trovato , quindi è terminato
                del self.userPid[user]
            res = {"user": user, "isDone": value}
            
        else:
            value =  "True"
            res = {"user": user, "isDone": value}        
        print(res)
        return aioweb.json_response(res)

    async def new_evaluation(self,request):


        day1 = request.rel_url.query['day1']
        month1 = request.rel_url.query['month1']
        year1 = request.rel_url.query['year1']
        day2 = request.rel_url.query['day2']
        month2 = request.rel_url.query['month2']
        year2 = request.rel_url.query['year2']
        id_pilot = request.rel_url.query['id_pilot']
        user = request.rel_url.query['loggedin']
        locid = request.rel_url.query['locationid']
        cmd = 'python3.7 ./newCalculator/gccalculator.py ' +day1 + " " + month1 + " "+ year1 + " " + day2 + " " + month2 + " " + year2 + " "+ id_pilot + " " + user + " " + locid 
        cmds = shlex.split(cmd)
        pid = subprocess.Popen(cmds, start_new_session = True).pid
        self.userPid[user] = str(pid)
        print(str(pid))
        print(day1 + " " + month1 + " "+ year1 + " " + day2 + " " + month2 + " " + year2 + " "+ id_pilot + " " + user)
        response = aioweb.StreamResponse(
        status=200,
        reason='OK'
        )
    

        return response







    async def get_status_business(self, request):
        global simulated_time
        user = request.rel_url.query['loggedin']
        pid = self.userBusinessPid.get(user)
        if(pid is not None):
            try:
                os.kill(int(pid), 0)
            except OSError:
                value =  "False" 
                
            else:
                value =  "True"   #restituisce true se il processo non è stato trovato , quindi è terminato
                del self.userBusinessPid[user]
            res = {"user": user, "isDone": value}
            
        else:
            value =  "True"
            res = {"user": user, "isDone": value}        
        print(res)
        return aioweb.json_response(res)

    async def new_business_evaluation(self,request):
        try:        
            loc = request.rel_url.query['loc']
            dem = request.rel_url.query['dem']
            year = request.rel_url.query['yearkpi']
            user = request.rel_url.query['loggedin']

            cmd = 'python3.7 ./excelscript.py ' + loc + " " + dem + " "+ year + " " + user
            cmds = shlex.split(cmd)
            pid = subprocess.Popen(cmds, start_new_session = True).pid
            self.userBusinessPid[user] = str(pid)
            print(str(pid))
            print(loc + " " + dem + " "+ year + " " + user)
            response = aioweb.StreamResponse(
            status=200,
            reason='OK'
            )
        except:
            print('ciao')
            response = aioweb.StreamResponse(
            status=500,
            reason='BAD REQUEST'
            )

        return response


def adaptor():


    print("Starting Restexposer")
    exposer = Restexposer("exposer@localhost", "dario25!!")
    sc2 = exposer.start()
    cors = aiohttp_cors.setup(exposer.web.app, defaults={
        "*": aiohttp_cors.ResourceOptions(
            allow_credentials=True,
            expose_headers="*",
            allow_headers="*",
            allow_methods="*",
        )
        })

    route = {
    'method' : 'GET',
    'path': '/getstatus',
    'handler' : exposer.get_status,
    'name' : 'test'
    }
    route2 = {
    'method' : 'GET',
    'path' : '/newevaluation',
    'handler' : exposer.new_evaluation,
    'name' : 'test2'
    }
    route3 = {
    'method' : 'GET',
    'path': '/getbusinessstatus',
    'handler' : exposer.get_status_business,
    'name' : 'test3'
    }
    route4 = {
    'method' : 'GET',
    'path' : '/newbusinessevaluation',
    'handler' : exposer.new_business_evaluation,
    'name' : 'test4'
    }
    cors.add(exposer.web.app.router.add_route(method=route['method'],path=route['path'],handler=route['handler'],name=route['name']))
    cors.add(exposer.web.app.router.add_route(method=route2['method'],path=route2['path'],handler=route2['handler'],name=route2['name']))
    cors.add(exposer.web.app.router.add_route(method=route3['method'],path=route3['path'],handler=route3['handler'],name=route3['name']))
    cors.add(exposer.web.app.router.add_route(method=route4['method'],path=route4['path'],handler=route4['handler'],name=route4['name']))
    exposer.web.start(hostname="parsec2.unicampania.it",port="5432")

    sc2.result()




if __name__ == "__main__":
    adaptor()'''
