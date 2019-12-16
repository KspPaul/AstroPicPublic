#!/usr/bin/env python3 
#!/usr/bin/python
import requests
import json
import mysql.connector
import time


apiKey = "API KEY";
processID = 0;
picturesNumber = 2;
pictureObjectsIn = 11;
picturesOverly = 12;
apiSession = "temm"; 
isFailure = False;
tags = "";
JobID = "";

def checkAPI():
    R = requests.post('http://nova.astrometry.net/api/login', data={'request-json': json.dumps({"apikey": apiKey})})
    stringR = R.text;
    jsonL = json.loads(stringR);
    global apiSession
    apiSession = jsonL['session'];
    print(apiSession);


def GetImageInfo():
    R = requests.post('http://nova.astrometry.net/api/url_upload', data={'request-json': json.dumps({"session": apiSession, "url": currentI})})
    jsonL = json.loads(R.text);
    print(R.text);
    subid = jsonL['subid'];
    print(subid);
    global JobID;
    JobID = "[]"

    while JobID == '[]' or JobID == '[None]':
        R = requests.post('http://nova.astrometry.net/api/submissions/{}'.format(subid));
        jsonL = json.loads(R.text);
        JobID = str(jsonL['jobs']);

    JobID = JobID.strip("[]");
    print(JobID);
    currentStatus = "CALC";

    while currentStatus != 'failure' and currentStatus != 'success':
    
        R = requests.post('http://nova.astrometry.net/api/jobs/{}'.format(JobID));
        jsonL = json.loads(R.text);
        currentStatus = jsonL["status"];
    
    if currentStatus != "failure":
       global isFailure;
       isFailure = False;
       R = requests.post('http://nova.astrometry.net/api/jobs/{}/tags/'.format(JobID));
       global tags;
       tags = R.text; 
       print(R.text);
    if currentStatus == "failure":
       global isFailure;
       isFailure = True;






while True:



  mydb = mysql.connector.connect(
  host="127.0.0.1",
  user="user",
  passwd="password",
  database="GalleryBase"
  )

  mycursor = mydb.cursor();
  mycursor.execute("SELECT * FROM ProcessList");



  allToProcess = mycursor.fetchall();
  checkAPI();
  print("test{}".format(allToProcess));

  for x in allToProcess:

    print(x);
    sql = "SELECT * FROM pictures WHERE id ='{}'".format(x[processID]);
    mycursor.execute(sql);
    PicID = x[processID];
    pic = mycursor.fetchone();
    if pic != None:

      print();
      picAdress = "http://paulserv.ddns.net/uploads/images/{}".format(pic[picturesNumber]);

      currentI = picAdress;
      print("Current IMAGE: {}".format(currentI));
      GetImageInfo();

      if isFailure == False:
      
        tags.replace("'","");
        js = json.loads(tags);

        currrent = str(js['tags']);
        c = "";
        for x in currrent:
          if x != "'" and x != "[" and x != "]":
            c += x;



        sql = "UPDATE pictures SET ObjectsIN = '{}', SubID='{}' WHERE id = '{}'".format(c,JobID, PicID);
        print("UPDATE pictures SET ObjectsIN = '{}', SubID='{}' WHERE id = '{}'".format(c,JobID, PicID));
        mycursor.execute(sql)
        mydb.commit()

      sql = "DELETE FROM ProcessList WHERE imageID = '{}'".format(PicID);
      mycursor.execute(sql)
      mydb.commit()
  

  print("Wait 30 seconds");
  time.sleep(30) 





