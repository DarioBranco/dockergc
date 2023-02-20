#import Flask   
from flask import Flask, render_template, request, redirect, url_for, flash, jsonify
from flask_pymongo import PyMongo
from bson.objectid import ObjectId
import os
from flask_cors import CORS
import sys
import json
from pymongo import MongoClient
import datetime
import time
from bson import json_util, ObjectId


app = Flask(__name__)
app.config["MONGO_URI"] = "mongodb://cleopatra:cleop25..@mongo:27017/cleopatra"

myclient = MongoClient(app.config["MONGO_URI"])
mydb = myclient["cleopatra"]

cors = CORS(app)
@app.get('/test')
def test():
    return "Hello World"

@app.post('/event')
def postevent():
    collection = mydb["events"]
    event = request.json
    collection.insert_one(event['json'])
    return "ok"

@app.get('/geteventtype')
def geteventtype():
    collection = mydb["events"]
    searchstring = request.args.get('searchevent')
    searchuser = request.args.get('searchuser')

    if searchstring is None:
        return "no search string"
    else:
        if searchuser is None:
           return "no user"
        if searchuser == 'all':
            #get event from collection giving user_address
            event = collection.find({"event_type":searchstring})
        else:
            event = collection.find({"event_type":searchstring, "name":searchuser})
        if event is None:
            return "no event"
        else:
            print(event)
            return json.dumps(json.loads(json_util.dumps(event))) 
    #event = collection.find_one(searchstring)
    #print(event)
    #return "ok"


@app.get('/event')
def getevent():
    collection = mydb["events"]
    searchstring = request.args.get('searchstring')
    if searchstring is None:
        return "no search string"
    else:
        #get event from collection giving user_address
        event = collection.find_one({"user_address":searchstring})
        if event is None:
            return "no event"
        else:
            print(event)
            return json.dumps(json.loads(json_util.dumps(event)))
    #event = collection.find_one(searchstring)
    #print(event)
    #return "ok"



@app.post('/user')
def postusers():
    collection = mydb["users"]
    event = request.json
    collection.insert_one(event)
    return "ok"

if __name__ == '__main__':
  
    app.run(host= '0.0.0.0', debug=True)
