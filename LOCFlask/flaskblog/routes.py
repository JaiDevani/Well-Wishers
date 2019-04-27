import os
from PIL import Image
from flask import render_template,url_for,flash,redirect,request,abort,Flask,jsonify
from flaskblog import app,db,bcrypt
from flask_login import login_user, current_user, logout_user, login_required

import requests
import io
from datetime import datetime,timedelta
import pytesseract
import cv2
import os
@app.route('/images/<image_name>',methods=['GET'])
def stockpred(image_name):
	
	image=cv2.imread("C:/xampp/htdocs/loc_fr/storage/app/public/cover_images/"+image_name)

	gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)

	gray = cv2.threshold(gray, 0, 255, cv2.THRESH_BINARY | cv2.THRESH_OTSU)[1]
	
	gray = cv2.medianBlur(gray, 3)
	
	text = pytesseract.image_to_string(gray)
	
	text=text.replace('\n', ' ')
	text=text.split(' ')

	def nextword(target, source):
		for i, w in enumerate(source):
			if w == target:
				return source[i+1]

	def nexttonextword(target, source):
		for i, w in enumerate(source):
			if w == target:
				return source[i+2]				

	name=nextword('Name:',text)
	surname=nexttonextword('Name:',text)
	age=nextword('Age:',text)
	date=nextword('Date:',text)
	amount=nextword('Amount:',text)
	txn=nexttonextword('TXN',text)
	prj=nextword('PRJ',text)
	if prj is None:
		prj=nextword('PRT:',text)

	date=date.replace('I','1')
	date=date.replace('|','1')

	outdict={'name':name,'age':age,'amount':amount,'date':date,'surname':surname,'prj':prj,'txn':txn}
	print(outdict)
	return jsonify(outdict)